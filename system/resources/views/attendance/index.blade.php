<x-app-layout hris>
    <x-slot name="title">Attendance — {{ $date->format('F d, Y') }}</x-slot>

    <div class="page-container space-y-6">
        {{-- Page Header --}}
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-900">Attendance</h1>
            <p class="mt-2 text-slate-600">Daily attendance for {{ $date->format('l, F d, Y') }}</p>
        </div>

        {{-- Summary KPIs --}}
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
            <div class="kpi-card">
                <p class="text-2xl font-bold text-green-600">{{ $summary['present'] }}</p>
                <p class="kpi-label">Present</p>
            </div>
            <div class="kpi-card">
                <p class="text-2xl font-bold text-amber-600">{{ $summary['late'] }}</p>
                <p class="kpi-label">Late</p>
            </div>
            <div class="kpi-card">
                <p class="text-2xl font-bold text-yellow-600">{{ $summary['half_day'] }}</p>
                <p class="kpi-label">Half Day</p>
            </div>
            <div class="kpi-card">
                <p class="text-2xl font-bold text-red-600">{{ $summary['absent'] }}</p>
                <p class="kpi-label">Absent</p>
            </div>
            <div class="kpi-card">
                <p class="text-2xl font-bold text-slate-400">{{ $summary['rest_day'] }}</p>
                <p class="kpi-label">Rest Day</p>
            </div>
            <div class="kpi-card">
                <p class="text-2xl font-bold text-blue-600">{{ $summary['present_pct'] }}%</p>
                <p class="kpi-label">Attendance Rate</p>
            </div>
        </div>

        {{-- Controls --}}
        <div class="card">
            <div class="card-body flex flex-wrap gap-3 items-center justify-between">
                <form method="GET" class="flex flex-wrap gap-2 items-end">
                    <div>
                        <label class="input-label">Date</label>
                        <input type="date" name="date" value="{{ $date->format('Y-m-d') }}" class="input">
                    </div>
                    @include('partials.employee-filters')
                    <div>
                        <label class="input-label">Status</label>
                        <select name="status" class="input">
                            <option value="">All Status</option>
                            @foreach (['present','late','half_day','absent','rest_day'] as $s)<option value="{{ $s }}" @selected(request('status') == $s)>{{ ucwords(str_replace('_', ' ', $s)) }}</option>@endforeach
                        </select>
                    </div>
                    <div>
                        <label class="input-label">Search</label>
                        <input name="search" value="{{ request('search') }}" placeholder="Name / ID" class="input">
                    </div>
                    <button class="btn btn-primary">Go</button>
                </form>

                <div class="flex gap-2">
                    <a href="{{ route('attendance.index', ['date' => $date->copy()->subDay()->format('Y-m-d')]) }}" class="btn btn-outline btn-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                        Prev
                    </a>
                    <a href="{{ route('attendance.index', ['date' => now()->format('Y-m-d')]) }}" class="btn btn-secondary btn-sm">Today</a>
                    <a href="{{ route('attendance.index', ['date' => $date->copy()->addDay()->format('Y-m-d')]) }}" class="btn btn-outline btn-sm">
                        Next
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>
            </div>
        </div>

        {{-- Manual punch + process --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <form method="POST" action="{{ route('attendance.punch') }}" class="card">
                <div class="card-header">
                    <h2 class="font-semibold text-slate-900">Manual Punch</h2>
                </div>
                <div class="card-body flex flex-wrap gap-3 items-end">
                    @csrf
                    <div class="flex-1 min-w-40">
                        <label class="input-label">Employee</label>
                        <select name="employee_id" class="input">
                            @foreach (App\Models\Employee::where('is_active', true)->orderBy('last_name')->get() as $e)
                                <option value="{{ $e->id }}">{{ $e->employee_id }} — {{ $e->full_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="input-label">Punch Time</label>
                        <input type="datetime-local" name="punch_time" value="{{ now()->format('Y-m-d\TH:i') }}" class="input" required>
                    </div>
                    <button class="btn btn-success">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Register Punch
                    </button>
                </div>
            </form>

            <form method="POST" action="{{ route('attendance.process') }}" class="card">
                <div class="card-header">
                    <h2 class="font-semibold text-slate-900">Recompute Range</h2>
                </div>
                <div class="card-body flex flex-wrap gap-3 items-end">
                    @csrf
                    <div>
                        <label class="input-label">From</label>
                        <input type="date" name="from" value="{{ now()->subDays(6)->format('Y-m-d') }}" class="input">
                    </div>
                    <div>
                        <label class="input-label">To</label>
                        <input type="date" name="to" value="{{ now()->format('Y-m-d') }}" class="input">
                    </div>
                    <button class="btn btn-info">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                        Recompute Range
                    </button>
                </div>
            </form>
        </div>

        {{-- Table --}}
        <div class="card">
            <div class="table-container">
                <table class="data-table">
                    <thead class="table-head">
                        <tr>
                            <th class="table-head-cell">Employee</th>
                            <th class="table-head-cell">Schedule</th>
                            <th class="table-head-cell">In</th>
                            <th class="table-head-cell">Out</th>
                            <th class="table-head-cell">Hours</th>
                            <th class="table-head-cell">Late</th>
                            <th class="table-head-cell">UT</th>
                            <th class="table-head-cell">OT</th>
                            <th class="table-head-cell">Status</th>
                            <th class="table-head-cell text-right">Actions</th>
                        </tr>
                    </thead>
<tbody>
                        {{-- Data-driven skeleton rows while data renders --}}
                        <tr x-show="!$store.table.loaded" x-cloak>
                            <td colspan="10" class="table-body-cell p-6">
                                <div class="space-y-3">
                                    @for ($i = 0; $i < 6; $i++)
                                        <div class="flex items-center gap-4">
                                            <div class="skeleton-circle h-8 w-8"></div>
                                            <div class="flex-1 skeleton-text"></div>
                                            <div class="w-24 skeleton-text"></div>
                                            <div class="w-28 skeleton-text"></div>
                                        </div>
                                    @endfor
                                </div>
                            </td>
                        </tr>

                        @forelse ($attendances as $a)
                        <tr class="table-body-row" x-show="$store.table.loaded" x-cloak>
                            <td class="table-body-cell">
                                <span class="font-medium text-slate-900">{{ $a->employee->full_name }}</span>
                                <p class="text-xs text-slate-500">{{ $a->employee->employee_id }} · {{ $a->department?->name }}</p>
                            </td>
                            <td class="table-body-cell text-xs text-slate-500 font-mono">{{ $a->schedule_start?->format('h:i A') }} – {{ $a->schedule_end?->format('h:i A') }}</td>
                            <td class="table-body-cell">{{ $a->time_in?->format('h:i A') ?? '—' }}</td>
                            <td class="table-body-cell">{{ $a->time_out?->format('h:i A') ?? '—' }}</td>
                            <td class="table-body-cell font-medium">{{ $a->working_hours }}h</td>
                            <td class="table-body-cell {{ $a->late_minutes > 0 ? 'text-amber-600 font-medium' : 'text-slate-400' }}">{{ $a->late_minutes }}m</td>
                            <td class="table-body-cell {{ $a->undertime_minutes > 0 ? 'text-orange-600 font-medium' : 'text-slate-400' }}">{{ $a->undertime_minutes }}m</td>
                            <td class="table-body-cell {{ $a->overtime_minutes > 0 ? 'text-emerald-600 font-medium' : 'text-slate-400' }}">{{ $a->overtime_minutes }}m</td>
                            <td class="table-body-cell">
                                <span class="badge
                                    {{ $a->status === 'present' ? 'badge-success' : '' }}
                                    {{ $a->status === 'late' ? 'badge-warning' : '' }}
                                    {{ $a->status === 'half_day' ? 'badge-info' : '' }}
                                    {{ $a->status === 'absent' ? 'badge-danger' : '' }}
                                    {{ $a->status === 'rest_day' ? 'badge-neutral' : '' }}">{{ $a->status_label }}</span>
                            </td>
                            <td class="table-body-cell text-right">
                                <a href="{{ route('attendance.edit', $a) }}" class="btn btn-secondary btn-sm">Correct</a>
                            </td>
                        </tr>
                        @empty
                        <tr x-show="$store.table.loaded" x-cloak>
                            <td colspan="10" class="table-body-cell">
                                <div class="empty-state py-12">
                                    <div class="empty-state-icon">📅</div>
                                    <div class="empty-state-title">No Attendance Records</div>
                                    <p class="empty-state-text">No attendance records for this date.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if ($attendances->hasPages())
                <div class="card-footer">{{ $attendances->links() }}</div>
            @endif
        </div>
    </div>
</x-app-layout>
