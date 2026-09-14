@aware(['error' => null])
<x-app-layout hris>
    <x-slot name="title">Payslip — {{ $payslip->payslip_no }}</x-slot>

    @php $p = $payslip->payroll; @endphp
    <div class="page-container">
        <div class="max-w-3xl mx-auto card p-8">
            <div class="flex justify-between items-center border-b-2 border-slate-900 pb-4">
                <div>
                    <h2 class="text-lg font-bold text-slate-900">{{ App\Models\Setting::get('company_name', 'HRIS') }}</h2>
                    <p class="text-xs text-slate-500">{{ App\Models\Setting::get('company_address', '') }}</p>
                </div>
                <div class="text-right">
                    <p class="font-mono text-sm text-slate-600">Payslip No: <b>{{ $payslip->payslip_no }}</b></p>
                    <p class="text-xs text-slate-500">Generated: {{ $payslip->generated_at?->format('F d, Y h:i A') }}</p>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-4 py-4 text-sm border-b border-slate-100">
                <div>
                    <p class="text-xs text-slate-400 uppercase">Employee</p>
                    <p class="font-medium text-slate-900">{{ $p->employee->full_name }}</p>
                    <p class="text-xs text-slate-500">{{ $p->employee->employee_id }}</p>
                </div>
                <div>
                    <p class="text-xs text-slate-400 uppercase">Department / Position</p>
                    <p class="text-sm text-slate-700">{{ $p->employee->department?->name }} · {{ $p->employee->position?->name }}</p>
                    <p class="text-xs text-slate-500">{{ ucfirst($p->employee->classification) }} · {{ ucfirst($p->employee->employment_status) }}</p>
                </div>
                <div>
                    <p class="text-xs text-slate-400 uppercase">Payroll Period</p>
                    <p class="font-medium text-slate-900">{{ $p->period->name }}</p>
                    <p class="text-xs text-slate-500">{{ $p->period->start_date->format('M d') }} – {{ $p->period->end_date->format('M d, Y') }} · Pay date {{ $p->period->pay_date->format('M d, Y') }}</p>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-8 py-4">
                <div>
                    <h4 class="font-semibold text-slate-700 mb-2 text-sm uppercase">Earnings</h4>
                    <table class="w-full text-sm">
                        <tr><td class="py-1 text-slate-500 border-b border-slate-100">Basic Salary</td><td class="py-1 text-right border-b border-slate-100">₱{{ number_format($p->basic_pay, 2) }}</td></tr>
                        <tr><td class="py-1 text-slate-500 border-b border-slate-100">Teaching Hours ({{ $p->teaching_hours }}h)</td><td class="py-1 text-right border-b border-slate-100">₱{{ number_format($p->teaching_pay, 2) }}</td></tr>
                        <tr><td class="py-1 text-slate-500 border-b border-slate-100">Make-Up Class</td><td class="py-1 text-right border-b border-slate-100">₱{{ number_format($p->make_up_pay, 2) }}</td></tr>
                        <tr><td class="py-1 text-slate-500 border-b border-slate-100">Allowances</td><td class="py-1 text-right border-b border-slate-100">₱{{ number_format($p->allowances, 2) }}</td></tr>
                        <tr><td class="py-1 text-slate-500 border-b border-slate-100">Benefits</td><td class="py-1 text-right border-b border-slate-100">₱{{ number_format($p->benefits, 2) }}</td></tr>
                        <tr><td class="py-1 text-slate-500 border-b border-slate-100">Overtime</td><td class="py-1 text-right border-b border-slate-100">₱{{ number_format($p->overtime_pay, 2) }}</td></tr>
                        <tr class="border-t border-slate-200"><td class="py-1.5 font-bold text-slate-900">Gross Pay</td><td class="py-1.5 text-right font-bold">₱{{ number_format($p->gross_pay, 2) }}</td></tr>
                    </table>
                </div>
                <div>
                    <h4 class="font-semibold text-slate-700 mb-2 text-sm uppercase">Deductions</h4>
                    <table class="w-full text-sm">
                        <tr><td class="py-1 text-slate-500 border-b border-slate-100">Late / Absent / Undertime</td><td class="py-1 text-right border-b border-slate-100">₱{{ number_format($p->deduction_late + $p->deduction_absent + $p->deduction_undertime, 2) }}</td></tr>
                        <tr><td class="py-1 text-slate-500 border-b border-slate-100">Withholding Tax</td><td class="py-1 text-right border-b border-slate-100">₱{{ number_format($p->deduction_tax, 2) }}</td></tr>
                        <tr><td class="py-1 text-slate-500 border-b border-slate-100">SSS</td><td class="py-1 text-right border-b border-slate-100">₱{{ number_format($p->deduction_sss, 2) }}</td></tr>
                        <tr><td class="py-1 text-slate-500 border-b border-slate-100">PhilHealth</td><td class="py-1 text-right border-b border-slate-100">₱{{ number_format($p->deduction_philhealth, 2) }}</td></tr>
                        <tr><td class="py-1 text-slate-500 border-b border-slate-100">Pag-IBIG</td><td class="py-1 text-right border-b border-slate-100">₱{{ number_format($p->deduction_pagibig, 2) }}</td></tr>
                        <tr><td class="py-1 text-slate-500 border-b border-slate-100">Loans</td><td class="py-1 text-right border-b border-slate-100">₱{{ number_format($p->deduction_loans, 2) }}</td></tr>
                        <tr><td class="py-1 text-slate-500 border-b border-slate-100">Cash Advance</td><td class="py-1 text-right border-b border-slate-100">₱{{ number_format($p->deduction_cash_advance, 2) }}</td></tr>
                        <tr><td class="py-1 text-slate-500 border-b border-slate-100">Other</td><td class="py-1 text-right border-b border-slate-100">₱{{ number_format($p->deduction_other, 2) }}</td></tr>
                        <tr class="border-t border-slate-200"><td class="py-1.5 font-bold text-red-600">Total Deductions</td><td class="py-1.5 text-right font-bold">₱{{ number_format($p->total_deductions, 2) }}</td></tr>
                    </table>
                </div>
            </div>

            <div class="flex justify-between items-center border-t-2 border-slate-900 pt-4">
                <div>
                    <p class="text-xs text-slate-400">Attendance: {{ $p->days_present }} present · {{ $p->days_late }} late · {{ $p->days_absent }} absent</p>
                    <p class="text-xs text-slate-400">Hours: {{ $p->teaching_hours }} teaching · {{ $p->overtime_hours_total }} OT</p>
                </div>
                <div class="text-right">
                    <p class="text-xs text-slate-400 uppercase">Net Pay</p>
                    <p class="text-2xl font-bold text-green-600">₱{{ number_format($p->net_pay, 2) }}</p>
                </div>
            </div>

            <div class="mt-8 flex justify-between items-end text-xs text-slate-500">
                <div class="text-center">
                    <p class="font-mono">{{ $payslip->digital_signature ?? '(employee signature)' }}</p>
                    <div class="border-t border-slate-300 mt-1 pt-1 w-48">Employee Signature</div>
                </div>
                <p class="text-xs text-slate-400">This payslip was generated by the HRIS. Digital signature: {{ $payslip->digital_signature ?? '—' }}</p>
            </div>

            <div class="mt-6 flex gap-2">
                <a href="{{ route('payslips.download', $payslip) }}" class="btn btn-primary">Download PDF</a>
            </div>
        </div>
    </div>
</x-app-layout>
