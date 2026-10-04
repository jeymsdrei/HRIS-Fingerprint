<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\User;
use App\Services\EmailMask;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
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
            $result = $this->findUserByUsernameOrName($data['username']);

            if (! $result) {
                return back()->withInput()->withErrors([
                    'username' => 'No account found with that username or name. Try using your email instead.',
                ]);
            }

            [$user, $email] = $result;

            return back()->with('recovery_username', $user?->username ?? '')
                ->with('matched_email', $this->maskEmail($email))
                ->with('matched_email_full', $email)
                ->with('has_user_account', (bool) $user);
        }

        if ($action === 'send_username') {
            $request->validate(['username' => ['required', 'string', 'max:255']]);
            $result = $this->findUserByUsernameOrName($data['username']);

            if (! $result) {
                return back()->withInput()->withErrors([
                    'username' => 'No account found with that username or name.',
                ]);
            }

            [$user, $email] = $result;

            $user = $user ?? $this->createUserForEmployee($result[1] ?? null, $email);

            if (! $user || ! $this->syncRecoveryEmail($user, $email)) {
                return back()->withInput()->withErrors([
                    'username' => 'We could not send a reset code for this account. Please use email recovery or contact your administrator.',
                ]);
            }

            return $this->sendResetCode($user, $request);
        }

        $request->validate(['email' => ['required', 'email']]);
        $result = $this->findUserByEmail($data['email']);

        if (! $result) {
            return back()->withInput()->with('status', 'If the email exists in our system, a password reset code has been sent.');
        }

        [$user, $email] = $result;

        $user = $user ?? $this->createUserForEmployee($email, $email);

        if (! $user || ! $this->syncRecoveryEmail($user, $email)) {
            return back()->withInput()->with('status', 'If the email exists in our system, a password reset code has been sent.');
        }

        return $this->sendResetCode($user, $request);
    }

    /**
     * Find user by username, or by employee name/email if no user account exists.
     */
    private function findUserByUsernameOrName(string $input): ?array
    {
        $input = trim($input);

        // 1. Try exact username match in users table
        $user = User::query()
            ->with('employee')
            ->where('username', $input)
            ->where('role', 'employee')
            ->whereHas('employee', fn ($query) => $query->whereIn('classification', [
                Employee::CLASSIFICATION_TEACHING,
                Employee::CLASSIFICATION_NON_TEACHING,
            ]))
            ->first();

        if ($user && $user->employee?->email) {
            return [$user, $user->employee->email];
        }

        // 2. Try to find employee by name (first + last) or email
        $employee = Employee::query()
            ->whereIn('classification', [
                Employee::CLASSIFICATION_TEACHING,
                Employee::CLASSIFICATION_NON_TEACHING,
            ])
            ->where(function ($query) use ($input) {
                // Match by full name (case insensitive) - use || for SQLite compatibility
                $query->whereRaw("first_name || ' ' || last_name LIKE ?", [$input])
                    ->orWhereRaw("first_name || ' ' || COALESCE(middle_name, '') || ' ' || last_name LIKE ?", [$input])
                    // Match by email
                    ->orWhere('email', $input);
            })
            ->first();

        if ($employee && $employee->email) {
            $user = $employee->user; // may be null if no user account
            return [$user, $employee->email];
        }

        return null;
    }

    /**
     * Find user by email (checks users table first, then employees table).
     */
    private function findUserByEmail(string $email): ?array
    {
        // 1. Check users table (email or employee->email)
        $user = User::query()
            ->with('employee')
            ->where('role', 'employee')
            ->where(function ($query) use ($email) {
                $query->where('email', $email)
                    ->orWhereHas('employee', fn ($q) => $q->where('email', $email));
            })
            ->whereHas('employee', fn ($query) => $query->whereIn('classification', [
                Employee::CLASSIFICATION_TEACHING,
                Employee::CLASSIFICATION_NON_TEACHING,
            ]))
            ->first();

        if ($user) {
            $email = $user->employee?->email ?? $user->email;
            return [$user, $email];
        }

        // 2. Check employees table directly
        $employee = Employee::query()
            ->whereIn('classification', [
                Employee::CLASSIFICATION_TEACHING,
                Employee::CLASSIFICATION_NON_TEACHING,
            ])
            ->where('email', $email)
            ->first();

        if ($employee) {
            return [$employee->user, $employee->email];
        }

        return null;
    }

    /**
     * Create a user account for an employee who doesn't have one.
     */
    private function createUserForEmployee(?string $identifier, string $email): ?User
    {
        $employee = Employee::where('email', $email)
            ->whereIn('classification', [
                Employee::CLASSIFICATION_TEACHING,
                Employee::CLASSIFICATION_NON_TEACHING,
            ])
            ->first();

        if (! $employee) {
            return null;
        }

        if ($employee->user) {
            return $employee->user;
        }

        // Generate username from email or employee_id
        $baseUsername = strtolower(str_replace([' ', '.', '@'], ['', '_', '_'], explode('@', $email)[0]));
        $username = $baseUsername;
        $counter = 1;
        while (User::where('username', $username)->exists()) {
            $username = $baseUsername . $counter;
            $counter++;
        }

        $user = User::create([
            'name' => $employee->full_name,
            'email' => $email,
            'username' => $username,
            'password' => Hash::make(Str::random(16)), // random temporary password
            'role' => 'employee',
            'employee_id' => $employee->id,
            'is_active' => true,
        ]);

        return $user;
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
            ->with('matched_email_full', $user->getEmailForPasswordReset())
            ->with('recovery_username', $user->username);
    }

    private function maskEmail(string $email): string
    {
        return EmailMask::mask($email);
    }
}
