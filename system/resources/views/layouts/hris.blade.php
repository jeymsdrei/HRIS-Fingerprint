<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'HRIS' }} - Human Resource Information System</title>
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lucide@0.263.1/dist/umd/lucide.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-slate-50">
<div class="flex h-screen overflow-hidden" x-data="{ sidebarOpen: false }">

    {{-- ===== SIDEBAR ===== --}}
    <aside class="sidebar"
           :class="sidebarOpen ? 'sidebar-open' : ''">
        <!-- Logo Section -->
        <div class="sidebar-logo">
            <img src="{{ asset('/pictures/logocasaul.png') }}"
                 alt="HRIS Logo"
                 class="h-10 w-10 object-contain flex-shrink-0">
            <div class="flex-1">
            <p class="text-maroon-900 font-bold leading-tight text-sm">HRIS</p>
            <p class="text-maroon-600 text-xs">Human Resources</p>
            </div>
        </div>

        {{-- Navigation --}}
        <nav class="sidebar-nav" id="sidebar-navigation">
            @php $role = auth()->user()->role; @endphp

            {{-- Dashboard --}}
            <div>
                <a href="{{ route('dashboard') }}"
                   class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9m-9 11l4-4"></path>
                    </svg>
                    <span>Dashboard</span>
                </a>
            </div>

            {{-- Employee Self-Service --}}
            @if(auth()->user()->employee)
            <div>
                <p class="sidebar-section-label">My Records</p>
                <a href="{{ route('employee.attendance') }}" 
                   class="sidebar-link {{ $role == 'employee' && request()->routeIs('employee.attendance*') ? 'active' : '' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>My Attendance</span>
                </a>
                <a href="{{ route('employee.schedule') }}" 
                   class="sidebar-link {{ $role == 'employee' && request()->routeIs('employee.schedule*') ? 'active' : '' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <span>My Schedule</span>
                </a>
                @if ($role === 'employee')
                    <a href="{{ route('employee.makeup.index') }}" 
                       class="sidebar-link {{ request()->routeIs('employee.makeup*') ? 'active' : '' }}">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        <span>My Make-Up Classes</span>
                    </a>
                @endif
                <a href="{{ route('employee.payslips') }}" 
                   class="sidebar-link {{ $role == 'employee' && request()->routeIs('employee.payslips*') ? 'active' : '' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 012 12V7a2 2 0 012-2z"></path>
                    </svg>
                    <span>My Payslips</span>
                </a>
                <a href="{{ route('employee.receipts') }}" 
                   class="sidebar-link {{ $role == 'employee' && request()->routeIs('employee.receipts*') ? 'active' : '' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>My Receipts</span>
                </a>
                <a href="{{ route('employee.history') }}" 
                   class="sidebar-link {{ $role == 'employee' && request()->routeIs('employee.history*') ? 'active' : '' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8L5.257 19.087A2 2 0 005 18.172V4a2 2 0 012-2h14a2 2 0 012 2v10"></path>
                    </svg>
                    <span>Payroll History</span>
                </a>
            </div>
            @endif

            {{-- HR & Admin --}}
            @if(auth()->user()->isHr())
            <div>
                <p class="sidebar-section-label">Human Resources</p>
                <a href="{{ route('employees.index') }}" 
                   class="sidebar-link {{ request()->routeIs('employees.*') ? 'active' : '' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 12H9m6 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>Employees</span>
                </a>
                <a href="{{ route('schedules.index') }}" 
                   class="sidebar-link {{ request()->routeIs('schedules*') && !request()->routeIs('department.schedules') ? 'active' : '' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <span>Schedules</span>
                </a>
                <a href="{{ route('attendance.index') }}" 
                   class="sidebar-link {{ request()->routeIs('attendance*') && !request()->routeIs('department.attendance') ? 'active' : '' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                    <span>Attendance</span>
                </a>
                <a href="{{ route('makeup.index') }}" 
                   class="sidebar-link {{ request()->routeIs('makeup.*') ? 'active' : '' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    <span>Make-Up Classes</span>
                </a>
                <a href="{{ route('clearances.index') }}" 
                   class="sidebar-link {{ request()->routeIs('clearances.*') ? 'active' : '' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>Clearances</span>
                </a>
            </div>
            @endif

            {{-- Payroll --}}
            @if (auth()->user()->isPayroll() && !in_array($role, ['hr']))
            <div>
                <p class="sidebar-section-label">Payroll</p>
                <a href="{{ route('payroll.index') }}" 
                   class="sidebar-link {{ request()->routeIs('payroll*') ? 'active' : '' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>Payroll</span>
                </a>
                <a href="{{ route('payslips.index') }}" 
                   class="sidebar-link {{ request()->routeIs('payslips*') ? 'active' : '' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 012 12V7a2 2 0 012-2z"></path>
                    </svg>
                    <span>Payslips</span>
                </a>
                <a href="{{ route('receipts.index') }}" 
                   class="sidebar-link {{ request()->routeIs('receipts*') && !request()->routeIs('employee.receipts*') ? 'active' : '' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7 12a5 5 0 1010 0 5 5 0 01-10 0z"></path>
                    </svg>
                    <span>Receipts</span>
                </a>
                <a href="{{ route('benefits.index') }}" 
                   class="sidebar-link {{ request()->routeIs('benefits*') ? 'active' : '' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>Benefits</span>
                </a>
                <a href="{{ route('loans.index') }}" 
                   class="sidebar-link {{ request()->routeIs('loans*') ? 'active' : '' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 6M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 6M18 7l3 9"></path>
                    </svg>
                    <span>Loans</span>
                </a>
            </div>
            @endif

            {{-- Reports --}}
            @if (auth()->user()->isPayroll() || $role === 'department_head')
            <div>
                <p class="sidebar-section-label">Reports</p>
                <a href="{{ route('reports.index') }}" 
                   class="sidebar-link {{ request()->routeIs('reports*') ? 'active' : '' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                    <span>Reports & Export</span>
                </a>
            </div>
            @endif

            {{-- Department Head --}}
            @if ($role === 'department_head')
            <div>
                <p class="sidebar-section-label">Department</p>
                <a href="{{ route('department.attendance') }}" 
                   class="sidebar-link {{ request()->routeIs('department.attendance') ? 'active' : '' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                    <span>Attendance</span>
                </a>
                <a href="{{ route('department.schedules') }}" 
                   class="sidebar-link {{ request()->routeIs('department.schedules') ? 'active' : '' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <span>Teaching Schedules</span>
                </a>
            </div>
            @endif

            {{-- Administration --}}
            @if ($role === 'admin')
            <div>
                <p class="sidebar-section-label">Administration</p>
                <a href="{{ route('users.index') }}" 
                   class="sidebar-link {{ request()->routeIs('users*') ? 'active' : '' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                    <span>Users & Permissions</span>
                </a>
                <a href="{{ route('departments.index') }}" 
                   class="sidebar-link {{ request()->routeIs('departments*') ? 'active' : '' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"></path>
                    </svg>
                    <span>Departments & Positions</span>
                </a>
                <a href="{{ route('masterdata.index') }}" 
                   class="sidebar-link {{ request()->routeIs('masterdata*') ? 'active' : '' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C6.5 6.253 2 10.998 2 17s4.5 10.747 10 10.747c5.5 0 10-4.998 10-10.747S17.5 6.253 12 6.253z"></path>
                    </svg>
                    <span>Courses / Subjects / Rooms</span>
                </a>
                <a href="{{ route('biometrics.index') }}" 
                   class="sidebar-link {{ request()->routeIs('biometrics*') && !request()->routeIs('biometrics.punches') ? 'active' : '' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m5.506-11.071h.008v.008h-.008v-.008zM15 11h.01v.01H15V11z"></path>
                    </svg>
                    <span>Biometric Devices</span>
                </a>
                <a href="{{ route('settings.payroll') }}" 
                   class="sidebar-link {{ request()->routeIs('settings*') ? 'active' : '' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <span>Payroll Settings</span>
                </a>
                <a href="{{ route('archives.index') }}" 
                   class="sidebar-link {{ request()->routeIs('archives*') ? 'active' : '' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                    </svg>
                    <span>Archives</span>
                </a>
            </div>
            @endif
        </nav>

        {{-- Logout --}}
        <div class="border-t border-[#eaddc2] p-4">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="sidebar-link w-full justify-start hover:bg-red-50 hover:text-red-700">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    <span>Sign Out</span>
                </button>
            </form>
        </div>
    </aside>

    {{-- Mobile drawer overlay (only on small screens) --}}
    <div class="fixed inset-0 z-30 bg-black/50 md:hidden"
         :class="sidebarOpen ? 'block' : 'hidden'"
         @click="sidebarOpen = false"></div>

    {{-- ===== MAIN CONTENT AREA ===== --}}
    <div class="app-main">
        {{-- Header --}}
        <header class="app-header">
            <div class="header-content">
                {{-- Left: Menu Toggle & Date --}}
                <div class="flex items-center gap-4 flex-1 min-w-0">
                    <button class="p-2 text-[#57493a] hover:bg-[#efe6cf] rounded-lg transition-colors duration-fast md:hidden"
                            @click="sidebarOpen = !sidebarOpen" aria-label="Toggle menu">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                    <div class="hidden md:block min-w-0">
                        <p class="text-xs text-slate-500">{{ now()->format('l, F d, Y') }}</p>
                    </div>
                </div>

                {{-- Right: Notifications & User Menu --}}
                <div class="flex items-center gap-4">
                    {{-- Notifications --}}
                    <a href="{{ route('notifications.index') }}" 
                       class="relative p-2 text-slate-600 hover:bg-slate-100 rounded-lg transition-colors duration-fast group">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                        </svg>
                        @php $unread = App\Models\Notification::where('notifiable_id', auth()->id())->where('read', false)->count(); @endphp
                        @if ($unread > 0)
                            <span class="absolute top-0 right-0 h-5 w-5 rounded-full bg-red-500 text-white text-xs font-bold flex items-center justify-center">{{ $unread }}</span>
                        @endif
                    </a>

                    {{-- User Menu --}}
                    <div class="flex items-center gap-3" x-data="{ open: false }" @click.outside="open = false">
                        <button @click="open = !open" class="flex items-center gap-2 p-2 hover:bg-slate-100 rounded-lg transition-colors duration-fast">
                            <span class="h-8 w-8 rounded-lg bg-gradient-to-br from-indigo-600 to-indigo-700 text-white flex items-center justify-center text-xs font-bold shadow-sm">
                                {{ mb_strtoupper(mb_substr(auth()->user()->name, 0, 1)) }}
                            </span>
                            <div class="hidden sm:block text-left">
                                <span class="block text-sm font-medium text-slate-900 leading-tight">{{ auth()->user()->name }}</span>
                                <span class="block text-xs text-slate-500">{{ auth()->user()->roleLabel() }}</span>
                            </div>
                            <svg class="w-4 h-4 text-slate-400 hidden sm:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                            </svg>
                        </button>

                        {{-- Dropdown Menu --}}
                        <div x-show="open" x-cloak
                             class="absolute right-0 top-full mt-2 w-64 rounded-xl bg-white shadow-xl border border-slate-200 py-1 z-50">
                            <a href="{{ route('profile.edit') }}" 
                               class="block px-4 py-2.5 text-sm text-slate-700 hover:bg-slate-50 transition-colors duration-fast">
                                <span class="font-medium">Profile & Password</span>
                            </a>
                            <a href="{{ route('notifications.index') }}" 
                               class="block px-4 py-2.5 text-sm text-slate-700 hover:bg-slate-50 transition-colors duration-fast">
                                <span class="font-medium">Notifications</span>
                            </a>
                            <div class="border-t border-slate-100 my-1"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="w-full text-left px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 transition-colors duration-fast font-medium">
                                    Sign Out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        {{-- Page Content --}}
        <main class="page-content relative" x-data="pageLoader()">
            {{-- Global page-load skeleton overlay --}}
            <div x-show="loading" x-cloak
                 x-transition:leave="transition-opacity duration-300"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="absolute inset-0 z-30 bg-slate-50 p-6 overflow-y-auto">
                {{-- Skeleton header --}}
                <div class="mb-8 space-y-3">
                    <div class="skeleton-title w-48"></div>
                    <div class="skeleton-text-sm w-72"></div>
                </div>

                {{-- Skeleton filter card --}}
                <div class="mb-8 card p-6 space-y-4">
                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                        <div class="skeleton-text h-10"></div>
                        <div class="skeleton-text h-10"></div>
                        <div class="skeleton-text h-10"></div>
                        <div class="skeleton-text h-10"></div>
                    </div>
                </div>

                {{-- Skeleton KPI cards --}}
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    @for ($i = 0; $i < 4; $i++)
                        <div class="card p-6 space-y-3">
                            <div class="skeleton-text-sm w-24"></div>
                            <div class="skeleton-title w-20"></div>
                            <div class="skeleton-text-sm w-32"></div>
                        </div>
                    @endfor
                </div>

                {{-- Skeleton content blocks --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                    <div class="card p-6">
                        <div class="skeleton-text w-32 mb-6"></div>
                        <div class="skeleton-chart h-64"></div>
                    </div>
                    <div class="card p-6">
                        <div class="skeleton-text w-32 mb-6"></div>
                        <div class="skeleton-chart h-64"></div>
                    </div>
                </div>
            </div>

            {{-- Real content (fades in) --}}
            <div x-show="!loading"
                 x-transition:enter="transition-opacity duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100">
                {{ $slot }}
            </div>
        </main>
    </div>
</div>

<div id="action-loading-overlay" hidden style="position:fixed;inset:0;z-index:9999;display:none;align-items:center;justify-content:center;background:rgba(248,250,252,.78);backdrop-filter:blur(2px);">
    <div style="display:flex;align-items:center;gap:.75rem;border:1px solid #e2e8f0;border-radius:.75rem;background:#fff;padding:.75rem 1rem;box-shadow:0 10px 25px rgba(15,23,42,.12);font-size:.875rem;font-weight:600;color:#334155;">
        <span style="height:1rem;width:1rem;border:2px solid #cbd5e1;border-top-color:#4f46e5;border-radius:9999px;animation:action-loading-spin .7s linear infinite;"></span>
        Loading...
    </div>
</div>

<style>
    @keyframes action-loading-spin { to { transform: rotate(360deg); } }
</style>

<script>
    (() => {
        const sidebar = document.getElementById('sidebar-navigation');
        const storageKey = 'hris-sidebar-scroll-top-fallback';

        if (!sidebar) {
            return;
        }

        const saveSidebarPosition = () => {
            sessionStorage.setItem(storageKey, String(sidebar.scrollTop));
        };

        const restoreSidebarPosition = () => {
            const savedPosition = Number(sessionStorage.getItem(storageKey));

            if (Number.isFinite(savedPosition)) {
                sidebar.scrollTop = savedPosition;
            }
        };

        sidebar.addEventListener('scroll', saveSidebarPosition, { passive: true });
        document.addEventListener('click', (event) => {
            if (event.target.closest('#sidebar-navigation')) {
                saveSidebarPosition();
            }
        }, true);
        window.addEventListener('beforeunload', saveSidebarPosition);
        window.addEventListener('pageshow', restoreSidebarPosition);
        restoreSidebarPosition();
        requestAnimationFrame(restoreSidebarPosition);
        setTimeout(restoreSidebarPosition, 0);
    })();

    var actionLoadingOverlay = document.getElementById('action-loading-overlay');

    function showActionLoading() {
        if (actionLoadingOverlay) {
            actionLoadingOverlay.hidden = false;
            actionLoadingOverlay.style.display = 'flex';
            window.setTimeout(function () {
                actionLoadingOverlay.hidden = true;
                actionLoadingOverlay.style.display = 'none';
            }, 500);
        }
    }

    document.addEventListener('submit', function (event) {
        var form = event.target;
        var button = event.submitter;

        if (!form || form.dataset.submitting === 'true') {
            event.preventDefault();
            return;
        }

        form.dataset.submitting = 'true';
        showActionLoading();

        if (button && !button.disabled) {
            button.disabled = true;
            button.setAttribute('aria-busy', 'true');
            button.innerHTML = 'Loading...';
        }
    });

    document.addEventListener('click', function (event) {
        var button = event.target.closest('button');
        var link = event.target.closest('a[href]');

        if (button && !button.type.match(/submit|reset/i) && !button.hasAttribute('aria-expanded') && button.dataset.loading !== 'false') {
            if (button.dataset.loading === 'true' || button.disabled) {
                event.preventDefault();
                return;
            }

            button.dataset.loading = 'true';
            button.disabled = true;
            button.setAttribute('aria-busy', 'true');
            button.innerHTML = 'Loading...';
            showActionLoading();
            return;
        }

        if (!link || link.target === '_blank' || link.getAttribute('href').startsWith('#') || link.dataset.loading === 'false') {
            return;
        }

        if (link.dataset.loading === 'true') {
            event.preventDefault();
            return;
        }

        link.dataset.loading = 'true';
        showActionLoading();
    });

    </script>
</body>
</html>
