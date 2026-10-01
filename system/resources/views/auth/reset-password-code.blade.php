<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'HRIS') }} — Reset Password</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/recovery.css') }}">
</head>
<body>
    <div class="header">
        <div class="eyebrow">
            <div class="logo-icon">
                <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#65151d" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 2L2 7l10 5 10-5-10-5z"/>
                    <path d="M2 17l10 5 10-5"/>
                    <path d="M2 12l10 5 10-5"/>
                </svg>
            </div>
        </div>
        <h1>HRIS</h1>
        <p>Human Resource Information System</p>
    </div>

    <main class="form-section active recovery-section">
        <div class="step-indicator">
            <div class="step completed" data-step="1">
                <span class="step-number">1</span>
                <span class="step-label">Username</span>
            </div>
            <div class="step-connector"></div>
            <div class="step completed" data-step="2">
                <span class="step-number">2</span>
                <span class="step-label">Verify Code</span>
            </div>
            <div class="step-connector"></div>
            <div class="step active" data-step="3">
                <span class="step-number">3</span>
                <span class="step-label">New Password</span>
            </div>
        </div>

        <h2>Create New Password</h2>
        <p class="recovery-copy">Your code has been verified. Please enter your new password below.</p>

        @if (session('status'))
            <div class="form-status" role="status">{{ session('status') }}</div>
        @endif

        @if ($errors->any())
            <div class="form-alert" role="alert">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('password.reset.code') }}" id="reset-password-form">
            @csrf
            <input type="hidden" name="email" value="{{ $email }}">
            <input type="hidden" name="code" value="{{ $code }}">

            <div class="form-group">
                <label for="password">New Password</label>
                <div class="password-input-wrap">
                    <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="Create a strong password" autofocus>
                    <button type="button" class="password-toggle" aria-label="Toggle password visibility">
                        <svg class="password-eye" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        <svg class="password-eye-off" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
                    </button>
                </div>
                <div class="password-strength" id="password-strength">
                    <div class="strength-bar">
                        <div class="strength-fill" id="strength-fill"></div>
                    </div>
                    <span class="strength-text" id="strength-text">Password strength</span>
                </div>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm New Password</label>
                <div class="password-input-wrap">
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your new password">
                    <button type="button" class="password-toggle" aria-label="Toggle password visibility">
                        <svg class="password-eye" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        <svg class="password-eye-off" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
                    </button>
                </div>
                <p class="field-hint" id="match-hint"></p>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-primary" id="reset-btn" disabled>
                    <span class="btn-text">Reset Password</span>
                    <span class="btn-loader hidden"></span>
                </button>
            </div>
        </form>

        <div class="recovery-footer">
            <a class="back-link" href="{{ route('password.code.verify') }}">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="19" y1="12" x2="5" y2="12"/>
                    <polyline points="12 19 5 12 12 5"/>
                </svg>
                Back to Code Verification
            </a>
        </div>
    </main>

    <script>
        // Password toggle functionality
        document.querySelectorAll('.password-toggle').forEach(toggle => {
            toggle.addEventListener('click', () => {
                const input = toggle.parentElement.querySelector('input');
                const isVisible = toggle.classList.toggle('is-visible');
                input.type = isVisible ? 'text' : 'password';
            });
        });

        // Password strength meter
        const passwordInput = document.getElementById('password');
        const confirmInput = document.getElementById('password_confirmation');
        const strengthFill = document.getElementById('strength-fill');
        const strengthText = document.getElementById('strength-text');
        const matchHint = document.getElementById('match-hint');
        const resetBtn = document.getElementById('reset-btn');

        function checkPasswordStrength(password) {
            let strength = 0;
            if (password.length >= 8) strength++;
            if (/[A-Z]/.test(password)) strength++;
            if (/[a-z]/.test(password)) strength++;
            if (/[0-9]/.test(password)) strength++;
            if (/[^A-Za-z0-9]/.test(password)) strength++;
            return Math.min(strength, 4);
        }

        passwordInput.addEventListener('input', () => {
            const password = passwordInput.value;
            const strength = checkPasswordStrength(password);

            strengthFill.style.width = `${strength * 25}%`;
            strengthFill.className = 'strength-fill';

            if (password.length === 0) {
                strengthText.textContent = 'Password strength';
                strengthFill.style.width = '0%';
            } else if (strength <= 1) {
                strengthText.textContent = 'Weak';
                strengthFill.classList.add('strength-weak');
            } else if (strength === 2) {
                strengthText.textContent = 'Fair';
                strengthFill.classList.add('strength-fair');
            } else if (strength === 3) {
                strengthText.textContent = 'Good';
                strengthFill.classList.add('strength-good');
            } else {
                strengthText.textContent = 'Strong';
                strengthFill.classList.add('strength-strong');
            }

            validateForm();
        });

        confirmInput.addEventListener('input', validateForm);

        function validateForm() {
            const password = passwordInput.value;
            const confirm = confirmInput.value;
            const strength = checkPasswordStrength(password);
            const match = password === confirm && password.length > 0;

            if (confirm.length > 0) {
                if (match) {
                    matchHint.textContent = 'Passwords match';
                    matchHint.className = 'field-hint match-success';
                } else {
                    matchHint.textContent = 'Passwords do not match';
                    matchHint.className = 'field-hint match-error';
                }
            } else {
                matchHint.textContent = '';
                matchHint.className = 'field-hint';
            }

            resetBtn.disabled = !(strength >= 3 && match && password.length >= 8);
        }

        // Form submission loading state
        document.getElementById('reset-password-form')?.addEventListener('submit', () => {
            const btn = document.getElementById('reset-btn');
            if (btn) {
                btn.classList.add('is-submitting');
                btn.querySelector('.btn-text').classList.add('hidden');
                btn.querySelector('.btn-loader').classList.remove('hidden');
            }
        });
    </script>
</body>
</html>