<x-app-layout hris>
    <x-slot name="title">Schedules</x-slot>

    @php $dayNames = App\Models\TeachingSchedule::$dayNames; @endphp

    <div class="page-container space-y-6">
        {{-- Page Header --}}
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-900">Schedules</h1>
            <p class="mt-2 text-slate-600">Manage teaching and work schedules for employees</p>
        </div>

        {{-- Select employee --}}
        <div class="card">
            <div class="card-body">
                <form method="GET" class="flex flex-wrap gap-3 items-end">
                    <div class="flex-1 min-w-48">
                        <label class="input-label">Employee</label>
                        <select name="employee_id" onchange="this.form.submit()" class="input">
                            <option value="">Select employee...</option>
                            @foreach ($employeeList as $e)
                                <option value="{{ $e->id }}" @selected((string) request('employee_id') === (string) $e->id)>
                                    {{ $e->employee_id }} — {{ $e->full_name }} ({{ $e->classification }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @include('partials.employee-filters')
                    <button class="btn btn-primary">Filter</button>
                </form>
            </div>
        </div>

        @if (request('employee_id'))
            @php $employee = $employeeList->firstWhere('id', (int) request('employee_id')); @endphp

            @if ($employee && $employee->classification === 'teaching')
            <div class="card">
                <div class="card-header">
                    <h2 class="font-semibold text-slate-900">Teaching Schedule — {{ $employee->full_name }}</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('schedules.teaching.store') }}" class="mb-6">
                        @csrf
                        <input type="hidden" name="employee_id" value="{{ $employee->id }}">

                        <div class="grid grid-cols-2 md:grid-cols-6 gap-3 mb-1">
                            <div><label class="input-label">Subject</label></div>
                            <div><label class="input-label">Room</label></div>
                            <div><label class="input-label">Day</label></div>
                            <div><label class="input-label">Start</label></div>
                            <div><label class="input-label">End</label></div>
                            <div><label class="input-label">Semester</label></div>
                        </div>

                        <div class="grid grid-cols-2 md:grid-cols-6 gap-3 items-end">
                                <div>
                                    <select name="subject_id[]" class="input">
                                        <option value="">Subject</option>
                                        @foreach (App\Models\Subject::all() as $s)<option value="{{ $s->id }}">{{ $s->code }}</option>@endforeach
                                    </select>
                                </div>
                                <div>
                                    <select name="room_id[]" class="input">
                                        <option value="">Room</option>
                                        @foreach (App\Models\Room::all() as $r)<option value="{{ $r->id }}">{{ $r->code }}</option>@endforeach
                                    </select>
                                </div>
                                <div>
                                    <select name="day[]" class="input">
                                        <option value="">Day</option>
                                        @foreach ($dayNames as $i => $dn)<option value="{{ $i }}">{{ $dn }}</option>@endforeach
                                    </select>
                                </div>
                                <div>
                                    <input type="time" name="start_time[]" class="input">
                                </div>
                                <div>
                                    <input type="time" name="end_time[]" class="input">
                                </div>
                                <div>
                                    <select name="semester_id[]" class="input">
                                        <option value="">Semester</option>
                                        @foreach (App\Models\Semester::where('is_active', true)->get() as $s)<option value="{{ $s->id }}">{{ $s->name }}</option>@endforeach
                                    </select>
                                </div>
                        </div>

                        <div class="mt-3">
                            <button class="btn btn-primary">Add Class</button>
                        </div>
                    </form>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @forelse ($schedules as $s)
                        <div class="rounded-card border border-slate-200 p-4 hover:shadow-md transition-shadow duration-fast">
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="font-medium text-slate-900">{{ $s->subject?->name ?? 'Subject' }}</p>
                                    <p class="text-sm text-slate-500">{{ $s->day_name }} · <span class="font-mono">{{ $s->start_time->format('h:i A') }} – {{ $s->end_time->format('h:i A') }}</span></p>
                                    <p class="text-xs text-slate-400">Room: {{ $s->room?->name ?? '—' }} · {{ $s->semester?->name }}</p>
                                </div>
                                <form method="POST" action="{{ route('schedules.teaching.destroy', $s) }}" onsubmit="return confirm('Remove this class?')">
                                    @csrf @method('DELETE')
                                    <button class="text-red-500 hover:text-red-700 text-sm p-1">✕</button>
                                </form>
                            </div>
                        </div>
                        @empty
                        <div class="col-span-full">
                            <div class="empty-state">
                                <div class="empty-state-icon">🗓️</div>
                                <div class="empty-state-title">No Teaching Schedules</div>
                                <p class="empty-state-text">Add class schedules above.</p>
                            </div>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
            @endif

            @if ($employee && $employee->classification === 'non_teaching')
            <div class="card">
                <div class="card-header">
                    <h2 class="font-semibold text-slate-900">Work Schedule — {{ $employee->full_name }}</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('schedules.work.store') }}" class="grid grid-cols-2 md:grid-cols-5 gap-3 mb-6 items-end">
                        @csrf
                        <input type="hidden" name="employee_id" value="{{ $employee->id }}">
                        <div>
                            <label class="input-label">Day</label>
                            <select name="day" class="input">
                                @foreach ($dayNames as $i => $dn)<option value="{{ $i }}">{{ $dn }}</option>@endforeach
                            </select>
                        </div>
                        <div>
                            <label class="input-label">Start</label>
                            <input type="time" name="start_time" class="input" required>
                        </div>
                        <div>
                            <label class="input-label">End</label>
                            <input type="time" name="end_time" class="input" required>
                        </div>
                        <button class="btn btn-primary">Add Day</button>
                    </form>
                    <div class="space-y-2">
                        @forelse ($workSchedules as $s)
                        <div class="flex items-center justify-between rounded-card border border-slate-200 px-4 py-3">
                            <span class="text-sm text-slate-700 font-medium">{{ $s->day_name }}</span>
                            <span class="text-sm text-slate-500 font-mono">{{ $s->start_time->format('h:i A') }} – {{ $s->end_time->format('h:i A') }}</span>
                            <form method="POST" action="{{ route('schedules.work.destroy', $s) }}" onsubmit="return confirm('Remove?')">
                                @csrf @method('DELETE')
                                <button class="text-red-500 hover:text-red-700 text-sm p-1">✕</button>
                            </form>
                        </div>
                        @empty
                        <div class="empty-state">
                            <div class="empty-state-icon">🗓️</div>
                            <div class="empty-state-title">No Work Schedules</div>
                            <p class="empty-state-text">Falls back to company default: Mon–Fri {{ App\Models\Setting::get('default_shift_start', '08:00') }}–{{ App\Models\Setting::get('default_shift_end', '17:00') }}.</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
            @endif
        @else
            <div class="card">
                <div class="card-body">
                    <div class="empty-state">
                        <div class="empty-state-icon">🗓️</div>
                        <div class="empty-state-title">Select an Employee</div>
                        <p class="empty-state-text">Teaching personnel get per-class schedules; non-teaching personnel get fixed weekly shifts.</p>
                    </div>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
