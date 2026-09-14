@php
    $org = $report['organization'];
    $s = $report['summary'];
    $filters = $report['filters'];
    $att = $report['attendance_chart'];
    $pay = $report['payroll_chart'];
    $depts = $report['department_stats'];
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Archive & Historical Report</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
    <style>
        * { box-sizing: border-box; }
        body { font-family: 'Segoe UI', 'Inter', Arial, sans-serif; font-size: 12px; color: #1f2937; margin: 0; padding: 24px; }
        .report-header { text-align: center; border-bottom: 2px solid #111827; padding-bottom: 12px; margin-bottom: 18px; }
        .report-header h1 { margin: 0; font-size: 22px; }
        .report-header .sub { margin: 3px 0; color: #4b5563; }
        .report-header .title { font-size: 15px; font-weight: bold; margin-top: 8px; }
        h3 { font-size: 14px; margin: 20px 0 8px; border-bottom: 1px solid #e5e7eb; padding-bottom: 4px; }
        .filters-table { width: 100%; border-collapse: collapse; margin-bottom: 16px; }
        .filters-table td { padding: 5px 8px; border: 1px solid #e5e7eb; }
        .filters-table .lbl { background: #f3f4f6; width: 130px; font-weight: 600; color: #4b5563; }
        .summary-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; margin-bottom: 16px; }
        .sum-card { border: 1px solid #e5e7eb; border-radius: 6px; padding: 10px; text-align: center; }
        .sum-card .v { font-size: 18px; font-weight: bold; color: #111827; }
        .sum-card .l { font-size: 10px; color: #6b7280; text-transform: uppercase; letter-spacing: .5px; }
        .charts-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 16px; }
        .chart-box { border: 1px solid #e5e7eb; border-radius: 6px; padding: 12px; }
        .chart-box h4 { margin: 0 0 8px; font-size: 12px; }
        .chart-box .canvas-wrap { height: 200px; position: relative; }
        .data-table { width: 100%; border-collapse: collapse; margin-top: 8px; }
        .data-table th { background: #f3f4f6; text-align: left; padding: 6px 8px; border: 1px solid #d1d5db; font-size: 10px; }
        .data-table td { padding: 5px 8px; border: 1px solid #e5e7eb; font-size: 10px; }
        .right { text-align: right; }
        .badge { display: inline-block; padding: 1px 6px; border-radius: 3px; font-size: 10px; }
        .b-green { background: #dcfce7; color: #15803d; } .b-amber { background: #fef3c7; color: #b45309; }
        .b-red { background: #fee2e2; color: #b91c1c; } .b-gray { background: #f3f4f6; color: #6b7280; }
        .report-footer { margin-top: 28px; border-top: 1px solid #e5e7eb; padding-top: 8px; color: #6b7280; font-size: 11px; }
        .print-btn { position: fixed; top: 12px; right: 12px; z-index: 50; }
        .print-btn button { padding: 8px 16px; border: none; border-radius: 6px; background: #4f46e5; color: #fff; font-weight: 600; cursor: pointer; font-size: 12px; }

        /* Dedicated print styles */
        @media print {
            body { padding: 0; }
            .print-btn { display: none !important; }
            .page-break { page-break-before: always; }
            .report-header h1 { font-size: 20px; }
            .summary-grid { grid-template-columns: repeat(3, 1fr); }
            .charts-grid { grid-template-columns: 1fr 1fr; }
            @page { margin: 14mm 12mm; size: A4 landscape; }
            .data-table { font-size: 8.5px; }
            .data-table th, .data-table td { padding: 4px 5px; }
        }
        @media (max-width: 640px) {
            body { padding: 12px; }
            .summary-grid { grid-template-columns: 1fr 1fr; }
            .charts-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <div class="print-btn">
        <button onclick="window.print(); return false;">🖨️ Print Report</button>
    </div>

    {{-- Header --}}
    <div class="report-header">
        <h1>{{ $org['name'] }}</h1>
        <p class="sub">{{ $org['address'] }}</p>
        <p class="sub">HUMAN RESOURCE INFORMATION SYSTEM</p>
        <div class="title">ARCHIVE &amp; HISTORICAL REPORT</div>
    </div>

    {{-- Filters --}}
    <table class="filters-table">
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

    {{-- Charts --}}
    <div class="charts-grid">
        <div class="chart-box">
            <h4>Historical Attendance Trend</h4>
            <div class="canvas-wrap"><canvas id="attendanceChart"></canvas></div>
        </div>
        <div class="chart-box">
            <h4>Monthly Payroll Expense</h4>
            <div class="canvas-wrap"><canvas id="payrollChart"></canvas></div>
        </div>
    </div>

    {{-- Department table --}}
    <h3>Department Analytics</h3>
    @if ($depts->contains(fn ($d) => $d['employees'] > 0 || $d['payroll'] > 0))
    <table class="data-table">
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
    @else
    <p style="color:#9ca3af;">No department analytics data available.</p>
    @endif

    {{-- Archived records --}}
    <div class="page-break"></div>
    <h3>Archived Records</h3>
    @if ($report['archives']->isEmpty())
    <div style="text-align:center; color:#9ca3af; padding:24px;">
        <div style="font-size:14px; font-weight:600;">No archived records found.</div>
        <div style="margin-top:6px;">There are no records matching the selected filters.</div>
    </div>
    @else
    <table class="data-table">
        <thead><tr><th>Employee</th><th>Department</th><th>Record Type</th><th>Date</th><th>Period</th><th>Status</th><th class="right">Amount</th><th>Archived</th></tr></thead>
        <tbody>
            @foreach ($report['archives'] as $a)
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
                    <td>{{ data_get($d, 'date') ?? data_get($d, 'class_date') ?? '—' }}</td>
                    <td>{{ $a->period_label }}</td>
                    <td>{!! $status ? '<span class="badge '.$cls.'">'.ucfirst($status).'</span>' : '—' !!}</td>
                    <td class="right">{{ $amount !== null ? '₱'.number_format((float) $amount, 2) : '—' }}</td>
                    <td>{{ $a->archived_at?->format('M d, Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif

    {{-- Footer --}}
    <div class="report-footer">
        <div>Generated by: {{ $report['generated_by'] }}</div>
        <div>Generated: {{ $report['generated_at']->format('M d, Y h:i A') }}</div>
        <div>System: Human Resource Information System</div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const colors = { primary:'#4f46e5', success:'#22c55e', warning:'#f59e0b', danger:'#ef4444', amber:'#eab308' };
        const labels = {!! json_encode($att['labels']) !!};
        const fontCfg = { family: "'Segoe UI', sans-serif", size: 11 };
        const tooltipCfg = { backgroundColor: 'rgba(30,41,59,0.9)', titleFont: { size: 12, weight: 'bold' }, bodyFont: { size: 11 }, padding: 10 };

        const attendanceCtx = document.getElementById('attendanceChart');
        if (attendanceCtx) {
            new Chart(attendanceCtx, {
                type: 'line',
                data: {
                    labels,
                    datasets: [
                        { label:'Present', data: {!! json_encode($att['present']) !!}, borderColor: colors.success, backgroundColor:'rgba(34,197,94,0.1)', tension:0.4, fill:true, pointRadius:3 },
                        { label:'Late', data: {!! json_encode($att['late']) !!}, borderColor: colors.warning, tension:0.4, pointRadius:3 },
                        { label:'Absent', data: {!! json_encode($att['absent']) !!}, borderColor: colors.danger, tension:0.4, pointRadius:3 },
                        { label:'Half Day', data: {!! json_encode($att['half_day']) !!}, borderColor: colors.amber, borderDash:[5,5], tension:0.4, pointRadius:3 },
                    ]
                },
                options: { responsive:true, maintainAspectRatio:false, plugins:{ legend:{ labels:{ font:fontCfg, usePointStyle:true } }, tooltip:tooltipCfg }, scales:{ y:{ beginAtZero:true, grid:{ color:'#e5e7eb' } }, x:{ grid:{ display:false } } } }
            });
        }

        const payrollCtx = document.getElementById('payrollChart');
        if (payrollCtx) {
            new Chart(payrollCtx, {
                type: 'bar',
                data: {
                    labels,
                    datasets: [
                        { label:'Gross', data: {!! json_encode($pay['gross']) !!}, backgroundColor: colors.primary, borderRadius:4 },
                        { label:'Net', data: {!! json_encode($pay['net']) !!}, backgroundColor: colors.success, borderRadius:4 },
                    ]
                },
                options: { responsive:true, maintainAspectRatio:false, plugins:{ legend:{ labels:{ font:fontCfg, usePointStyle:true } }, tooltip:{ ...tooltipCfg, callbacks:{ label:(c)=>c.dataset.label+': ₱'+Number(c.parsed.y).toLocaleString('en-PH',{maximumFractionDigits:0}) } } }, scales:{ y:{ beginAtZero:true, grid:{ color:'#e5e7eb' }, ticks:{ callback:(v)=>'₱'+(v>=1000?(v/1000)+'K':v) } }, x:{ grid:{ display:false } } } }
            });
        }
    });
    </script>
</body>
</html>
