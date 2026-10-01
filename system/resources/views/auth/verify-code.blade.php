<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'HRIS') }} — Verify Code</title>
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
            <div class="step active" data-step="2">
                <span class="step-number">2</span>
                <span class="step-label">Verify Code</span>
            </div>
            <div class="step-connector"></div>
            <div class="step" data-step="3">
                <span class="step-number">3</span>
                <span class="step-label">New Password</span>
            </div>
        </div>

        <h2>Verify Your Identity</h2>
        <p class="recovery-copy">Enter the 6-digit code sent to your email address.</p>

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

        @if (session('matched_email'))
            <div class="email-confirmation-card">
                <div class="card-icon-wrapper">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                        <polyline points="22,6 12,13 2,6"/>
                    </svg>
                </div>
                <div class="card-content">
                    <p class="card-message">Code sent to:</p>
                    <div class="masked-email">{{ session('matched_email') }}</div>
                </div>
            </div>
        @endif

        <form method="POST" action="{{ route('password.code.verify') }}" id="verify-code-form">
            @csrf
            <input type="hidden" name="email" value="{{ old('email') ?? $request->query('email') }}">

            <div class="form-group">
                <label for="code">Verification Code</label>
                <div class="code-input-wrapper">
                    <input id="code" type="text" name="code" value="{{ old('code') }}" placeholder="000000" autocomplete="one-time-code" required maxlength="6" minlength="6" inputmode="numeric" pattern="[0-9]*" autofocus aria-label="Enter 6-digit code">
                </div>
                <p class="field-hint">Enter the 6-digit code sent to your email</p>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-primary" id="verify-btn">
                    <span class="btn-text">Verify Code</span>
                    <span class="btn-loader hidden"></span>
                </button>
            </div>
        </form>

        <div class="resend-code">
            <p>Didn't receive the code? <a href="{{ route('password.email') }}">Request a new code</a></p>
        </div>

        <div class="recovery-footer">
            <a class="back-link" href="{{ route('password.email') }}">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="19" y1="12" x2="5" y2="12"/>
                    <polyline points="12 19 5 12 12 5"/>
                </svg>
                Back to Username
            </a>
        </div>
    </main>

    <script>
        // Code input auto-format
        const codeInput = document.getElementById('code');
        if (codeInput) {
            codeInput.addEventListener('input', (e) => {
                e.target.value = e.target.value.replace(/[^0-9]/g, '');
            });
        }

        // Form submission loading state
        document.getElementById('verify-code-form')?.addEventListener('submit', () => {
            const btn = document.getElementById('verify-btn');
            if (btn) {
                btn.classList.add('is-submitting');
                btn.querySelector('.btn-text').classList.add('hidden');
                btn.querySelector('.btn-loader').classList.remove('hidden');
            }
        });
    </script>
</body>
</html>