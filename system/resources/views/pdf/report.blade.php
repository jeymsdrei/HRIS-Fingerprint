<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $meta['title'] }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 9px; color: #1f2937; }
        .header { border-bottom: 2px solid #111827; padding-bottom: 8px; margin-bottom: 12px; }
        .header h1 { margin: 0; font-size: 16px; }
        .header p { margin: 2px 0; color: #4b5563; font-size: 9px; }
        table { width: 100%; border-collapse: collapse; }
        th { background: #f3f4f6; text-align: left; padding: 5px 6px; border: 1px solid #d1d5db; font-size: 9px; }
        td { padding: 4px 6px; border: 1px solid #e5e7eb; }
        .right { text-align: right; }
        .muted { color: #6b7280; }
    </style>
</head>
<body>
    <div class="header">
        <h1>{{ $meta['title'] }}</h1>
        <p>{{ $meta['company'] ?? '' }} · {{ $meta['period'] ?? '' }}</p>
        <p>Generated {{ $meta['generated_at'] ?? now()->format('M d, Y h:i A') }} · {{ $meta['filters'] ?? '' }}</p>
    </div>

    <table>
        <thead>
            <tr>
                @foreach ($headings as $h)<th class="{{ in_array(strtolower($h), ['net', 'total', 'gross', 'amount', 'balance', 'salary', 'rate', 'pay']) ? 'right' : '' }}">{{ $h }}</th>@endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($rows as $row)
            <tr>
                @foreach ($row as $value)
                    @if (is_array($value) || $value instanceof \Illuminate\Support\Collection)
                        <td>{{ json_encode($value) }}</td>
                    @elseif ($value instanceof App\Models\Employee)
                        <td>{{ $value->full_name }} <span class="muted">({{ $value->employee_id }})</span></td>
                    @elseif ($value instanceof App\Models\Department || $value instanceof App\Models\Benefit)
                        <td>{{ $value->name }}</td>
                    @elseif ($value instanceof App\Models\PayrollPeriod)
                        <td>{{ $value->name }}</td>
                    @elseif ($value instanceof App\Models\Attendance)
                        <td>{{ $value->date->format('M d, Y') }} — {{ $value->status }}</td>
                    @elseif ($value instanceof \Carbon\Carbon || $value instanceof \Illuminate\Support\Carbon)
                        <td>{{ $value->format('M d, Y') }}</td>
                    @elseif (is_numeric($value) && str_contains((string) $value, '.'))
                        <td class="right">{{ number_format((float) $value, 2) }}</td>
                    @else
                        <td>{{ $value ?: '—' }}</td>
                    @endif
                @endforeach
            </tr>
            @endforeach
            @if (count($rows) === 0)
            <tr><td colspan="{{ count($headings) }}" style="text-align:center; color:#9ca3af; padding:16px;">No records found for this report.</td></tr>
            @endif
        </tbody>
    </table>

    @if (! empty($meta['summary']))
    <p style="margin-top:12px; font-size:10px;"><strong>{{ $meta['summary'] }}</strong></p>
    @endif
</body>
</html>