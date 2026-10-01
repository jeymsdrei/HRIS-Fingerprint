<x-app-layout hris>
    <x-slot name="title">Schedules</x-slot>

    @php
        $dayNames = App\Models\TeachingSchedule::$dayNames;
        $todayDay = (int) now()->format('w');
        $employee = $employeeList->firstWhere('id', (int) request('employee_id'));

        $defaultShiftStart = App\Models\Setting::get('default_shift_start', '08:00');
        $defaultShiftEnd = App\Models\Setting::get('default_shift_end', '17:00');

        // — Teaching weekly timetable window (minutes of day).
        $timeFloor = 360;   // 06:00
        $timeCeil = 1140;   // 19:00
        $totalMinutes = $timeCeil - $timeFloor;
        if ($employee && $employee->is_teaching && $schedules->isNotEmpty()) {
            $minStart = $schedules->min(fn ($s) => $s->start_time->hour * 60 + $s->start_time->minute);
            $maxEnd = $schedules->max(fn ($s) => $s->end_time->hour * 60 + $s->end_time->minute);
            $timeFloor = max(360, intdiv($minStart, 60) * 60);
            $timeCeil = min(1200, intdiv($maxEnd + 59, 60) * 60);
            $totalMinutes = $timeCeil - $timeFloor;
        }
        $hourRows = range(intdiv($timeFloor, 60), intdiv($timeCeil, 60) - 1);
        if (count($hourRows) < 6) {
            $totalMinutes = 360;
            $timeCeil = $timeFloor + 360;
            $hourRows = range(intdiv($timeFloor, 60), intdiv($timeCeil, 60) - 1);
        }
        $gridHeight = count($hourRows) * 54;

        $teachingColors = [
            0 => 'bg-indigo-50 border-indigo-200 text-indigo-900 hover:bg-indigo-100',
            1 => 'bg-emerald-50 border-emerald-200 text-emerald-900 hover:bg-emerald-100',
            2 => 'bg-amber-50 border-amber-200 text-amber-900 hover:bg-amber-100',
            3 => 'bg-rose-50 border-rose-200 text-rose-900 hover:bg-rose-100',
            4 => 'bg-sky-50 border-sky-200 text-sky-900 hover:bg-sky-100',
            5 => 'bg-violet-50 border-violet-200 text-violet-900 hover:bg-violet-100',
        ];

        $schedulesByDay = $schedules->groupBy('day');
        $workByDay = $workSchedules->keyBy('day');
        $weekMinutes = $schedules->sum(fn ($s) => max(0, ($s->end_time->hour * 60 + $s->end_time->minute) - ($s->start_time->hour * 60 + $s->start_time->minute)));
        $weekHours = $weekMinutes === 0 ? 0 : round($weekMinutes / 60, 1);
    @endphp

    <div class="page-container space-y-6">
        {{-- Page Header --}}
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-900">Schedules</h1>
            <p class="mt-2 text-slate-600">View and manage weekly teaching and work schedules per employee</p>
        </div>

        {{-- Search toolbar --}}
        <div class="card">
            <div class="card-body">
                <label for="employee-search" class="input-label">Employee</label>
                <div class="relative">
                    <svg class="pointer-events-none absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 10.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" />
                    </svg>
                    <input type="text" id="employee-search" class="input pl-9" placeholder="Search employees by name..."
                           autocomplete="off" aria-label="Search employees" data-selected-name="{{ $employee?->full_name ?? '' }}">

                    <div id="employee-search-panel" class="absolute left-0 right-0 z-30 mt-2 max-h-72 overflow-y-auto rounded-xl border border-slate-200 bg-white shadow-xl" hidden>
                        @foreach ($employeeList as $e)
                            @php
                                $words = preg_split('/\s+/', trim($e->full_name)) ?: [];
                                $ini = collect($words)->filter()->slice(0, 2)->map(fn ($w) => mb_strtoupper(mb_substr($w, 0, 1)))->join('') ?: '?';
                            @endphp
                            <a href="{{ request()->fullUrlWithQuery(['employee_id' => $e->id]) }}"
                               class="employee-row flex items-center gap-3 px-3 py-2.5 transition-colors duration-fast hover:bg-slate-50"
                               data-employee-name="{{ $e->full_name }}">
                                @if ($e->photo_path)
                                    <img src="{{ asset('storage/'.$e->photo_path) }}" alt="{{ $e->full_name }}" class="h-8 w-8 shrink-0 rounded-full object-cover" data-avatar-preview>
                                @else
                                    <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-gradient-to-br from-slate-500 to-slate-700 text-xs font-bold text-white">{{ $ini }}</div>
                                @endif
                                <span class="min-w-0">
                                    <span class="block truncate font-medium text-slate-900">{{ $e->full_name }}</span>
                                    <span class="block truncate text-xs text-slate-500">{{ $e->employee_id }} · {{ ucfirst(str_replace('_', ' ', $e->classification)) }}</span>
                                </span>
                            </a>
                        @endforeach
                        <p id="employee-no-results" class="px-3 py-4 text-sm text-slate-500" hidden>No employees found.</p>
                    </div>
                </div>

                {{-- Selected employee chip --}}
                @if ($employee)
                    @php
                        $words = preg_split('/\s+/', trim($employee->full_name)) ?: [];
                        $ini = collect($words)->filter()->slice(0, 2)->map(fn ($w) => mb_strtoupper(mb_substr($w, 0, 1)))->join('') ?: '?';
                    @endphp
                    <div class="mt-4 flex flex-wrap items-center gap-3 rounded-xl border border-indigo-100 bg-indigo-50/60 px-4 py-3">
                        @if ($employee->photo_path)
                            <img src="{{ asset('storage/'.$employee->photo_path) }}" alt="{{ $employee->full_name }}" class="h-11 w-11 rounded-full object-cover shadow-sm" data-avatar-preview>
                        @else
                            <div class="flex h-11 w-11 items-center justify-center rounded-full bg-gradient-to-br from-indigo-600 to-indigo-700 text-sm font-bold text-white">{{ $ini }}</div>
                        @endif
                        <div class="min-w-0 flex-1">
                            <div class="flex flex-wrap items-center gap-2">
                                <span class="truncate font-semibold text-slate-900">{{ $employee->full_name }}</span>
                                @if ($employee->is_teaching)
                                    <span class="badge badge-info">Teaching</span>
                                @else
                                    <span class="badge badge-neutral">Non-Teaching</span>
                                @endif
                            </div>
                            <div class="mt-0.5 text-xs text-slate-500">{{ $employee->employee_id }} · {{ $employee->department?->name ?? 'No department' }}</div>
                        </div>
                        <a href="{{ route('schedules.index', request()->except(['employee_id'])) }}" class="btn btn-secondary btn-sm">✕ Clear</a>
                    </div>
                @endif
            </div>
        </div>

        @if ($employee)
            {{-- ── Teaching schedules ─────────────────────────────────────── --}}
            @if ($employee->is_teaching)
            <div class="card">
                <div class="card-header">
                    <div class="flex flex-wrap items-center justify-between gap-2">
                        <h2 class="font-semibold text-slate-900">Teaching Schedule — {{ $employee->full_name }}</h2>
                        <div class="flex flex-wrap items-center gap-2">
                            <span class="badge badge-neutral">{{ $schedules->count() }} classes</span>
                            <span class="badge badge-neutral">{{ $weekHours }} hrs/week</span>
                        </div>
                    </div>
                </div>
                <div class="card-body space-y-6">
                    {{-- Add class form (multi-day aware) --}}
                    <form method="POST" action="{{ route('schedules.teaching.store') }}" data-schedule-form="teaching"
                          class="rounded-card border border-indigo-100 bg-indigo-50/40 p-4">
                        @csrf
                        <input type="hidden" name="employee_id" value="{{ $employee->id }}">

                        <div class="mb-4">
                            <span class="mb-2 block text-sm font-medium text-slate-700">Days</span>
                            <div class="flex flex-wrap gap-2">
                                @foreach ($dayNames as $i => $dn)
                                    <label class="cursor-pointer select-none">
                                        <input type="checkbox" name="day[]" value="{{ $i }}" class="peer sr-only" data-day-check>
                                        <span class="inline-flex items-center justify-center rounded-lg border border-slate-300 bg-white px-3 py-2 text-xs font-semibold text-slate-600 transition-colors duration-fast peer-checked:border-indigo-600 peer-checked:bg-indigo-600 peer-checked:text-white {{ $i === $todayDay ? 'border-indigo-300' : '' }}">{{ mb_substr($dn, 0, 3) }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-3 md:grid-cols-6">
                            <div class="col-span-2 md:col-span-1">
                                <label class="input-label" for="teach-subject">Subject</label>
                                <select id="teach-subject" name="subject_id[]" class="input" data-field-label="Subject">
                                    <option value="">Subject</option>
                                    @foreach (App\Models\Subject::all() as $s)<option value="{{ $s->id }}">{{ $s->name }}</option>@endforeach
                                </select>
                            </div>
                            <div>
                                <label class="input-label" for="teach-room">Room</label>
                                <select id="teach-room" name="room_id[]" class="input">
                                    <option value="">Room</option>
                                    @foreach (App\Models\Room::all() as $r)<option value="{{ $r->id }}">{{ $r->code }}</option>@endforeach
                                </select>
                            </div>
                            <div>
                                <label class="input-label" for="teach-start">Start</label>
                                <input id="teach-start" type="time" name="start_time[]" class="input" data-field-label="Start time" required>
                            </div>
                            <div>
                                <label class="input-label" for="teach-end">End</label>
                                <input id="teach-end" type="time" name="end_time[]" class="input" data-field-label="End time" required>
                            </div>
                            <div>
                                <label class="input-label" for="teach-sem">Semester</label>
                                <select id="teach-sem" name="semester_id[]" class="input">
                                    <option value="">Semester</option>
                                    @foreach (App\Models\Semester::where('is_active', true)->get() as $s)<option value="{{ $s->id }}">{{ $s->name }}</option>@endforeach
                                </select>
                            </div>
                            <div class="col-span-2 flex items-end md:col-span-1">
                                <button class="btn btn-primary w-full">Add Class</button>
                            </div>
                        </div>
                    </form>

                    {{-- Weekly timetable --}}
                    @if ($schedules->isNotEmpty())
                    <div class="overflow-x-auto rounded-xl border border-slate-200 bg-white">
                        <div class="min-w-[860px]">
                            {{-- Day headers --}}
                            <div class="grid grid-cols-[4.5rem_repeat(7,minmax(0,1fr))] border-b border-slate-200">
                                <div class="px-2 py-3"></div>
                                @foreach ($dayNames as $i => $name)
                                    <div class="px-2 py-3 text-center {{ $i === $todayDay ? 'bg-indigo-50' : '' }}">
                                        <div class="text-xs font-bold {{ $i === $todayDay ? 'text-indigo-700' : 'text-slate-700' }}">{{ mb_substr($name, 0, 3) }}</div>
                                        <div class="text-[10px] {{ $i === $todayDay ? 'text-indigo-500' : 'text-slate-400' }}">{{ $name }}</div>
                                    </div>
                                @endforeach
                            </div>

                            {{-- Grid body --}}
                            <div class="relative" style="height: {{ $gridHeight }}px;">
                                @foreach ($hourRows as $h)
                                    @php
                                        $pct = (($h * 60) - $timeFloor) / max(1, $totalMinutes) * 100;
                                        $h12 = $h % 12; if ($h12 === 0) { $h12 = 12; }
                                        $ampm = $h < 12 ? 'AM' : 'PM';
                                    @endphp
                                    <div class="pointer-events-none absolute left-0 right-0 border-t border-slate-100" style="top: {{ $pct }}%"></div>
                                    <div class="pointer-events-none absolute left-0 w-[4.25rem] pr-2 text-right text-[10px] font-medium text-slate-400" style="top: calc({{ $pct }}% + 3px);">{{ $h12 }} {{ $ampm }}</div>
                                @endforeach

                                <div class="absolute inset-y-0 left-[4.5rem] right-0 grid grid-cols-7 divide-x divide-slate-100">
                                    @foreach ($dayNames as $i => $name)
                                        <div class="relative {{ $i === $todayDay ? 'bg-indigo-50/40' : '' }}">
                                            @foreach ($schedulesByDay->get($i, collect()) as $s)
                                                @php
                                                    $sm = $s->start_time->hour * 60 + $s->start_time->minute;
                                                    $em = $s->end_time->hour * 60 + $s->end_time->minute;
                                                    $top = min(max(0, ($sm - $timeFloor) / max(1, $totalMinutes) * 100), 100);
                                                    $height = max(5, ($em - $sm) / max(1, $totalMinutes) * 100);
                                                    $top = min($top, 100 - $height);
                                                    $color = $teachingColors[$s->subject_id ? (int) $s->subject_id % 6 : 0];
                                                @endphp
                                                <div class="absolute inset-x-1 overflow-hidden rounded-lg border p-1.5 shadow-sm transition-colors duration-fast {{ $color }}"
                                                     style="top: {{ $top }}%; height: {{ $height }}%;"
                                                     title="{{ $s->subject?->name ?: 'Class' }} · {{ $s->start_time->format('g:i A') }} – {{ $s->end_time->format('g:i A') }} · Room {{ $s->room?->code ?: $s->room?->name ?: '—' }}">
                                                    <div class="flex items-start justify-between gap-1">
                                                        <div class="min-w-0">
                                                            <div class="truncate text-xs font-semibold leading-tight">{{ $s->subject?->code ?: $s->subject?->name ?: 'Class' }}</div>
                                                            <div class="truncate pt-0.5 font-mono text-[10px] leading-tight opacity-70">{{ $s->start_time->format('g:i A') }} – {{ $s->end_time->format('g:i A') }}</div>
                                                            @if ($s->room)
                                                                <div class="truncate text-[10px] leading-tight opacity-60">Room {{ $s->room->code ?: $s->room->name }}</div>
                                                            @endif
                                                        </div>
                                                        <form method="POST" action="{{ route('schedules.teaching.destroy', $s) }}" data-confirm="Remove this class from the weekly schedule?">
                                                            @csrf @method('DELETE')
                                                            <button class="-m-1 rounded-md p-1 text-red-400 opacity-50 transition-opacity duration-fast hover:bg-red-50 hover:text-red-600 hover:opacity-100" title="Remove class" aria-label="Remove class">
                                                                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                                </svg>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="empty-state py-10">
                        <div class="empty-state-icon">🗓️</div>
                        <div class="empty-state-title">No Classes Yet</div>
                        <p class="empty-state-text">Use the form above to add a class. Each class appears on the weekly timetable.</p>
                    </div>
                    @endif
                </div>
            </div>

            {{-- ── Work schedules ─────────────────────────────────────────── --}}
            @elseif ($employee->classification === 'non_teaching')
            <div class="card">
                <div class="card-header">
                    <div class="flex flex-wrap items-center justify-between gap-2">
                        <h2 class="font-semibold text-slate-900">Work Schedule — {{ $employee->full_name }}</h2>
                        <span class="badge badge-neutral">{{ $workSchedules->count() }} custom shift(s)</span>
                    </div>
                </div>
                <div class="card-body space-y-6">
                    <form method="POST" action="{{ route('schedules.work.store') }}" data-schedule-form="work"
                          class="rounded-card border border-slate-200 bg-slate-50/60 p-4">
                        @csrf
                        <input type="hidden" name="employee_id" value="{{ $employee->id }}">
                        <div class="grid grid-cols-2 gap-3 md:grid-cols-4">
                            <div>
                                <label class="input-label" for="work-day">Day</label>
                                <select id="work-day" name="day" class="input" data-field-label="Day">
                                    @foreach ($dayNames as $i => $dn)<option value="{{ $i }}" {{ $i === $todayDay ? 'selected' : '' }}>{{ $dn }}</option>@endforeach
                                </select>
                            </div>
                            <div>
                                <label class="input-label" for="work-start">Start</label>
                                <input id="work-start" type="time" name="start_time" class="input" data-field-label="Start time" required>
                            </div>
                            <div>
                                <label class="input-label" for="work-end">End</label>
                                <input id="work-end" type="time" name="end_time" class="input" data-field-label="End time" required>
                            </div>
                            <div class="col-span-2 flex items-end md:col-span-1">
                                <button class="btn btn-primary w-full">Add Shift</button>
                            </div>
                        </div>
                    </form>

                    {{-- Week strip --}}
                    <div>
                        @if ($workSchedules->isEmpty())
                            <p class="mb-4 text-sm text-slate-500">No custom shifts — every day falls back to the company default <span class="font-mono text-slate-700">{{ $defaultShiftStart }}–{{ $defaultShiftEnd }}</span>.</p>
                        @else
                            <p class="mb-4 text-sm text-slate-500">Days without a custom shift use the company default <span class="font-mono text-slate-700">{{ $defaultShiftStart }}–{{ $defaultShiftEnd }}</span>.</p>
                        @endif

                        <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-7">
                            @foreach ($dayNames as $i => $name)
                                @php $ws = $workByDay->get($i); @endphp
                                <div class="rounded-lg border p-3 {{ $i === $todayDay ? 'border-indigo-200 bg-indigo-50/40' : 'border-slate-200 bg-white' }}">
                                    <div class="flex items-center justify-between">
                                        <span class="text-xs font-bold {{ $i === $todayDay ? 'text-indigo-700' : 'text-slate-600' }}">{{ mb_substr($name, 0, 3) }}</span>
                                        @if ($i === $todayDay)<span class="badge badge-info">Today</span>@endif
                                    </div>
                                    @if ($ws)
                                        <div class="mt-2 rounded-lg bg-indigo-600 px-2 py-2 text-center text-white shadow-sm">
                                            <div class="font-mono text-xs font-semibold">{{ $ws->start_time->format('g:i A') }}</div>
                                            <div class="font-mono text-xs font-semibold">{{ $ws->end_time->format('g:i A') }}</div>
                                        </div>
                                        <div class="mt-2 flex justify-center">
                                            <form method="POST" action="{{ route('schedules.work.destroy', $ws) }}" data-confirm="Remove this shift?">
                                                @csrf @method('DELETE')
                                                <button class="inline-flex items-center gap-1 text-xs font-medium text-red-500 transition-colors duration-fast hover:text-red-700" title="Remove shift">
                                                    <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                    Remove
                                                </button>
                                            </form>
                                        </div>
                                    @else
                                        <div class="mt-2 rounded-lg border border-dashed border-slate-300 bg-slate-50 px-2 py-3 text-center">
                                            <div class="text-[10px] text-slate-400">Default</div>
                                            <div class="font-mono text-xs text-slate-400">{{ $defaultShiftStart }}–{{ $defaultShiftEnd }}</div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endif
        @else
            {{-- Empty / onboarding state --}}
            <div class="card">
                <div class="card-body">
                    @if (request('employee_id'))
                        <div class="empty-state">
                            <div class="empty-state-icon">🔍</div>
                            <div class="empty-state-title">Employee Not Found</div>
                            <p class="empty-state-text">The selected employee could not be found or is inactive.</p>
                            <a href="{{ route('schedules.index') }}" class="btn btn-outline btn-sm">✕ Clear selection</a>
                        </div>
                    @else
                        <div class="empty-state">
                            <div class="empty-state-icon">🗓️</div>
                            <div class="empty-state-title">Select an Employee</div>
                            <p class="empty-state-text">Search for an employee above. Teaching personnel get per-class schedules; non-teaching personnel get fixed weekly shifts.</p>

                            <div id="employee-recent-hint" class="mt-6" hidden>
                                <p class="mb-2 text-xs font-medium uppercase tracking-wider text-slate-400">Recently viewed</p>
                                <a id="employee-recent-link" href="#" class="inline-flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-4 py-2 text-sm font-medium text-slate-700 transition-colors duration-fast hover:border-indigo-300 hover:text-indigo-600">
                                    <svg class="h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span data-recent-name></span>
                                    <span class="text-slate-400">→ View schedule</span>
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @endif
    </div>

    <script>
        (function () {
            var search = document.getElementById('employee-search');
            var panel = document.getElementById('employee-search-panel');
            if (!search || !panel) return;

            var rows = Array.prototype.slice.call(panel.querySelectorAll('.employee-row'));
            var noResults = document.getElementById('employee-no-results');
            var recentHint = document.getElementById('employee-recent-hint');
            var recentName = recentHint ? recentHint.querySelector('[data-recent-name]') : null;
            var recentLink = document.getElementById('employee-recent-link');

            var STORAGE_KEY = 'hris.lastScheduleEmployee';
            var params = new URLSearchParams(window.location.search);
            var hasSelection = params.get('employee_id');

            if (hasSelection && search.dataset.selectedName) {
                try {
                    localStorage.setItem(STORAGE_KEY, JSON.stringify({
                        id: hasSelection,
                        name: search.dataset.selectedName
                    }));
                } catch (e) {}
            } else if (!hasSelection && recentHint && recentName && recentLink) {
                try {
                    var saved = JSON.parse(localStorage.getItem(STORAGE_KEY) || 'null');
                    if (saved && saved.id && saved.name) {
                        recentName.textContent = saved.name;
                        recentLink.href = "{{ route('schedules.index') }}" + '?employee_id=' + encodeURIComponent(saved.id);
                        recentHint.hidden = false;
                    }
                } catch (e) {}
            }

            // Sequenced prefix matching: type letter by letter from the start.
            // Matches the start of the full name, the start of any name part,
            // or (for multi-word queries) words reading left to right.
            function nameMatches(name, term) {
                var nameWords = name.trim().split(/\s+/);
                var termWords = term.trim().split(/\s+/);

                if (termWords.length === 1) {
                    var t = termWords[0];
                    return name.indexOf(t) === 0 || nameWords.some(function (w) { return w.indexOf(t) === 0; });
                }

                var i = 0;
                for (var k = 0; k < termWords.length; k++) {
                    var tw = termWords[k];
                    var found = false;
                    while (i < nameWords.length) {
                        if (nameWords[i].indexOf(tw) === 0) { found = true; i++; break; }
                        i++;
                    }
                    if (!found) return false;
                }
                return true;
            }

            function filter() {
                var term = search.value.trim().toLowerCase();
                var count = 0;
                rows.forEach(function (row) {
                    var name = (row.getAttribute('data-employee-name') || '').toLowerCase();
                    var match = term.length > 0 && nameMatches(name, term);
                    row.style.display = match ? '' : 'none';
                    if (match) count++;
                });
                panel.hidden = term === '';
                if (noResults) noResults.hidden = term === '' || count > 0;
            }

            search.addEventListener('input', filter);
            search.addEventListener('focus', function () { if (search.value.trim()) panel.hidden = false; });
            document.addEventListener('click', function (e) {
                if (!panel.contains(e.target) && e.target !== search) panel.hidden = true;
            });
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape' && !panel.hidden) { panel.hidden = true; search.focus(); }
            });

            filter();
        })();
    </script>

    <style>
        .schedule-confirm-backdrop {
            position: fixed;
            inset: 0;
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            background: rgba(15, 23, 42, 0.48);
            backdrop-filter: blur(3px);
        }

        .schedule-confirm-card {
            width: min(100%, 28rem);
            overflow: hidden;
            border: 1px solid #e2e8f0;
            border-radius: 0.75rem;
            background: #fff;
            box-shadow: 0 25px 50px -12px rgba(15, 23, 42, 0.3);
            animation: confirm-modal-in 140ms ease-out;
        }

        .schedule-confirm-content {
            padding: 1.5rem;
        }

        .schedule-confirm-title {
            margin: 0 0 0.75rem;
            color: #0f172a;
            font-size: 1.125rem;
            font-weight: 600;
        }

        .schedule-confirm-message {
            margin: 0;
            color: #475569;
            font-size: 0.875rem;
            line-height: 1.5rem;
        }

        .schedule-confirm-actions {
            display: flex;
            justify-content: flex-end;
            gap: 0.5rem;
            padding: 1rem 1.5rem;
            border-top: 1px solid #f1f5f9;
            background: #f8fafc;
        }

        .schedule-confirm-action {
            border: 0;
            border-radius: 0.5rem;
            padding: 0.625rem 1rem;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
        }

        .schedule-confirm-cancel {
            color: #334155;
            background: #e2e8f0;
        }

        .schedule-confirm-delete {
            color: #fff;
            background: #dc2626;
        }

        .schedule-form-message {
            margin-top: 0.75rem;
            color: #b91c1c;
            font-size: 0.875rem;
            font-weight: 500;
        }

        [data-schedule-form] [aria-invalid="true"] {
            border-color: #dc2626;
            box-shadow: 0 0 0 2px rgba(220, 38, 38, 0.12);
        }
    </style>

    <script>
        // Delete confirmation modal (delegated, SPA-safe).
        window.addEventListener('submit', function (event) {
            const form = event.target;

            if (!(form instanceof HTMLFormElement) || !form.dataset.confirm || form.dataset.scheduleConfirmHandled) {
                return;
            }

            event.preventDefault();
            event.stopImmediatePropagation();
            form.dataset.scheduleConfirmHandled = 'true';

            const backdrop = document.createElement('div');
            backdrop.className = 'schedule-confirm-backdrop';
            backdrop.innerHTML = `
                <div class="schedule-confirm-card" role="dialog" aria-modal="true" aria-labelledby="schedule-confirm-title">
                    <div class="schedule-confirm-content">
                        <h2 id="schedule-confirm-title" class="schedule-confirm-title">Confirm deletion</h2>
                        <p class="schedule-confirm-message"></p>
                    </div>
                    <div class="schedule-confirm-actions">
                        <button type="button" class="schedule-confirm-action schedule-confirm-cancel">Cancel</button>
                        <button type="button" class="schedule-confirm-action schedule-confirm-delete">Delete</button>
                    </div>
                </div>
            `;

            backdrop.querySelector('.schedule-confirm-message').textContent = form.dataset.confirm;
            document.body.append(backdrop);

            const close = (confirmed) => {
                backdrop.remove();
                form.dataset.scheduleConfirmHandled = '';

                if (confirmed) {
                    HTMLFormElement.prototype.submit.call(form);
                }
            };

            backdrop.querySelector('.schedule-confirm-cancel').addEventListener('click', () => close(false));
            backdrop.querySelector('.schedule-confirm-delete').addEventListener('click', () => close(true));
            backdrop.addEventListener('click', (modalEvent) => {
                if (modalEvent.target === backdrop) {
                    close(false);
                }
            });
            document.addEventListener('keydown', function handleEscape(keyEvent) {
                if (keyEvent.key === 'Escape') {
                    document.removeEventListener('keydown', handleEscape);
                    close(false);
                }
            });
            backdrop.querySelector('.schedule-confirm-delete').focus();
        }, true);
    </script>

    <script>
        (function () {
            var forms = document.querySelectorAll('[data-schedule-form]');
            if (!forms.length) return;

            Array.prototype.forEach.call(forms, function (form) {
                var message = document.createElement('p');
                message.className = 'schedule-form-message';
                message.setAttribute('role', 'alert');
                message.hidden = true;
                var submitBtn = form.querySelector('button[type="submit"]');
                if (submitBtn) submitBtn.parentNode.insertBefore(message, submitBtn);

                var isTeaching = form.getAttribute('data-schedule-form') === 'teaching';
                var labelFields = Array.prototype.slice.call(form.querySelectorAll('[data-field-label]'));
                var dayChecks = isTeaching ? Array.prototype.slice.call(form.querySelectorAll('input[name="day[]"]')) : [];
                var startField = labelFields.find(function (f) { return f.getAttribute('data-field-label') === 'Start time'; });
                var endField = labelFields.find(function (f) { return f.getAttribute('data-field-label') === 'End time'; });

                function clearError() {
                    this.removeAttribute('aria-invalid');
                    message.hidden = true;
                }

                labelFields.forEach(function (f) {
                    f.addEventListener('input', clearError);
                    f.addEventListener('change', clearError);
                });
                dayChecks.forEach(function (c) { c.addEventListener('change', clearError); });

                function fail(field, text) {
                    labelFields.forEach(function (f) { f.removeAttribute('aria-invalid'); });
                    dayChecks.forEach(function (c) { c.closest('label').classList.add('ring-2', 'ring-red-300', 'rounded-lg'); });
                    if (field) { field.setAttribute('aria-invalid', 'true'); field.focus(); }
                    message.textContent = text;
                    message.hidden = false;
                }

                function endInvalid() {
                    return startField && endField && startField.value && endField.value && endField.value <= startField.value;
                }

                form.addEventListener('submit', function (event) {
                    if (form.dataset.submitting) return;

                    var empty = labelFields.find(function (f) { return !f.value.trim(); });
                    if (empty) {
                        event.preventDefault();
                        event.stopImmediatePropagation();
                        fail(empty, 'Please fill in the ' + empty.getAttribute('data-field-label') + ' field before adding the schedule.');
                        return;
                    }

                    if (isTeaching) {
                        var checkedDays = dayChecks.filter(function (c) { return c.checked; }).map(function (c) { return c.value; });
                        if (!checkedDays.length) {
                            event.preventDefault();
                            event.stopImmediatePropagation();
                            fail(null, 'Select at least one day for the class.');
                            return;
                        }
                        if (endInvalid()) {
                            event.preventDefault();
                            event.stopImmediatePropagation();
                            fail(endField, 'End time must be later than start time.');
                            return;
                        }
                        if (checkedDays.length > 1) {
                            event.preventDefault();
                            event.stopImmediatePropagation();
                            form.dataset.submitting = '1';
                            if (submitBtn) submitBtn.disabled = true;
                            submitReplica(form, checkedDays);
                            return;
                        }
                    } else if (endInvalid()) {
                        event.preventDefault();
                        event.stopImmediatePropagation();
                        fail(endField, 'End time must be later than start time.');
                        return;
                    }

                    if (submitBtn) submitBtn.disabled = true;
                });

                function valueOf(name) {
                    var el = form.querySelector('[name="' + name + '"]');
                    return el ? el.value : '';
                }

                function submitReplica(sourceForm, days) {
                    var replica = document.createElement('form');
                    replica.method = 'POST';
                    replica.action = sourceForm.action;

                    function hidden(name, value) {
                        var input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = name;
                        input.value = value;
                        replica.appendChild(input);
                    }

                    hidden('_token', valueOf('_token'));
                    hidden('employee_id', valueOf('employee_id'));

                    var subject = valueOf('subject_id[]');
                    var room = valueOf('room_id[]');
                    var start = valueOf('start_time[]');
                    var end = valueOf('end_time[]');
                    var semester = valueOf('semester_id[]');

                    days.forEach(function (day, i) {
                        hidden('day[' + i + ']', day);
                        hidden('subject_id[' + i + ']', subject);
                        hidden('room_id[' + i + ']', room);
                        hidden('start_time[' + i + ']', start);
                        hidden('end_time[' + i + ']', end);
                        hidden('semester_id[' + i + ']', semester);
                    });

                    replica.hidden = true;
                    document.body.appendChild(replica);
                    replica.submit();
                }
            });
        })();
    </script>
</x-app-layout>