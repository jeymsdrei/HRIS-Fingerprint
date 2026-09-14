<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'HRIS') }} — Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>

@php
    // Map a chosen role to a demo account so the form is usable immediately.
    $demoAccounts = [
        'Teaching Personnel'    => ['jane.santos', 'password'],
        'Non-Teaching Personnel' => ['carlos.garcia', 'password'],
        'HR Officer'            => ['hr', 'password'],
        'Payroll Officer'       => ['payroll', 'password'],
        'Department Head'       => ['depthead', 'password'],
        'Administrative'        => ['admin', 'password'],
    ];
    $preselectedRole = session('preselected_role');
@endphp



<div class="header">
    <h1>Human Resource Information System</h1>
</div>

<div class="cards-container" id="mainCards">

    <!-- EMPLOYEE CARD -->
    <div class="card" id="employeeCard" onclick="location.href='#card'">
        <div class="card-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="7" width="18" height="13" rx="2"></rect>
                <path d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                <line x1="3" y1="12" x2="21" y2="12"></line>
            </svg>
        </div>

        <div class="card-content">
            <h2>Employee</h2>
            <p>Access for teaching &amp; non-teaching staff members of the school.</p>
            <button class="card-btn" onclick="event.stopPropagation(); showEmployeeOptions()">Select Role</button>

            <div class="sub-options" id="employeeOptions">
                <button type="button" class="sub-btn" onclick="openForm('Teaching Personnel')">Teaching Personnel</button>
                <button type="button" class="sub-btn" onclick="openForm('Non-Teaching Personnel')">Non-Teaching Personnel</button>
            </div>
        </div>
    </div>

    <!-- ADMINISTRATIVE CARD -->
    <div class="card admin" id="adminCard">
        <div class="card-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 2 4 5v6c0 5 3.5 9 8 11 4.5-2 8-6 8-11V5l-8-3Z"></path>
            </svg>
        </div>

        <div class="card-content">
            <h2>Administrative</h2>
            <p>For school administrators, principals, HR, payroll &amp; management staff.</p>
            <button class="card-btn" onclick="openForm('Administrative')">Select Role</button>
        </div>
    </div>
</div>

<!-- LOGIN FORM -->
<div class="form-section" id="formSection">
    <h2 id="formTitle">Welcome back</h2>
    <p class="role-tag" id="roleTag" aria-live="polite">Role: —</p>

    <form method="POST" action="{{ route('login') }}" id="loginForm">
        @csrf
        <input type="hidden" name="role" id="roleInput" value="{{ old('role', $preselectedRole ?? '') }}">

        @if ($errors->any())
            <div class="form-alert">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        @if (session('status'))
            <div class="form-status">{{ session('status') }}</div>
        @endif

        <div class="form-group">
            <label for="usernameInput">Username</label>
            <input type="text" name="username" id="usernameInput" value="{{ old('username') }}" placeholder="Your username" required autofocus>
        </div>

        <div class="form-group">
            <label for="passwordInput">Password</label>
            <input type="password" name="password" id="passwordInput" placeholder="Your password" required>
        </div>

        <label class="form-check">
            <input type="checkbox" name="remember" id="remember_me">
            <span>Remember me</span>
        </label>

        @if (Route::has('password.request'))
            <p style="text-align:right; margin-bottom:12px;">
                <a href="{{ route('password.request') }}" style="font-size:0.85rem; color:#2b6cb0; text-decoration:none;">Forgot password?</a>
            </p>
        @endif

        <div class="form-actions">
            <button type="submit" class="btn-primary">Login</button>
            <button type="button" class="btn-secondary" onclick="goBack()">Back</button>
        </div>
    </form>

    <div class="demo-hint">
        Demo logins (password: <code>password</code>)<br>
        <code>admin</code> · <code>hr</code> · <code>payroll</code> · <code>depthead</code> · any employee seeded account
    </div>
</div>

<script>
    const demoAccounts = @json($demoAccounts);

    function showEmployeeOptions() {
        document.getElementById('employeeOptions').classList.toggle('active');
    }

    function openForm(role) {
        document.getElementById('mainCards').style.display = 'none';
        document.getElementById('formSection').classList.remove('is-submitting');
        document.getElementById('formSection').classList.add('active');
        document.getElementById('roleTag').textContent = 'Role: ' + role;
        document.getElementById('roleInput').value = role;

        const demo = demoAccounts[role];
        if (demo) {
            document.getElementById('usernameInput').value = demo[0];
            document.getElementById('passwordInput').value = demo[1];
        } else {
            document.getElementById('usernameInput').value = '';
            document.getElementById('passwordInput').value = '';
        }
        document.getElementById('usernameInput').focus();
    }

    function goBack() {
        document.getElementById('formSection').classList.remove('active', 'is-submitting');
        document.getElementById('mainCards').style.display = 'flex';
        document.getElementById('employeeOptions').classList.remove('active');
    }

    document.getElementById('loginForm').addEventListener('submit', function () {
        document.getElementById('formSection').classList.add('is-submitting');
    });

    // If the session forced a preselected role (e.g. validation error), auto-open it.
    (function () {
        const preselected = @json(session('preselected_role'));
        if (preselected && document.getElementById('formSection')) {
            document.getElementById('mainCards').style.display = 'none';
            document.getElementById('formSection').classList.add('active');
            document.getElementById('roleTag').textContent = 'Role: ' + preselected;
            document.getElementById('roleInput').value = preselected;
        }
    })();
</script>

<style>
    .bg-photo {
        position: fixed;
        top: 0;
        right: 0;
        width: 40vw;
        height: 40vh;
        z-index: -1;
        opacity: 0.9;
    }
    .bg-photo svg {
        width: 100%;
        height: 100%;
        display: block;
    }
    .bg-photo-tint {
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(124,0,0,0.15), transparent 60%);
    }
</style>
</body>
</html>