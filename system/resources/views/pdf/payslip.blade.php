<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Payslip {{ $payslip->payslip_no }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 11px; color: #1f2937; }
        .header { text-align: center; border-bottom: 2px solid #111827; padding-bottom: 10px; margin-bottom: 20px; }
        .header h1 { margin: 0; font-size: 20px; letter-spacing: 1px; }
        .header p { margin: 3px 0; color: #4b5563; font-size: 10px; }
        .meta { width: 100%; margin-bottom: 16px; }
        .meta td { padding: 3px 0; }
        .meta .label { color: #6b7280; width: 140px; }
        table.amounts { width: 100%; border-collapse: collapse; }
        table.amounts td { padding: 6px 8px; border-bottom: 1px solid #e5e7eb; }
        table.amounts .h { font-weight: bold; background: #f9fafb; }
        .total { font-weight: bold; font-size: 13px; background: #f3f4f6; }
        .net { background: #eef2ff; font-size: 14px; font-weight: bold; }
        .sig { margin-top: 50px; width: 100%; }
        .sig td { text-align: center; }
        .sig .line { border-top: 1px solid #374151; padding-top: 4px; margin-top: 50px; }
        .right { text-align: right; }
    </style>
</head>
<body>
    <div class="header">
        <h1>{{ $company['name'] }}</h1>
        <p>{{ $company['address'] }}</p>
        <p><strong>PAYSLIP</strong> · {{ $payslip->payslip_no }}</p>
    </div>

    <table class="meta">
        <tr>
            <td class="label">Employee</td>
            <td><strong>{{ $payslip->employee->full_name }}</strong> ({{ $payslip->employee->employee_id }})</td>
            <td class="label">Period</td>
            <td>{{ $payslip->payroll->period->name }}</td>
        </tr>
        <tr>
            <td class="label">Department</td>
            <td>{{ $payslip->employee->department->name ?? '—' }}</td>
            <td class="label">Pay Date</td>
            <td>{{ $payslip->generated_at?->format('M d, Y') ?? now()->format('M d, Y') }}</td>
        </tr>
        <tr>
            <td class="label">Employment</td>
            <td>{{ ucwords(str_replace('_', ' ', $payslip->employee->employment_status)) }} · {{ ucwords(str_replace('_', ' ', $payslip->employee->classification)) }}</td>
            <td class="label">Position</td>
            <td>{{ $payslip->employee->position->name ?? '—' }}</td>
        </tr>
    </table>

    @php $pay = $payslip->payroll; @endphp
    <table class="amounts">
        <tr class="h"><td colspan="2">EARNINGS</td></tr>
        <tr><td>Basic Pay</td><td class="right">{{ number_format($pay->basic_pay, 2) }}</td></tr>
        @if ($pay->teaching_hours > 0)
            <tr><td>Teaching Hours ({{ $pay->teaching_hours }} hrs)</td><td class="right">{{ number_format($pay->teaching_pay, 2) }}</td></tr>
        @endif
        @if ($pay->make_up_pay > 0)
            <tr><td>Make-Up Classes</td><td class="right">{{ number_format($pay->make_up_pay, 2) }}</td></tr>
        @endif
        @if ($pay->allowances > 0)
            <tr><td>Allowances</td><td class="right">{{ number_format($pay->allowances, 2) }}</td></tr>
        @endif
        @if ($pay->overtime_pay > 0)
            <tr><td>Overtime ({{ $pay->overtime_hours_total }} hrs)</td><td class="right">{{ number_format($pay->overtime_pay, 2) }}</td></tr>
        @endif
        @if ($pay->benefits > 0)
            <tr><td>Benefits</td><td class="right">{{ number_format($pay->benefits, 2) }}</td></tr>
        @endif
        <tr class="total"><td>Gross Pay</td><td class="right">{{ number_format($pay->gross_pay, 2) }}</td></tr>

        <tr class="h"><td colspan="2">DEDUCTIONS</td></tr>
        @if ($pay->deduction_late > 0)
            <tr><td>Late Deduction ({{ $pay->late_minutes_total }} min)</td><td class="right">{{ number_format($pay->deduction_late, 2) }}</td></tr>
        @endif
        @if ($pay->deduction_absent > 0)
            <tr><td>Absence Deduction ({{ $pay->days_absent }} day(s))</td><td class="right">{{ number_format($pay->deduction_absent, 2) }}</td></tr>
        @endif
        @if ($pay->deduction_undertime > 0)
            <tr><td>Undertime Deduction ({{ $pay->undertime_minutes_total }} min)</td><td class="right">{{ number_format($pay->deduction_undertime, 2) }}</td></tr>
        @endif
        <tr><td>Withholding Tax</td><td class="right">{{ number_format($pay->deduction_tax, 2) }}</td></tr>
        <tr><td>SSS</td><td class="right">{{ number_format($pay->deduction_sss, 2) }}</td></tr>
        <tr><td>PhilHealth</td><td class="right">{{ number_format($pay->deduction_philhealth, 2) }}</td></tr>
        <tr><td>Pag-IBIG</td><td class="right">{{ number_format($pay->deduction_pagibig, 2) }}</td></tr>
        @if ($pay->deduction_loans > 0)
            <tr><td>Loan Amortization</td><td class="right">{{ number_format($pay->deduction_loans, 2) }}</td></tr>
        @endif
        @if ($pay->deduction_cash_advance > 0)
            <tr><td>Cash Advance</td><td class="right">{{ number_format($pay->deduction_cash_advance, 2) }}</td></tr>
        @endif
        @if ($pay->deduction_other > 0)
            <tr><td>Other Deductions</td><td class="right">{{ number_format($pay->deduction_other, 2) }}</td></tr>
        @endif
        <tr class="total"><td>Total Deductions</td><td class="right">{{ number_format($pay->total_deductions, 2) }}</td></tr>

        <tr class="net"><td>NET PAY</td><td class="right">{{ number_format($pay->net_pay, 2) }}</td></tr>
    </table>

    <table class="sig">
        <tr>
            <td><div class="line">{{ $payslip->digital_signature ?: $payslip->employee->full_name }}</div><div style="font-size: 10px; color: #6b7280;">Digital Signature</div></td>
            <td><div class="line">{{ $pay->releaser?->name ?? '' }}</div><div style="font-size: 10px; color: #6b7280;">Released By</div></td>
        </tr>
    </table>
</body>
</html>