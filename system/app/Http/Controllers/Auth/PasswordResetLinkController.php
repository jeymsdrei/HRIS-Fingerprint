<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset request view (Step 1: Username).
     */
    public function create(): View
    {
        return view('auth.forgot-password', ['matchedEmail' => null]);
    }

    /**
     * Handle an incoming password reset request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'action' => ['nullable', 'in:lookup_username,send_username,email'],
            'username' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email'],
        ]);

        $action = $data['action'] ?? 'email';

        if ($action === 'lookup_username') {
            $request->validate(['username' => ['required', 'string', 'max:255']]);
            $user = $this->personnelUserByUsername($data['username']);

            if (! $user?->employee?->email) {
                return back()->withInput()->withErrors([
                    'username' => 'We could not find a staff account with an email address. Please use email recovery or contact your administrator.',
                ]);
            }

            return back()->with('recovery_username', $user->username)
                ->with('matched_email', $this->maskEmail($user->employee->email));
        }

        if ($action === 'send_username') {
            $request->validate(['username' => ['required', 'string', 'max:255']]);
            $user = $this->personnelUserByUsername($data['username']);

            if (! $user?->employee?->email || ! $this->syncRecoveryEmail($user, $user->employee->email)) {
                return back()->withInput()->withErrors([
                    'username' => 'We could not send a reset code for this account. Please use email recovery or contact your administrator.',
                ]);
            }

            return $this->sendResetCode($user, $request);
        }

        $request->validate(['email' => ['required', 'email']]);
        $users = User::query()
            ->where('role', 'employee')
            ->whereHas('employee', fn ($query) => $query->whereIn('classification', [
                Employee::CLASSIFICATION_TEACHING,
                Employee::CLASSIFICATION_NON_TEACHING,
            ]))
            ->where(function ($query) use ($data) {
                $query->whereHas('employee', fn ($employeeQuery) => $employeeQuery->where('email', $data['email']));
            })
            ->limit(2)
            ->get();

        if ($users->count() !== 1) {
            return back()->withInput()->with('status', 'If the email exists in our system, a password reset code has been sent.');
        }

        $user = $users->first();

        if (! $user || ! $this->syncRecoveryEmail($user, $data['email'])) {
            return back()->withInput()->with('status', 'If the email exists in our system, a password reset code has been sent.');
        }

        return $this->sendResetCode($user, $request);
    }

    private function personnelUserByUsername(string $username): ?User
    {
        return User::query()
            ->with('employee')
            ->where('username', $username)
            ->where('role', 'employee')
            ->whereHas('employee', fn ($query) => $query->whereIn('classification', [
                Employee::CLASSIFICATION_TEACHING,
                Employee::CLASSIFICATION_NON_TEACHING,
            ]))
            ->first();
    }

    private function syncRecoveryEmail(User $user, string $email): bool
    {
        if (User::query()->where('email', $email)->whereKeyNot($user->getKey())->exists()) {
            return false;
        }

        if ($user->email !== $email) {
            $user->email = $email;
            $user->save();
        }

        return true;
    }

    private function sendResetCode(User $user, Request $request): RedirectResponse
    {
        try {
            $user->sendPasswordResetNotification('');
        } catch (TransportExceptionInterface $exception) {
            Log::error('Password reset email delivery failed.', [
                'message' => $exception->getMessage(),
            ]);

            return back()->withInput($request->only('email', 'username'))
                ->withErrors(['email' => 'The reset email could not be sent. Check the mail server settings and try again.']);
        }

        return redirect()->route('password.code.verify')
            ->with('status', 'A password reset code has been sent to your email address. Please check your inbox.')
            ->with('matched_email', $this->maskEmail($user->getEmailForPasswordReset()))
            ->with('recovery_username', $user->username);
    }

    private function maskEmail(string $email): string
    {
        [$name, $domain] = explode('@', $email, 2);
        $visible = mb_substr($name, 0, 1);

        return $visible.'***@'.$domain;
    }
}
