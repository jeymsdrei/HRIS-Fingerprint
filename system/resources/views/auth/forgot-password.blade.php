<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'HRIS') }} — Forgot Password</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/recovery.css') }}">
</head>
<body>

@php
    $onCodeStep = session('matched_email') !== null;
    $codeLength = 6;
@endphp

<div class="header">
    <h1>Human Resource Information System</h1>
    <p>Password Recovery</p>
</div>

<div class="form-section active recovery-section">

    <!-- STEP INDICATOR -->
    <div class="step-indicator">
        <div class="step active">
            <div class="step-number">{{ $onCodeStep ? '✓' : '1' }}</div>
            <div class="step-label">Identify</div>
        </div>
        <div class="step-connector {{ $onCodeStep ? 'is-complete' : '' }}"></div>
        <div class="step {{ $onCodeStep ? 'active' : '' }}">
            <div class="step-number">2</div>
            <div class="step-label">Verify</div>
        </div>
        <div class="step-connector"></div>
        <div class="step">
            <div class="step-number">3</div>
            <div class="step-label">Reset</div>
        </div>
    </div>

    <h2>{{ $onCodeStep ? 'Enter verification code' : 'Forgot your password?' }}</h2>
    <p class="role-tag">{{ $onCodeStep ? 'Step 2 of 3' : 'Step 1 of 3' }}</p>

    @if (session('status'))
        <div class="form-status">{{ session('status') }}</div>
    @endif

    @if ($errors->any())
        <div class="form-alert">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    @if ($onCodeStep)
        <!-- STEP 2: ACCOUNT FOUND / CODE ENTRY -->
        <div class="email-confirmation-card">
            <div class="card-icon-wrapper">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <rect x="2.5" y="4.5" width="19" height="15" rx="2.5"></rect>
                    <path d="m3 7 9 6 9-6"></path>
                </svg>
            </div>
            <div class="email-card-content">
                <p class="card-message">
                    @if (session('has_user_account'))
                        We found your account. A reset code was sent to
                    @else
                        We found your record. Your login account will be created and a reset code was sent to
                    @endif
                </p>
                <div class="masked-email">{{ session('matched_email') }}</div>
                <p class="card-hint">Enter the {{ $codeLength }}-digit code from that email to continue.</p>
            </div>
        </div>

        <form method="POST" action="{{ route('password.code.verify.post') }}" data-recovery-form autocomplete="one-time-code">
            @csrf
            <input type="hidden" name="username" value="{{ session('recovery_username') }}">
            <input type="hidden" name="email" value="{{ session('matched_email_full') }}">
            <input type="hidden" name="code" id="codeValue">

            <div class="form-group">
                <label>Verification code</label>
                <div class="otp-inputs" data-length="{{ $codeLength }}" data-target="codeValue" data-previous="{{ old('code') }}">
                    @for ($i = 0; $i < $codeLength; $i++)
                        <input type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1"
                               class="otp-box" data-index="{{ $i }}"
                               autocomplete="{{ $i === 0 ? 'one-time-code' : 'off' }}"
                               aria-label="Digit {{ $i + 1 }} of {{ $codeLength }}">
                    @endfor
                </div>
                <noscript>
                    <input type="text" name="code" class="otp-fallback" maxlength="{{ $codeLength }}"
                           inputmode="numeric" placeholder="{{ str_repeat('0', $codeLength) }}" required>
                </noscript>
                @if ($errors->has('code'))
                    <p class="field-hint match-error">{{ $errors->first('code') }}</p>
                @else
                    <p class="field-hint">Codes expire after a limited time. Check your spam folder if it hasn't arrived.</p>
                @endif
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-primary" id="submitButton">
                    <span class="btn-text">Verify Code</span>
                    <span class="btn-loader hidden" aria-hidden="true"></span>
                </button>
            </div>
        </form>

        <div class="resend-code">
            <p>Didn't receive the code?</p>
            <a href="#" onclick="event.preventDefault(); document.getElementById('resend-form').submit();">Resend code</a>
        </div>

        <form id="resend-form" method="POST" action="{{ route('password.email') }}" class="hidden">
            @csrf
            <input type="hidden" name="action" value="send_username">
            <input type="hidden" name="username" value="{{ session('recovery_username') }}">
        </form>

    @else
        <!-- STEP 1: IDENTIFY ACCOUNT -->
        <p class="recovery-copy">Enter the username or email address saved on your employee record and we'll send you a password reset code.</p>

        <form method="POST" action="{{ route('password.email') }}" data-recovery-form>
            @csrf
            <input type="hidden" name="action" value="lookup_username">

            <div class="form-group">
                <label for="username">Username or Email</label>
                <div class="password-input-wrap" style="position:relative;">
                    <input type="text" name="username" id="username" value="{{ old('username') }}"
                           placeholder="e.g. username or you@email.com" required autofocus autocomplete="username">
                    <span class="field-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="8" r="4"></circle>
                            <path d="M4 21c0-4 3.6-6.5 8-6.5s8 2.5 8 6.5"></path>
                        </svg>
                    </span>
                </div>
                @if ($errors->has('username'))
                    <p class="field-hint match-error">{{ $errors->first('username') }}</p>
                @else
                    <p class="field-hint">Use the same username you use to log in.</p>
                @endif
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-primary">
                    <span class="btn-text">Find My Account</span>
                    <span class="btn-loader hidden" aria-hidden="true"></span>
                </button>
            </div>
        </form>
    @endif

    <div class="recovery-footer">
        <a class="back-link" href="{{ route('login') }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:16px;height:16px;" aria-hidden="true">
                <path d="M19 12H5"></path>
                <path d="m12 19-7-7 7-7"></path>
            </svg>
            Back to Login
        </a>
    </div>
</div>

<div class="login-loading-overlay" id="recoveryLoadingOverlay" hidden role="status" aria-live="polite" aria-label="Loading">
    <span class="login-loading-spinner" aria-hidden="true"></span>
    <span>Loading...</span>
</div>

<script src="{{ asset('js/recovery.js') }}"></script>
</body>
</html>