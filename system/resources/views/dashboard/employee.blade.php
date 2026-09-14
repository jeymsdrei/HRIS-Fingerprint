@aware(['error' => null])
<x-app-layout hris>
    <x-slot name="title">My Dashboard</x-slot>

    <div class="page-container space-y-6">
        {{-- KPI Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="kpi-card">
                <p class="kpi-label">Today's Attendance</p>
                @if ($today)
                    <p class="kpi-value {{ $today->status === 'absent' ? 'text-red-600' : ($today->status === 'late' ? 'text-amber-600' : 'text-green-600') }}">{{ $today->status_label }}</p>
                    <p class="kpi-subtitle">
                        In: {{ $today->time_in?->format('h:i A') ?? '—' }} · Out: {{ $today->time_out?->format('h:i A') ?? '—' }}<br>
                        Hours: {{ $today->working_hours }} · Late: {{ $today->late_minutes }} min
                    </p>
                @else
                    <p class="kpi-value text-slate-400">—</p>
                    <p class="kpi-subtitle">Not logged yet</p>
                @endif
            </div>
            <div class="kpi-card">
                <p class="kpi-label">Week Summary</p>
                <div class="flex gap-3 mt-4 text-sm">
                    <span class="badge badge-success">{{ $weekAttendances->whereIn('status', ['present','late','half_day'])->count() }} present</span>
                    <span class="badge badge-warning">{{ $weekAttendances->where('status','late')->count() }} late</span>
                    <span class="badge badge-danger">{{ $weekAttendances->where('status','absent')->count() }} absent</span>
                </div>
                <p class="kpi-subtitle">{{ $weekAttendances->sum('working_hours') }} working hours this week</p>
            </div>
        </div>

        @if ($employee && $schedules->isNotEmpty())
        <div class="card">
            <div class="card-header">
                <h2 class="font-semibold text-slate-900">My Teaching Schedule ({{ $employee->teaching_load }} hrs/week)</h2>
            </div>
            <div class="card-body">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($schedules as $s)
                        <div class="card card-body p-4 hover:shadow-md transition-shadow">
                            <p class="font-medium text-slate-900">{{ $s->subject?->name ?? 'Subject' }}</p>
                            <p class="text-sm text-slate-500">{{ $s->day_name }} · <span class="font-mono">{{ $s->start_time->format('h:i A') }} – {{ $s->end_time->format('h:i A') }}</span></p>
                            <p class="text-xs text-slate-400">Room: {{ $s->room?->name ?? '—' }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif

        @if ($recentPayslips->isNotEmpty())
        <div class="card">
            <div class="card-header">
                <h2 class="font-semibold text-slate-900">Recent Payslips</h2>
            </div>
            <div class="table-container">
                <table class="data-table">
                    <thead class="table-head">
                        <tr><th class="table-head-cell">Period</th><th class="table-head-cell">Gross</th><th class="table-head-cell">Deductions</th><th class="table-head-cell">Net Pay</th><th class="table-head-cell text-right">Action</th></tr>
                    </thead>
                    <tbody>
                        @foreach ($recentPayslips as $p)
                        <tr class="table-body-row">
                            <td class="table-body-cell">{{ $p->period->name }}</td>
                            <td class="table-body-cell">₱{{ number_format($p->gross_pay, 2) }}</td>
                            <td class="table-body-cell">₱{{ number_format($p->total_deductions, 2) }}</td>
                            <td class="table-body-cell font-semibold text-green-600">₱{{ number_format($p->net_pay, 2) }}</td>
                            <td class="table-body-cell text-right">
                                <a href="{{ route('employee.payslips.download', $p->payslip) }}" class="btn btn-outline btn-sm">Download</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </div>
</x-app-layout>
