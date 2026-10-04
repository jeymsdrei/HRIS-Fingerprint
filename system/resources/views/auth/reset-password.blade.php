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
    <h1>Human Resource Information System</h1>
    <p>Password Recovery</p>
</div>

<div class="form-section active recovery-section">

    <h2>Create a new password</h2>
    <p class="role-tag">Final step</p>

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

    <p class="recovery-copy">Confirm your email address and choose a new password for your account.</p>

    <form method="POST" action="{{ route('password.store') }}" data-recovery-form>
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" name="email" id="email" value="{{ old('email', $request->email) }}"
                   placeholder="you@email.com" required autofocus autocomplete="username">
            @if ($errors->has('email'))
                <p class="field-hint match-error">{{ $errors->first('email') }}</p>
            @endif
        </div>

        <div class="form-group">
            <label for="password">New Password</label>
            <div class="password-input-wrap">
                <input type="password" name="password" id="password" placeholder="Enter a new password" required autocomplete="new-password">
                <button type="button" class="password-toggle" id="passwordToggle" data-target="password" aria-label="Show password" title="Show password">
                    <svg class="password-eye" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12Z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                    <svg class="password-eye-off" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M3 3l18 18"></path>
                        <path d="M10.6 5.1A10.7 10.7 0 0 1 12 5c6.5 0 10 7 10 7a18.3 18.3 0 0 1-3.2 4.2"></path>
                        <path d="M6.7 6.7C3.7 8.5 2 12 2 12s3.5 7 10 7a9.8 9.8 0 0 0 3.1-.5"></path>
                        <path d="M9.9 9.9a3 3 0 0 0 4.2 4.2"></path>
                    </svg>
                </button>
            </div>
            <div class="password-strength" id="passwordStrength">
                <div class="strength-bar"><div class="strength-fill"></div></div>
                <div class="strength-text">Password strength</div>
            </div>
            @if ($errors->has('password'))
                <p class="field-hint match-error">{{ $errors->first('password') }}</p>
            @endif
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <div class="password-input-wrap">
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Re-enter your new password" required autocomplete="new-password">
                <button type="button" class="password-toggle" id="confirmToggle" data-target="password_confirmation" aria-label="Show password" title="Show password">
                    <svg class="password-eye" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12Z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                    <svg class="password-eye-off" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M3 3l18 18"></path>
                        <path d="M10.6 5.1A10.7 10.7 0 0 1 12 5c6.5 0 10 7 10 7a18.3 18.3 0 0 1-3.2 4.2"></path>
                        <path d="M6.7 6.7C3.7 8.5 2 12 2 12s3.5 7 10 7a9.8 9.8 0 0 0 3.1-.5"></path>
                        <path d="M9.9 9.9a3 3 0 0 0 4.2 4.2"></path>
                    </svg>
                </button>
            </div>
            <p class="field-hint" id="confirmHint">Both passwords must match.</p>
            @if ($errors->has('password_confirmation'))
                <p class="field-hint match-error">{{ $errors->first('password_confirmation') }}</p>
            @endif
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-primary" id="submitButton">
                <span class="btn-text">Reset Password</span>
                <span class="btn-loader hidden" aria-hidden="true"></span>
            </button>
        </div>
    </form>

    <div class="recovery-footer">
        <a class="back-link" href="{{ route('password.request') }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:16px;height:16px;" aria-hidden="true">
                <path d="M19 12H5"></path>
                <path d="m12 19-7-7 7-7"></path>
            </svg>
            Start Over
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