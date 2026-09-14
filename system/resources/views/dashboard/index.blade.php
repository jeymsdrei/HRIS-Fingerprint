<x-app-layout hris>
    <x-slot name="title">Dashboard</x-slot>
    @php $nav = "dashboard"; @endphp

<div class="page-container">
        {{-- Filter Controls --}}
        <div class="mb-8 card">
            <div class="card-body">
                <form method="GET" class="flex flex-col sm:flex-row gap-4 items-end">
                    <div class="flex-1">
                        <label class="input-label">From Date</label>
                        <input type="date" name="from" value="{{ $from->format('Y-m-d') }}" class="input">
                    </div>
                    <div class="flex-1">
                        <label class="input-label">To Date</label>
                        <input type="date" name="to" value="{{ $to->format('Y-m-d') }}" class="input">
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                        </svg>
                        Filter
                    </button>
                </form>
            </div>
        </div>

        {{-- KPI Cards Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            {{-- Active Employees --}}
            <div class="kpi-card group hover:shadow-hover transition-all duration-fast">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="kpi-label">Active Employees</p>
                        <p class="kpi-value">{{ $stats['employees'] }}</p>
                        <p class="kpi-subtitle">{{ $stats['teaching'] }} teaching staff</p>
                    </div>
                    <div class="p-3 rounded-lg bg-indigo-50 text-indigo-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.856-1.487M15 10a3 3 0 11-6 0 3 3 0 016 0zM6 20h12a6 6 0 016-6H0a6 6 0 016 6z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Today Present --}}
            <div class="kpi-card group hover:shadow-hover transition-all duration-fast">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="kpi-label">Present Today</p>
                        <p class="kpi-value text-green-600">{{ $stats['today']['present'] }}</p>
                        <p class="kpi-subtitle">{{ $stats['today']['present_pct'] }}% of {{ $stats['today']['expected'] }} expected</p>
                    </div>
                    <div class="p-3 rounded-lg bg-green-50 text-green-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Late / Absent --}}
            <div class="kpi-card group hover:shadow-hover transition-all duration-fast">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="kpi-label">Late / Absent</p>
                        <div class="mt-4 flex items-baseline gap-2">
                            <p class="text-3xl font-bold text-amber-600">{{ $stats['today']['late'] }}</p>
                            <p class="text-sm text-slate-600">/</p>
                            <p class="text-3xl font-bold text-red-600">{{ $stats['today']['absent'] }}</p>
                        </div>
                        <p class="kpi-subtitle">{{ $stats['today']['late_pct'] }}% late · {{ $stats['today']['absent_pct'] }}% absent</p>
                    </div>
                    <div class="p-3 rounded-lg bg-amber-50 text-amber-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Payroll Released --}}
            <div class="kpi-card group hover:shadow-hover transition-all duration-fast">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="kpi-label">Payroll Released</p>
                        <p class="kpi-value text-indigo-600">₱{{ number_format($stats['net_total'], 0) }}</p>
                        <p class="kpi-subtitle">{{ $stats['released_this_month'] }} salaries · {{ $stats['on_hold'] }} on hold</p>
                    </div>
                    <div class="p-3 rounded-lg bg-indigo-50 text-indigo-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        {{-- Charts Section --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            {{-- Attendance Trend --}}
            <div class="card">
                <div class="card-header">
                    <h2 class="font-semibold text-slate-900">Attendance Trend</h2>
                    <p class="text-xs text-slate-500 mt-1">Daily attendance over the selected period</p>
                </div>
                <div class="card-body">
                    <div class="h-80 relative" x-show="!$store.dash.chartsLoaded" x-cloak>
                        <div class="skeleton-chart"></div>
                    </div>
                    <div class="h-80" x-show="$store.dash.chartsLoaded" x-cloak>
                        <canvas id="attendanceChart"></canvas>
                    </div>
                </div>
            </div>

            {{-- Payroll by Month --}}
            <div class="card">
                <div class="card-header">
                    <h2 class="font-semibold text-slate-900">Payroll Expense by Month</h2>
                    <p class="text-xs text-slate-500 mt-1">Monthly gross payroll distribution</p>
                </div>
                <div class="card-body">
                    <div class="h-80 relative" x-show="!$store.dash.chartsLoaded" x-cloak>
                        <div class="skeleton-chart"></div>
                    </div>
                    <div class="h-80" x-show="$store.dash.chartsLoaded" x-cloak>
                        <canvas id="payrollChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        {{-- Analytics Section --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            {{-- Today's Attendance --}}
            <div class="card">
                <div class="card-header">
                    <h2 class="font-semibold text-slate-900">Today's Attendance</h2>
                    <p class="text-xs text-slate-500 mt-1">Breakdown of attendance status</p>
                </div>
                <div class="card-body">
                    @php
                        $total = $stats['today']['present'] + $stats['today']['late'] + $stats['today']['half_day'] + $stats['today']['absent'] + $stats['today']['rest_day'];
                    @endphp
                    @if($total > 0)
                        <div class="h-80 relative" x-show="!$store.dash.chartsLoaded" x-cloak>
                            <div class="skeleton-chart"></div>
                        </div>
                        <div class="h-80" x-show="$store.dash.chartsLoaded" x-cloak>
                            <canvas id="pieChart"></canvas>
                        </div>
                    @else
                        <div class="empty-state">
                            <div class="empty-state-icon">📅</div>
                            <div class="empty-state-title">No Attendance Records</div>
                            <p class="empty-state-text">No attendance records available for today</p>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Department Analytics --}}
            <div class="card">
                <div class="card-header">
                    <h2 class="font-semibold text-slate-900">Department Analytics</h2>
                    <p class="text-xs text-slate-500 mt-1">Performance by department</p>
                </div>
                <div class="card-body">
                    <div class="space-y-4">
                        @forelse ($departmentStats as $d)
                            <div class="space-y-2">
                                <div class="flex items-center justify-between">
                                    <span class="text-sm font-medium text-slate-900">{{ $d['name'] }}</span>
                                    <span class="text-xs text-slate-500">{{ $d['count'] }} employees</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <div class="flex-1 h-2 bg-slate-100 rounded-full overflow-hidden">
                                        <div class="h-full bg-indigo-600 rounded-full" style="width: {{ $d['rate'] }}%"></div>
                                    </div>
                                    <span class="text-sm font-medium text-slate-700 w-12 text-right">{{ $d['rate'] }}%</span>
                                </div>
                                <div class="text-xs text-slate-500">Payroll: ₱{{ number_format($d['payroll']) }}</div>
                            </div>
                        @empty
                            <div class="empty-state py-8">
                                <p class="empty-state-text">No department data available</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Chart color scheme
        const colors = {
            primary: '#4f46e5',
            success: '#16a34a',
            warning: '#f59e0b',
            danger: '#dc2626',
            secondary: '#9ca3af',
        };

        const chartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    labels: {
                        font: { family: "'Inter', sans-serif", size: 12, weight: 500 },
                        color: '#6b7280',
                        padding: 16,
                        usePointStyle: true,
                    }
                },
                tooltip: {
                    titleFont: { family: "'Inter', sans-serif", size: 13, weight: 600 },
                    bodyFont: { family: "'Inter', sans-serif", size: 12 },
                    backgroundColor: 'rgba(30, 41, 59, 0.9)',
                    padding: 12,
                    displayColors: false,
                }
            },
            scales: {
                y: {
                    grid: { color: '#e5e7eb', drawBorder: false },
                    ticks: { font: { family: "'Inter', sans-serif", size: 12 }, color: '#9ca3af' },
                },
                x: {
                    grid: { display: false },
                    ticks: { font: { family: "'Inter', sans-serif", size: 12 }, color: '#9ca3af' },
                }
            }
        };

        // Attendance Chart
        const attendanceCtx = document.getElementById('attendanceChart');
        if(attendanceCtx) {
            const labels = {!! $attendanceTrend->pluck('d')->map(fn($d) => \Carbon\Carbon::parse($d)->format('M d'))->toJson() !!};
            new Chart(attendanceCtx, {
                type: 'line',
                data: {
                    labels,
                    datasets: [
                        {
                            label: 'Present',
                            data: {!! $attendanceTrend->pluck('present')->toJson() !!},
                            borderColor: colors.success,
                            backgroundColor: 'rgba(34, 197, 94, 0.1)',
                            tension: 0.4,
                            fill: true,
                            pointRadius: 4,
                            pointBackgroundColor: colors.success,
                            pointBorderColor: '#fff',
                            pointBorderWidth: 2,
                        },
                        {
                            label: 'Late',
                            data: {!! $attendanceTrend->pluck('late')->toJson() !!},
                            borderColor: colors.warning,
                            backgroundColor: 'rgba(245, 158, 11, 0.1)',
                            tension: 0.4,
                            fill: true,
                            pointRadius: 4,
                            pointBackgroundColor: colors.warning,
                            pointBorderColor: '#fff',
                            pointBorderWidth: 2,
                        },
                        {
                            label: 'Absent',
                            data: {!! $attendanceTrend->pluck('absent')->toJson() !!},
                            borderColor: colors.danger,
                            backgroundColor: 'rgba(239, 68, 68, 0.1)',
                            tension: 0.4,
                            fill: true,
                            pointRadius: 4,
                            pointBackgroundColor: colors.danger,
                            pointBorderColor: '#fff',
                            pointBorderWidth: 2,
                        },
                    ]
                },
                options: {
                    ...chartOptions,
                    plugins: {
                        ...chartOptions.plugins,
                        filler: { propagate: true }
                    }
                }
            });
        }

        // Payroll Chart
        const payrollCtx = document.getElementById('payrollChart');
        if(payrollCtx) {
            const pLabels = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
            const pData = new Array(12).fill(0);
            {!! $payrollTrend->pluck('m', 'm')->map(fn($m) => "pData[".((int)$m-1)."]={$payrollTrend->firstWhere('m',$m)->gross};")->implode('') !!}
            new Chart(payrollCtx, {
                type: 'bar',
                data: {
                    labels: pLabels,
                    datasets: [{
                        label: 'Gross Payroll',
                        data: pData,
                        backgroundColor: colors.primary,
                        borderColor: colors.primary,
                        borderWidth: 0,
                        borderRadius: 6,
                    }]
                },
                options: {
                    ...chartOptions,
                    plugins: {
                        ...chartOptions.plugins,
                        legend: { display: false }
                    }
                }
            });
        }

        // Attendance Breakdown
        const pieCtx = document.getElementById('pieChart');
        if(pieCtx) {
            new Chart(pieCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Present', 'Late', 'Half Day', 'Absent', 'Rest Day'],
                    datasets: [{
                        data: [
                            {{ $stats['today']['present'] }},
                            {{ $stats['today']['late'] }},
                            {{ $stats['today']['half_day'] }},
                            {{ $stats['today']['absent'] }},
                            {{ $stats['today']['rest_day'] }}
                        ],
                        backgroundColor: [colors.success, colors.warning, '#eab308', colors.danger, colors.secondary],
                        borderColor: '#fff',
                        borderWidth: 2,
                    }]
                },
                options: {
                    ...chartOptions,
                    plugins: {
                        ...chartOptions.plugins,
                        legend: { position: 'bottom' }
                    }
                }
            });
        }

        // Reveal charts once rendered (via Alpine store)
        if (typeof window.Alpine !== 'undefined') {
            setTimeout(() => {
                window.Alpine.store('dash').chartsLoaded = true;
            }, 50);
        } else {
            setTimeout(() => {
                document.getElementById('attendanceChart').classList.remove('hidden');
            }, 50);
        }
});
    </script>
</x-app-layout>
