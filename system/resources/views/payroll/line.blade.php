<x-app-layout hris>
    <x-slot name="title">Payroll Line — {{ $payroll->employee->full_name }}</x-slot>

    @php $p = $payroll; @endphp

    <style>
        .payroll-detail-card { min-width: 0; overflow: hidden; }
        .payroll-detail-card .card-body { min-width: 0; overflow: hidden; }
        .payroll-detail-table { display: block !important; width: 100% !important; min-width: 0 !important; max-width: 100% !important; overflow: hidden; }
        .payroll-detail-table tbody { display: block; width: 100%; }
        .payroll-detail-table tr { display: grid; grid-template-columns: minmax(0, 1fr) minmax(6.5rem, 8rem); width: 100%; min-width: 0; overflow: hidden; }
        .payroll-detail-table td { display: block; min-width: 0; max-width: 100%; width: auto !important; box-sizing: border-box; }
        .payroll-detail-table td:last-child { min-width: 0; max-width: 8rem; overflow: hidden; padding-left: .25rem; padding-right: .25rem; white-space: nowrap; text-align: right; }
        @media (max-width: 767px) {
            .payroll-detail-table tr { grid-template-columns: minmax(0, 1fr) minmax(5.5rem, 6.5rem); }
            .payroll-detail-table td:last-child { max-width: 6.5rem; font-size: .75rem; }
        }
    </style>

    <div class="page-container">
        <div class="mb-4">
            <a href="{{ route('payroll.show', $p->period) }}" class="btn btn-outline">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                Back to Payroll
            </a>
        </div>
        <div class="grid min-w-0 grid-cols-1 gap-6 lg:grid-cols-2">
            {{-- Earnings & Deductions --}}
            <div class="card payroll-detail-card min-w-0">
                <div class="card-header flex min-w-0 flex-wrap items-start justify-between gap-3">
                    <div>
                        <h2 class="break-words font-semibold text-slate-900">{{ $p->employee->full_name }}</h2>
                        <p class="mt-1 break-words text-xs text-slate-400">{{ $p->employee->employee_id }} · {{ $p->period->name }} · {{ $p->employee->department?->name }}</p>
                    </div>
                    <span class="badge shrink-0 {{ $p->status === 'released' ? 'badge-success' : ($p->status === 'on_hold' ? 'badge-danger' : 'badge-info') }}">{{ $p->status_label }}</span>
                </div>
                <div class="card-body min-w-0">
                    @if (! $audit['accurate'])
                        <div class="mb-5 rounded-lg border border-amber-200 bg-amber-50 p-4 text-sm text-amber-800">
                            <p class="font-semibold">Proposed correction requires review</p>
                            <p class="mt-1">The stored payroll values differ from the current source records. Approved amounts have not been changed.</p>
                            <div class="mt-3 overflow-x-auto">
                                <table class="w-full min-w-[24rem] text-xs">
                                    <thead><tr class="text-left text-amber-900"><th class="py-1 pr-3">Field</th><th class="py-1 pr-3 text-right">Current</th><th class="py-1 text-right">Proposed</th></tr></thead>
                                    <tbody>
                                        @foreach ($audit['differences'] as $field => $difference)
                                            <tr class="border-t border-amber-200"><td class="py-1 pr-3">{{ ucwords(str_replace('_', ' ', $field)) }}</td><td class="py-1 pr-3 text-right tabular-nums">₱{{ number_format($difference['current'], 2) }}</td><td class="py-1 text-right tabular-nums">₱{{ number_format($difference['proposed'], 2) }}</td></tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                    <h3 class="font-semibold text-slate-700 mb-3">Earnings</h3>
                    <div>
                    <table class="data-table payroll-detail-table">
                        <tr class="table-body-row"><td class="table-body-cell text-slate-500">Basic Salary</td><td class="table-body-cell text-right">₱{{ number_format($p->basic_pay, 2) }}</td></tr>
                        <tr class="table-body-row"><td class="table-body-cell text-slate-500">Teaching Hours ({{ $p->teaching_hours }}h)</td><td class="table-body-cell text-right">₱{{ number_format($p->teaching_pay, 2) }}</td></tr>
                        <tr class="table-body-row"><td class="table-body-cell text-slate-500">Make-Up Class Pay</td><td class="table-body-cell text-right">₱{{ number_format($p->make_up_pay, 2) }}</td></tr>
                        <tr class="table-body-row"><td class="table-body-cell text-slate-500">Allowances</td><td class="table-body-cell text-right">₱{{ number_format($p->allowances, 2) }}</td></tr>
                        <tr class="table-body-row"><td class="table-body-cell text-slate-500">Benefits</td><td class="table-body-cell text-right">₱{{ number_format($p->benefits, 2) }}</td></tr>
                        <tr class="table-body-row"><td class="table-body-cell text-slate-500">Overtime ({{ $p->overtime_hours_total }}h)</td><td class="table-body-cell text-right">₱{{ number_format($p->overtime_pay, 2) }}</td></tr>
                        <tr class="table-body-row"><td class="table-body-cell font-semibold text-slate-900">Gross Pay</td><td class="table-body-cell text-right font-bold text-slate-900">₱{{ number_format($p->gross_pay, 2) }}</td></tr>
                    </table>
                    </div>

                    <h3 class="font-semibold text-slate-700 mt-6 mb-3">Deductions</h3>
                    <div>
                    <table class="data-table payroll-detail-table">
                        <tr class="table-body-row"><td class="table-body-cell text-slate-500">Late ({{ $p->late_minutes_total }} min)</td><td class="table-body-cell text-right">₱{{ number_format($p->deduction_late, 2) }}</td></tr>
                        <tr class="table-body-row"><td class="table-body-cell text-slate-500">Absent ({{ $p->days_absent }} days)</td><td class="table-body-cell text-right">₱{{ number_format($p->deduction_absent, 2) }}</td></tr>
                        <tr class="table-body-row"><td class="table-body-cell text-slate-500">Undertime ({{ $p->undertime_minutes_total }} min)</td><td class="table-body-cell text-right">₱{{ number_format($p->deduction_undertime, 2) }}</td></tr>
                        <tr class="table-body-row"><td class="table-body-cell text-slate-500">Withholding Tax</td><td class="table-body-cell text-right">₱{{ number_format($p->deduction_tax, 2) }}</td></tr>
                        <tr class="table-body-row"><td class="table-body-cell text-slate-500">SSS</td><td class="table-body-cell text-right">₱{{ number_format($p->deduction_sss, 2) }}</td></tr>
                        <tr class="table-body-row"><td class="table-body-cell text-slate-500">PhilHealth</td><td class="table-body-cell text-right">₱{{ number_format($p->deduction_philhealth, 2) }}</td></tr>
                        <tr class="table-body-row"><td class="table-body-cell text-slate-500">Pag-IBIG</td><td class="table-body-cell text-right">₱{{ number_format($p->deduction_pagibig, 2) }}</td></tr>
                        <tr class="table-body-row"><td class="table-body-cell text-slate-500">Loans</td><td class="table-body-cell text-right">₱{{ number_format($p->deduction_loans, 2) }}</td></tr>
                        <tr class="table-body-row"><td class="table-body-cell text-slate-500">Cash Advance</td><td class="table-body-cell text-right">₱{{ number_format($p->deduction_cash_advance, 2) }}</td></tr>
                        <tr class="table-body-row"><td class="table-body-cell text-slate-500">Other Deductions</td><td class="table-body-cell text-right">₱{{ number_format($p->deduction_other, 2) }}</td></tr>
                        <tr class="table-body-row"><td class="table-body-cell font-semibold text-slate-900">Total Deductions</td><td class="table-body-cell text-right font-bold text-red-600">₱{{ number_format($p->total_deductions, 2) }}</td></tr>
                        <tr class="table-body-row"><td class="table-body-cell font-bold text-slate-900 text-base">Net Pay</td><td class="table-body-cell text-right font-bold text-green-600 text-base">₱{{ number_format($p->net_pay, 2) }}</td></tr>
                    </table>
                    </div>
                </div>
            </div>

            {{-- Attendance + actions --}}
            <div class="min-w-0 space-y-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="font-semibold text-slate-900">Period Attendance Summary</h2>
                    </div>
                    <div class="card-body">
                        <div class="grid grid-cols-3 gap-3 text-center">
                            <div class="rounded-card bg-green-50 p-3"><p class="text-lg font-bold text-green-700">{{ $p->days_present }}</p><p class="text-xs text-slate-500">Present</p></div>
                            <div class="rounded-card bg-amber-50 p-3"><p class="text-lg font-bold text-amber-600">{{ $p->days_late }}</p><p class="text-xs text-slate-500">Late</p></div>
                            <div class="rounded-card bg-red-50 p-3"><p class="text-lg font-bold text-red-600">{{ $p->days_absent }}</p><p class="text-xs text-slate-500">Absent</p></div>
                        </div>
                        <div class="mt-4 text-sm text-slate-500 space-y-1">
                            <p>Teaching Hours: <b>{{ $p->teaching_hours }}h</b></p>
                            <p>Overtime: <b>{{ $p->overtime_hours_total }}h</b></p>
                            <p>Late: <b>{{ $p->late_minutes_total }} min</b> · Undertime: <b>{{ $p->undertime_minutes_total }} min</b></p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h2 class="font-semibold text-slate-900">Hold Reason</h2>
                    </div>
                    <div class="card-body">
                        @if ($p->status === 'on_hold')
                            <p class="text-sm text-red-600">{{ $p->hold_reason }}. Complete clearance, then regenerate the period.</p>
                        @else
                            <p class="text-sm text-green-600">No holds — salary can be released.</p>
                        @endif
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h2 class="font-semibold text-slate-900">Actions</h2>
                    </div>
                    <div class="card-body">
                        <div class="flex flex-wrap gap-2">
                            @if ($p->status === 'ready')
                                <form method="POST" action="{{ route('payroll.release', $p) }}" onsubmit="return confirm('Release salary? Payslip + receipt will be generated.')">
                                    @csrf
                                    <button class="btn btn-success">Release Salary</button>
                                </form>
                            @endif
                            @if ($p->payslip)
                                <a href="{{ route('payslips.download', $p->payslip) }}" class="btn btn-outline">Payslip PDF</a>
                                <a href="{{ route('payslips.show', $p->payslip) }}" class="btn btn-outline">View Payslip</a>
                            @endif
                            @if ($p->receipt)
                                <a href="{{ route('receipts.print', $p->receipt) }}" class="btn btn-outline">Receipt PDF</a>
                            @endif
                        </div>

                        <form method="POST" action="{{ route('payroll.update', $p) }}" class="mt-5 space-y-3">
                            @csrf @method('PUT')
                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label class="input-label">Other Deduction (override)</label>
                                    <input type="number" step="0.01" name="deduction_other" value="{{ $p->deduction_other }}" class="input">
                                </div>
                                <div>
                                    <label class="input-label">Notes</label>
                                    <input name="notes" value="{{ $p->notes }}" class="input">
                                </div>
                            </div>
                            <button class="btn btn-secondary">Adjust Payroll</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
