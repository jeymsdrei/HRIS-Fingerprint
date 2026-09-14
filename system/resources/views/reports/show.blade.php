@aware(['error' => null])
<x-app-layout hris>
    <x-slot name="title">Report — {{ ucwords(str_replace('_', ' ', $type)) }}</x-slot>

    <div class="page-container space-y-6">
        {{-- Page Header --}}
        <div class="mb-2 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold text-slate-900">{{ ucwords(str_replace('_', ' ', $type)) }}</h1>
                <p class="mt-2 text-slate-600">{{ $rows->count() }} record(s) · {{ $filters['from'] ?? '' }} – {{ $filters['to'] ?? '' }}</p>
            </div>
            <div class="flex flex-wrap gap-2">
                <form method="GET" action="{{ route('reports.show') }}" class="flex flex-wrap gap-2 items-end">
                    <input type="hidden" name="type" value="{{ $type }}">
                    @foreach ($filters as $k => $v)
                        @if ($v && in_array($k, ['department_id', 'classification', 'employment_status', 'payroll_period_id', 'from', 'to']))
                            <input type="hidden" name="{{ $k }}" value="{{ $v }}">
                        @endif
                    @endforeach
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
                <div class="flex gap-2">
                    @foreach ([['pdf','PDF'],['excel','Excel'],['csv','CSV']] as [$fmt, $label])
                    <form method="POST" action="{{ route('reports.export') }}">
                        @csrf
                        <input type="hidden" name="type" value="{{ $type }}">
                        @foreach ($filters as $k => $v)
                            @if ($v && in_array($k, ['department_id', 'classification', 'employment_status', 'payroll_period_id', 'from', 'to']))
                                <input type="hidden" name="{{ $k }}" value="{{ $v }}">
                            @endif
                        @endforeach
                        <input type="hidden" name="format" value="{{ $fmt }}">
                        <button class="btn btn-outline btn-sm">Export {{ $label }}</button>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Table --}}
        <div class="card">
            <div class="table-container">
                @php
                    $hasColumns = $columns ?? collect($rows->first())->keys();
                @endphp
                <table class="data-table">
                    <thead class="table-head">
                        <tr>
                            @foreach ($hasColumns as $key)
                                <th class="table-head-cell">{{ str_replace('_', ' ', ucfirst($key)) }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rows as $row)
                        <tr class="table-body-row">
                            @foreach ($row as $value)
                                <td class="table-body-cell">
                                    @if ($value instanceof App\Models\Employee)
                                        {{ $value->full_name }} <span class="text-xs text-slate-400">({{ $value->employee_id }})</span>
                                    @elseif ($value instanceof App\Models\Department)
                                        {{ $value->name }}
                                    @elseif ($value instanceof App\Models\Benefit || $value instanceof App\Models\Attendance || $value instanceof App\Models\PayrollPeriod)
                                        {{ $value->name ?? ($value->date ?? $value->name) }}
                                    @elseif ($value instanceof \Carbon\Carbon)
                                        {{ $value->format('M d, Y') }}
                                    @elseif (is_array($value))
                                        {{ json_encode($value) }}
                                    @else
                                        {{ $value ?: '—' }}
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                        @empty
                        <tr>
                            <td colspan="{{ max(1, count($hasColumns)) }}" class="table-body-cell">
                                <div class="empty-state py-12">
                                    <div class="empty-state-icon">📊</div>
                                    <div class="empty-state-title">No Data</div>
                                    <p class="empty-state-text">No data available for this report.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
