@aware(['error' => null])
<x-app-layout hris>
    <x-slot name="title">Report — {{ $title }}</x-slot>

    <div class="page-container space-y-6">
        @php
            $timeKeys = ['time_in', 'time_out', 'schedule_start', 'schedule_end', 'start', 'end'];
            $moneyKeys = ['gross', 'net', 'amount', 'rate', 'pay', 'amortization', 'balance', 'monthly', 'daily', 'hourly', 'deductions', 'payroll_expenses'];
            $hourKeys = ['working_hours', 'hours'];
            $minuteKeys = ['late_minutes', 'undertime_minutes', 'overtime_minutes'];
            $statusBadges = [
                'present' => 'badge-success',
                'approved' => 'badge-success',
                'active' => 'badge-success',
                'released' => 'badge-success',
                'paid' => 'badge-success',
                'late' => 'badge-warning',
                'pending' => 'badge-warning',
                'on_hold' => 'badge-warning',
                'draft' => 'badge-warning',
                'half_day' => 'badge-info',
                'ready' => 'badge-info',
                'permanent' => 'badge-info',
                'absent' => 'badge-danger',
                'rejected' => 'badge-danger',
            ];
        @endphp

        {{-- Back + Page Header --}}
        <div class="space-y-1">
            <a href="{{ route('reports.index') }}" class="btn btn-outline btn-sm">
                <span aria-hidden="true">←</span> Back to Reports
            </a>
            <div>
                <h1 class="text-3xl font-bold text-slate-900">{{ $title }}</h1>
                <p class="mt-2 text-slate-600">
                    {{ $total }} record(s)
                    @if ($total !== $rows->count())
                        <span class="text-indigo-600 font-medium">· {{ $rows->count() }} on this page</span>
                    @endif
                    · {{ $filters['from'] ?? now()->startOfMonth()->format('Y-m-d') }} – {{ $filters['to'] ?? now()->format('Y-m-d') }}
                    @if (request('q'))
                        <span class="text-indigo-600 font-medium">· search: "{{ request('q') }}"</span>
                    @endif
                </p>
            </div>
        </div>

        {{-- Filters + Export Toolbar --}}
        <div class="card">
            <div class="card-body">
                <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-4">
                    <form method="GET" action="{{ route('reports.show') }}" class="flex flex-wrap gap-3 items-end">
                        <input type="hidden" name="type" value="{{ $type }}">
                        @foreach ($filters as $k => $v)
                            @if ($v && in_array($k, ['department_id', 'classification', 'employment_status', 'payroll_period_id', 'from', 'to']))
                                <input type="hidden" name="{{ $k }}" value="{{ $v }}">
                            @endif
                        @endforeach
                        <div>
                            <label class="input-label">Search</label>
                            <input type="text" name="q" value="{{ request('q') }}" placeholder="Name, ID, class…" class="input">
                        </div>
                        <div>
                            <label class="input-label">From</label>
                            <input type="date" name="from" value="{{ $filters['from'] ?? now()->startOfMonth()->format('Y-m-d') }}" class="input">
                        </div>
                        <div>
                            <label class="input-label">To</label>
                            <input type="date" name="to" value="{{ $filters['to'] ?? now()->format('Y-m-d') }}" class="input">
                        </div>
                        <button class="btn btn-primary">Refresh</button>
                    </form>

                    <div class="flex flex-wrap items-end gap-2 lg:shrink-0">
                        @foreach ([['pdf', 'PDF'], ['excel', 'Excel'], ['csv', 'CSV']] as [$fmt, $label])
                        <form method="POST" action="{{ route('reports.export') }}" data-export>
                            @csrf
                            <input type="hidden" name="type" value="{{ $type }}">
                            @foreach ($filters as $k => $v)
                                @if ($v && in_array($k, ['department_id', 'classification', 'employment_status', 'payroll_period_id', 'from', 'to']))
                                    <input type="hidden" name="{{ $k }}" value="{{ $v }}">
                                @endif
                            @endforeach
                            <input type="hidden" name="format" value="{{ $fmt }}">
                            <button class="btn btn-outline btn-sm whitespace-nowrap">Export {{ $label }}</button>
                        </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        {{-- Table --}}
        <div class="card">
            <div class="table-container">
                <table class="data-table">
                    <thead class="table-head">
                        <tr>
                            @foreach ($columns as $key => $label)
                                <th class="table-head-cell
                                    @if (in_array($key, $moneyKeys) || in_array($key, $hourKeys) || in_array($key, $minuteKeys) || $key === 'rate_pct' || in_array($key, ['recipients', 'employees', 'records'])) text-right @endif">
                                    {{ $label }}
                                </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rows as $row)
                        <tr class="table-body-row hover:bg-slate-50">
                            @foreach ($columns as $key => $label)
                                @php
                                    $value = $row[$key] ?? null;
                                    $align = in_array($key, $moneyKeys) || in_array($key, $hourKeys) || in_array($key, $minuteKeys) || $key === 'rate_pct' || in_array($key, ['recipients', 'employees', 'records']);
                                @endphp
                                <td class="table-body-cell @if ($align) text-right @endif
                                    @if ($key === 'employee_id') font-mono text-xs text-slate-500 @endif
                                    @if ($key === 'name') font-medium text-slate-900 @endif">
                                    @if ($key === 'status')
                                        <span class="badge {{ $statusBadges[$value] ?? 'badge-neutral' }}">{{ ucwords(str_replace('_', ' ', (string) $value)) }}</span>
                                    @elseif ($value instanceof \Carbon\Carbon)
                                        {{ in_array($key, $timeKeys) ? $value->format('h:i A') : $value->format('M d, Y') }}
                                    @elseif ($value === null || $value === '')
                                        <span class="text-slate-400">—</span>
                                    @elseif (in_array($key, $moneyKeys) && is_numeric($value))
                                        ₱{{ number_format((float) $value, 2) }}
                                    @elseif (in_array($key, $hourKeys) && is_numeric($value))
                                        {{ number_format((float) $value, 2) }}h
                                    @elseif (in_array($key, $minuteKeys) && is_numeric($value))
                                        <span class="{{ $value > 0 ? 'text-amber-600 font-medium' : 'text-slate-400' }}">{{ hm((int) $value) }}</span>
                                    @elseif ($key === 'rate_pct')
                                        {{ number_format((float) $value, 1) }}%
                                    @else
                                        {{ $value }}
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                        @empty
                        <tr>
                            <td colspan="{{ count($columns) }}" class="table-body-cell">
                                <div class="empty-state py-12">
                                    <div class="empty-state-icon">📊</div>
                                    <div class="empty-state-title">No Data</div>
                                    <p class="empty-state-text">No records match the current filters.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if ($rows->hasPages())
                <div class="card-footer flex items-center justify-between gap-4">
                    <span class="text-sm text-slate-500">
                        Showing {{ $rows->firstItem() ?? 0 }}–{{ $rows->lastItem() ?? 0 }} of {{ $rows->total() }}
                    </span>
                    {{ $rows->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>