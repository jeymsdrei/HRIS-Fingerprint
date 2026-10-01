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
                        <label for="attendance-search" class="input-label">Search employee name or ID</label>
                        <input id="attendance-search" name="search" value="{{ request('search') }}" placeholder="Type a name or ID..." class="input" autocomplete="off" data-client-search>
                    </div>
                    <button type="submit" class="btn btn-primary">Go</button>
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

        {{-- Recompute range --}}
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

        {{-- Table --}}
        <div class="card">
            <div class="table-container">
                <table class="data-table">
                    <thead class="table-head">
                        <tr>
                            <th class="table-head-cell">Employee</th>
                            <th class="table-head-cell">Class</th>
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
                            <td colspan="11" class="table-body-cell p-6">
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
                        <tr class="table-body-row attendance-row" data-employee-search="{{ strtolower($a->employee->full_name.' '.$a->employee->employee_id) }}" x-show="$store.table.loaded" x-cloak>
                            <td class="table-body-cell">
                                <div class="flex items-center gap-3">
                                    @if ($a->employee->photo_path)
                                        <img src="{{ asset('storage/'.$a->employee->photo_path) }}" alt="{{ $a->employee->full_name }}" class="h-8 w-8 rounded-full object-cover cursor-pointer" data-avatar-preview>
                                    @else
                                        <div class="h-8 w-8 rounded-full bg-gradient-to-br from-indigo-600 to-indigo-700 text-white flex items-center justify-center text-xs font-bold">
                                            {{ mb_strtoupper(mb_substr($a->employee->first_name, 0, 1) . mb_substr($a->employee->last_name, 0, 1)) }}
                                        </div>
                                    @endif
                                    <div>
                                        <span class="font-medium text-slate-900">{{ $a->employee->full_name }}</span>
                                        <p class="text-xs text-slate-500">{{ $a->employee->employee_id }} · {{ $a->department?->name }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="table-body-cell text-xs text-slate-500">
                                @if ($a->teachingSchedule)
                                    <span class="font-medium text-slate-600">{{ $a->teachingSchedule->subject?->name ?? '—' }}</span>
                                    <p class="text-xs text-slate-400">{{ $a->teachingSchedule->room?->name }}</p>
                                @elseif ($a->workSchedule)
                                    <span class="font-medium text-slate-600">{{ $a->workSchedule->day_name }} Shift</span>
                                    <p class="text-xs text-slate-400">Work Schedule</p>
                                @else
                                    <span class="text-slate-400">—</span>
                                @endif
                            </td>
                            <td class="table-body-cell text-xs text-slate-500 font-mono">{{ $a->schedule_start?->format('h:i A') }} – {{ $a->schedule_end?->format('h:i A') }}</td>
                            <td class="table-body-cell">{{ $a->time_in?->format('h:i A') ?? '—' }}</td>
                            <td class="table-body-cell">{{ $a->time_out?->format('h:i A') ?? '—' }}</td>
                            <td class="table-body-cell font-medium">{{ $a->working_hours }}h</td>
                            <td class="table-body-cell {{ $a->late_minutes > 0 ? 'text-amber-600 font-medium' : 'text-slate-400' }}">{{ hm($a->late_minutes) }}</td>
                            <td class="table-body-cell {{ $a->undertime_minutes > 0 ? 'text-orange-600 font-medium' : 'text-slate-400' }}">{{ hm($a->undertime_minutes) }}</td>
                            <td class="table-body-cell {{ $a->overtime_minutes > 0 ? 'text-emerald-600 font-medium' : 'text-slate-400' }}">{{ hm($a->overtime_minutes) }}</td>
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
                            <td colspan="11" class="table-body-cell">
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

    <script>
        const attendanceSearch = document.getElementById('attendance-search');
        const attendanceRows = document.querySelectorAll('.attendance-row');
        const searchForm = attendanceSearch?.closest('form');

        // Sequenced prefix matching: type letter by letter from the start.
        // Matches the start of the full name/ID, the start of any part,
        // or (for multi-word queries) words reading left to right.
        function employeeMatches(employeeSearchText, term) {
            const nameWords = employeeSearchText.trim().split(/\s+/);
            const termWords = term.trim().split(/\s+/);

            if (termWords.length === 1) {
                const t = termWords[0];
                return employeeSearchText.indexOf(t) === 0 || nameWords.some((w) => w.indexOf(t) === 0);
            }

            let i = 0;
            for (let k = 0; k < termWords.length; k++) {
                const tw = termWords[k];
                let found = false;
                while (i < nameWords.length) {
                    if (nameWords[i].indexOf(tw) === 0) { found = true; i++; break; }
                    i++;
                }
                if (!found) return false;
            }
            return true;
        }

        function filterAttendanceRows() {
            if (!attendanceSearch) {
                return;
            }

            const searchTerm = attendanceSearch.value.trim().toLowerCase();

            attendanceRows.forEach(function (row) {
                const employeeSearchText = row.dataset.employeeSearch || '';
                const isMatch = searchTerm === '' || employeeMatches(employeeSearchText, searchTerm);

                row.hidden = !isMatch;
                row.style.display = isMatch ? '' : 'none';
            });
        }

        // Prevent form submission on Enter in search input (use client-side filtering)
        attendanceSearch?.addEventListener('keydown', function (e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                filterAttendanceRows();
            }
        });

        // Client-side filtering on input
        attendanceSearch?.addEventListener('input', filterAttendanceRows);

        // Initial filter (for page load with existing search value)
        filterAttendanceRows();

        //search bar button, not going back to the top
        (function () {
    const KEY = 'attScroll';
    history.scrollRestoration = 'manual';

    function scrollers() {
        const list = [document.scrollingElement];
        document.querySelectorAll('*').forEach(el => {
            if (/(auto|scroll)/.test(getComputedStyle(el).overflowY)) list.push(el);
        });
        return list;
    }

    function save() {
        sessionStorage.setItem(KEY, JSON.stringify({
            path: location.pathname,
            time: Date.now(),
            tops: scrollers().map(el => el.scrollTop)
        }));
    }

    function restore() {
        const raw = sessionStorage.getItem(KEY);
        if (!raw) return;
        const data = JSON.parse(raw);
        // only restore on the same page, and only if saved in the last 10 seconds
        if (data.path !== location.pathname || Date.now() - data.time > 10000) return;
        const list = scrollers();
        data.tops.forEach((t, i) => { if (list[i]) list[i].scrollTop = t; });
    }

    // save on ANY link click, form submit, or page unload
    document.addEventListener('click', e => {
        if (e.target.closest('a[href]')) save();
    }, true);
    document.addEventListener('submit', save, true);
    window.addEventListener('pagehide', save);
    window.addEventListener('beforeunload', save);

    document.addEventListener('DOMContentLoaded', restore);
    window.addEventListener('load', () => {
        restore();
        setTimeout(restore, 150);
        setTimeout(restore, 500);
    });
})();
    </script>
</x-app-layout>
