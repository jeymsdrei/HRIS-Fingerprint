<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Payroll Receipt {{ $receipt->receipt_no }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 11px; color: #1f2937; }
        .header { text-align: center; border-bottom: 2px solid #111827; padding-bottom: 10px; margin-bottom: 20px; }
        .header h1 { margin: 0; font-size: 20px; letter-spacing: 1px; }
        .header p { margin: 3px 0; color: #4b5563; font-size: 10px; }
        .box { border: 1px solid #d1d5db; border-radius: 8px; padding: 24px; margin: 30px auto; width: 70%; text-align: center; }
        .amount { font-size: 22px; font-weight: bold; margin: 12px 0; }
        .meta { width: 100%; margin-bottom: 8px; }
        .meta td { padding: 4px 0; }
        .meta .label { color: #6b7280; width: 160px; }
        .sig { margin-top: 60px; width: 100%; }
        .sig td { text-align: center; }
        .sig .line { border-top: 1px solid #374151; padding-top: 4px; margin-top: 60px; }
        .status { display: inline-block; font-size: 10px; font-weight: bold; letter-spacing: 1px; color: #6b7280; }
    </style>
</head>
<body>
    <div class="header">
        <h1>{{ $company['name'] }}</h1>
        <p>{{ $company['address'] }}</p>
        <p><strong>OFFICIAL PAYROLL RECEIPT</strong></p>
    </div>

    <table class="meta">
        <tr><td class="label">Receipt No.</td><td><strong>{{ $receipt->receipt_no }}</strong></td><td class="label">Date</td><td>{{ $receipt->created_at?->format('M d, Y h:i A') }}</td></tr>
        <tr><td class="label">Payroll Period</td><td>{{ $receipt->payroll->period->name ?? '—' }}</td><td class="label">Payment Method</td><td>{{ $receipt->payment_method ? ucfirst(str_replace('_', ' ', $receipt->payment_method)) : '—' }}</td></tr>
        <tr><td class="label">Employee</td><td colspan="3">{{ $receipt->employee->full_name }} ({{ $receipt->employee->employee_id }})</td></tr>
    </table>

    <div class="box">
        <p>Received from <strong>{{ $company['name'] }}</strong> the amount of</p>
        <div class="amount">PHP {{ number_format($receipt->amount_received, 2) }}</div>
        <p class="status">({{ ucfirst($receipt->employee->full_name) }})</p>
    </div>

    <table class="sig">
        <tr>
            <td>
                @if ($receipt->employee_signature)
                    <div class="line">{{ $receipt->employee_signature }}</div>
                @else
                    <div class="line"></div>
                @endif
                <div style="font-size: 10px; color: #6b7280;">Employee Signature{{ $receipt->signed_at ? ' · '.$receipt->signed_at->format('M d, Y h:i A') : '' }}</div>
            </td>
            <td>
                @if ($receipt->hr_signature)
                    <div class="line">{{ $receipt->hr_signature }}</div>
                @else
                    <div class="line"></div>
                @endif
                <div style="font-size: 10px; color: #6b7280;">HR / Cashier Signature</div>
            </td>
        </tr>
    </table>
</body>
</html>