<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class CodeVerificationController extends Controller
{
    /**
     * Display the password reset code verification view.
     */
    public function create(Request $request): View
    {
        return view('auth.verify-code', ['request' => $request]);
    }

    /**
     * Handle the code verification and display the reset password form.
     *
     * @throws ValidationException
     */
    public function verify(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
            'code' => ['required', 'string', 'size:6'],
        ]);

        $record = DB::table('password_reset_codes')
            ->where('email', $request->email)
            ->where('code', $request->code)
            ->first();

        if (! $record) {
            return back()->withInput($request->only('email'))
                ->withErrors(['code' => 'The provided code is invalid or has expired.']);
        }

        $expireMinutes = config('auth.passwords.users.expire', 60);
        $createdAt = $record->created_at instanceof Carbon ? $record->created_at : Carbon::parse($record->created_at);
        if ($createdAt->diffInMinutes(now()) > $expireMinutes) {
            DB::table('password_reset_codes')->where('email', $request->email)->delete();

            return back()->withInput($request->only('email'))
                ->withErrors(['code' => 'The code has expired. Please request a new one.']);
        }

        return redirect()->route('password.reset.form', ['email' => $request->email, 'code' => $request->code]);
    }

    /**
     * Display the password reset form after code verification.
     */
    public function showResetForm(Request $request): View
    {
        $request->validate([
            'email' => ['required', 'email'],
            'code' => ['required', 'string', 'size:6'],
        ]);

        $record = DB::table('password_reset_codes')
            ->where('email', $request->email)
            ->where('code', $request->code)
            ->first();

        if (! $record) {
            return redirect()->route('password.code.verify')->withErrors([
                'code' => 'The provided code is invalid or has expired.',
            ]);
        }

        $expireMinutes = config('auth.passwords.users.expire', 60);
        $createdAt = $record->created_at instanceof Carbon ? $record->created_at : Carbon::parse($record->created_at);
        if ($createdAt->diffInMinutes(now()) > $expireMinutes) {
            DB::table('password_reset_codes')->where('email', $request->email)->delete();

            return redirect()->route('password.code.verify')->withErrors([
                'code' => 'The code has expired. Please request a new one.',
            ]);
        }

        return view('auth.reset-password-code', ['email' => $request->email, 'code' => $request->code]);
    }

    /**
     * Handle the password reset after code verification.
     *
     * @throws ValidationException
     */
    public function reset(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
            'code' => ['required', 'string', 'size:6'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $record = DB::table('password_reset_codes')
            ->where('email', $request->email)
            ->where('code', $request->code)
            ->first();

        if (! $record) {
            return back()->withInput($request->only('email'))
                ->withErrors(['code' => 'The provided code is invalid or has expired.']);
        }

        $expireMinutes = config('auth.passwords.users.expire', 60);
        $createdAt = $record->created_at instanceof Carbon ? $record->created_at : Carbon::parse($record->created_at);
        if ($createdAt->diffInMinutes(now()) > $expireMinutes) {
            DB::table('password_reset_codes')->where('email', $request->email)->delete();

            return back()->withInput($request->only('email'))
                ->withErrors(['code' => 'The code has expired. Please request a new one.']);
        }

        $user = User::where('email', $request->email)->first();

        if (! $user) {
            return back()->withInput($request->only('email'))
                ->withErrors(['email' => 'User not found.']);
        }

        $user->forceFill([
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(60),
        ])->save();

        DB::table('password_reset_codes')->where('email', $request->email)->delete();

        event(new PasswordReset($user));

        return redirect()->route('login')->with('status', 'Your password has been reset successfully. You can now log in with your new password.');
    }
}
