@php
    $org = $report['organization'];
    $s = $report['summary'];
    $filters = $report['filters'];
    $att = $report['attendance_chart'];
    $pay = $report['payroll_chart'];
    $depts = $report['department_stats'];
@endphp
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Archive & Historical Report</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 9px; color: #1f2937; }
        .header { text-align: center; border-bottom: 2px solid #111827; padding-bottom: 10px; margin-bottom: 16px; }
        .header h1 { margin: 0; font-size: 18px; letter-spacing: 1px; }
        .header .sub { margin: 2px 0; color: #4b5563; font-size: 10px; }
        .header .title { font-size: 13px; font-weight: bold; margin-top: 6px; }
        h3 { font-size: 11px; margin: 14px 0 6px; border-bottom: 1px solid #e5e7eb; padding-bottom: 3px; }
        .filters { width: 100%; margin-bottom: 14px; }
        .filters td { padding: 2px 4px; border: 1px solid #e5e7eb; font-size: 8.5px; }
        .filters .lbl { background: #f3f4f6; width: 120px; }
        .summary-grid { display: flex; gap: 6px; margin-bottom: 12px; flex-wrap: wrap; }
        .sum-card { border: 1px solid #e5e7eb; border-radius: 4px; padding: 6px 10px; text-align: center; flex: 1; min-width: 90px; }
        .sum-card .v { font-size: 13px; font-weight: bold; color: #111827; }
        .sum-card .l { font-size: 7.5px; color: #6b7280; text-transform: uppercase; letter-spacing: .4px; }
        table.data { width: 100%; border-collapse: collapse; margin-top: 6px; }
        table.data th { background: #f3f4f6; text-align: left; padding: 4px 5px; border: 1px solid #d1d5db; font-size: 8.5px; }
        table.data td { padding: 3px 5px; border: 1px solid #e5e7eb; font-size: 8.5px; }
        .right { text-align: right; }
        .chart-note { color: #6b7280; font-size: 7.5px; margin-top: 4px; }
        .bars { margin-top: 6px; }
        .bar-row { display: flex; align-items: center; margin-bottom: 3px; }
        .bar-label { width: 70px; font-size: 7.5px; color: #4b5563; overflow: hidden; white-space: nowrap; }
        .bar-track { flex: 1; height: 12px; background: #f3f4f6; border-radius: 2px; margin: 0 6px; }
        .bar-fill { height: 12px; background: #4f46e5; border-radius: 2px; }
        .bar-val { width: 60px; font-size: 7.5px; text-align: right; }
        .page-break { page-break-before: always; }
        .footer { position: running(footer); color: #9ca3af; font-size: 7.5px; }
        @page { margin: 16mm 12mm 18mm 12mm; }
        .badge { display: inline-block; padding: 1px 5px; border-radius: 3px; font-size: 7.5px; }
        .b-green { background: #dcfce7; color: #15803d; } .b-amber { background: #fef3c7; color: #b45309; }
        .b-red { background: #fee2e2; color: #b91c1c; } .b-gray { background: #f3f4f6; color: #6b7280; }
    </style>
</head>
<body>
    {{-- Header --}}
    <div class="header">
        <h1>{{ $org['name'] }}</h1>
        <p class="sub">{{ $org['address'] }}</p>
        <p class="sub">HUMAN RESOURCE INFORMATION SYSTEM</p>
        <div class="title">ARCHIVE &amp; HISTORICAL REPORT</div>
    </div>

    {{-- Filters --}}
    <table class="filters">
        @foreach ($filters as $label => $value)
        <tr><td class="lbl">{{ $label }}</td><td>{{ $value }}</td></tr>
        @endforeach
    </table>

    {{-- Summary --}}
    <div class="summary-grid">
        <div class="sum-card"><div class="v">{{ number_format($s['archived_employees']) }}</div><div class="l">Employees</div></div>
        <div class="sum-card"><div class="v">{{ number_format($s['attendance_records']) }}</div><div class="l">Attendance</div></div>
        <div class="sum-card"><div class="v">{{ number_format($s['payroll_records']) }}</div><div class="l">Payroll</div></div>
        <div class="sum-card"><div class="v">₱{{ number_format($s['payroll_amount'], 0) }}</div><div class="l">Total Payroll</div></div>
        <div class="sum-card"><div class="v">₱{{ number_format($s['total_deductions'], 0) }}</div><div class="l">Deductions</div></div>
        <div class="sum-card"><div class="v">{{ number_format($s['makeup_records']) }}</div><div class="l">Make-Up</div></div>
    </div>

    {{-- Attendance Summary --}}
    <h3>Attendance Summary</h3>
    <table class="data">
        <thead><tr><th>Month</th><th class="right">Present</th><th class="right">Late</th><th class="right">Half Day</th><th class="right">Absent</th></tr></thead>
        <tbody>
            @foreach ($att['labels'] as $i => $label)
                @if ($att['present'][$i] > 0 || $att['late'][$i] > 0 || $att['absent'][$i] > 0)
                <tr>
                    <td>{{ $label }}</td>
                    <td class="right">{{ number_format($att['present'][$i]) }}</td>
                    <td class="right">{{ number_format($att['late'][$i]) }}</td>
                    <td class="right">{{ number_format($att['half_day'][$i]) }}</td>
                    <td class="right">{{ number_format($att['absent'][$i]) }}</td>
                </tr>
                @endif
            @endforeach
        </tbody>
    </table>
    <div class="chart-note">Chart: Present / Late / Absent / Half Day per month for the selected period.</div>

    {{-- Payroll Summary --}}
    <h3>Payroll Summary</h3>
    <table class="data">
        <thead><tr><th>Month</th><th class="right">Gross</th><th class="right">Net</th><th class="right">Deductions</th></tr></thead>
        <tbody>
            @foreach ($pay['labels'] as $i => $label)
                @if ($pay['gross'][$i] > 0)
                <tr>
                    <td>{{ $label }}</td>
                    <td class="right">₱{{ number_format($pay['gross'][$i], 2) }}</td>
                    <td class="right">₱{{ number_format($pay['net'][$i], 2) }}</td>
                    <td class="right">₱{{ number_format($pay['gross'][$i] - $pay['net'][$i], 2) }}</td>
                </tr>
                @endif
            @endforeach
        </tbody>
    </table>
    <div class="chart-note">Chart: Gross vs Net payroll per month.</div>

    {{-- Department Analytics --}}
    <h3>Department Analytics</h3>
    <table class="data">
        <thead><tr><th>Department</th><th class="right">Employees</th><th class="right">Attendance Rate</th><th class="right">Payroll Expense</th></tr></thead>
        <tbody>
            @foreach ($depts as $d)
            <tr>
                <td>{{ $d['name'] }}</td>
                <td class="right">{{ number_format($d['employees']) }}</td>
                <td class="right">{{ $d['attendance_rate'] }}%</td>
                <td class="right">₱{{ number_format($d['payroll'], 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Archived Records --}}
    <div class="page-break"></div>
    <h3>Archived Records</h3>
    <table class="data">
        <thead><tr><th>Employee</th><th>Department</th><th>Record Type</th><th>Date</th><th>Period</th><th>Status</th><th class="right">Amount</th><th>Archived</th></tr></thead>
        <tbody>
            @forelse ($report['archives'] as $a)
                @php
                    $d = is_array($a->data) ? $a->data : [];
                    $amount = data_get($d, 'gross_pay') ?? data_get($d, 'net_pay') ?? data_get($d, 'additional_pay') ?? data_get($d, 'monthly_salary');
                    $status = data_get($d, 'status') ?? data_get($d, 'approval_status') ?? data_get($d, 'employment_status');
                    $cls = in_array($status, ['present','released','approved','permanent']) ? 'b-green' : (in_array($status, ['late','pending','on_hold']) ? 'b-amber' : 'b-gray');
                @endphp
                <tr>
                    <td>{{ data_get($d, 'employee.full_name') ?? data_get($d, 'employee_id') ?? 'Record #'.$a->ref_id }}</td>
                    <td>{{ data_get($d, 'department.name') ?? data_get($d, 'employee.department.name') ?? '—' }}</td>
                    <td>{{ ucwords(str_replace('_', ' ', $a->archive_type)) }}</td>
                    <td>{{ $a->archived_at?->format('M d, Y') }}</td>
                    <td>{{ $a->period_label }}</td>
                    <td>{!! $status ? '<span class="badge '.$cls.'">'.ucfirst($status).'</span>' : '—' !!}</td>
                    <td class="right">{{ $amount !== null ? '₱'.number_format((float) $amount, 2) : '—' }}</td>
                    <td>{{ $a->archived_at?->format('M d, Y h:i A') }}</td>
                </tr>
            @empty
                <tr><td colspan="8" style="text-align:center; color:#9ca3af; padding:16px;">No archived records found for the selected filters.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{-- Footer --}}
    <div style="margin-top:24px; border-top:1px solid #e5e7eb; padding-top:6px; color:#6b7280; font-size:7.5px;">
        <div>Generated by: {{ $report['generated_by'] }}</div>
        <div>Generated: {{ $report['generated_at']->format('M d, Y h:i A') }}</div>
        <div>System: Human Resource Information System</div>
    </div>
</body>
</html>
