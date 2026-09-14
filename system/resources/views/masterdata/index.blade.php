<x-app-layout hris>
    <x-slot name="title">Master Data — Courses, Subjects, Rooms, School Years</x-slot>

    <div class="page-container">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-900">Master Data</h1>
            <p class="mt-2 text-slate-600">Manage courses, subjects, rooms, and school years</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-start">
            {{-- Courses --}}
            <div class="card flex flex-col">
                <div class="card-header">
                    <h2 class="font-semibold text-slate-900">Courses</h2>
                </div>
                <div class="card-body flex flex-col">
                    <form method="POST" action="{{ route('masterdata.courses.store') }}" class="flex gap-2 mb-5">
                        @csrf
                        <input name="code" placeholder="Code" class="input w-20" required>
                        <input name="name" placeholder="Course name" class="input flex-1" required>
                        <button class="btn btn-primary">Add</button>
                    </form>
                    <div class="space-y-1 h-96 overflow-y-auto pr-1 [scrollbar-width:thin]">
                        @forelse ($courses as $c)
                            <div class="flex items-center justify-between gap-2 text-sm border-b border-slate-100 py-1.5">
                                <span class="text-slate-700"><b>{{ $c->code }}</b> — {{ $c->name }}</span>
                                <div class="flex items-center gap-3">
                                    @if ($c->total_units)
                                        <span class="text-xs text-slate-400">{{ $c->total_units }}u</span>
                                    @endif
                                    <form method="POST" action="{{ route('masterdata.courses.destroy', $c) }}" onsubmit="return confirm('Delete course {{ $c->code }}?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-xs font-medium text-red-600 hover:text-red-800">Delete</button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <div class="empty-state">
                                <div class="empty-state-title">No Courses</div>
                                <p class="empty-state-text">Add your first course.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            {{-- Subjects --}}
            <div class="card flex flex-col">
                <div class="card-header">
                    <h2 class="font-semibold text-slate-900">Subjects</h2>
                </div>
                <div class="card-body flex flex-col">
                    <form method="POST" action="{{ route('masterdata.subjects.store') }}" class="flex gap-2 mb-5">
                        @csrf
                        <input name="code" placeholder="Code" class="input w-20" required>
                        <input name="name" placeholder="Subject name" class="input flex-1" required>
                        <button class="btn btn-primary">Add</button>
                    </form>
                    <div class="space-y-1 h-96 overflow-y-auto pr-1 [scrollbar-width:thin]">
                        @forelse ($subjects as $s)
                            <div class="flex items-center justify-between gap-2 text-sm border-b border-slate-100 py-1.5">
                                <span class="text-slate-700"><b>{{ $s->code }}</b> — {{ $s->name }}</span>
                                <div class="flex items-center gap-3">
                                    <span class="text-xs text-slate-400">{{ $s->units }}u</span>
                                    <form method="POST" action="{{ route('masterdata.subjects.destroy', $s) }}" onsubmit="return confirm('Delete subject {{ $s->code }}?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-xs font-medium text-red-600 hover:text-red-800">Delete</button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <div class="empty-state">
                                <div class="empty-state-title">No Subjects</div>
                                <p class="empty-state-text">Add your first subject.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            {{-- Rooms --}}
            <div class="card flex flex-col">
                <div class="card-header">
                    <h2 class="font-semibold text-slate-900">Rooms</h2>
                </div>
                <div class="card-body flex flex-col">
                    <form method="POST" action="{{ route('masterdata.rooms.store') }}" class="flex gap-2 mb-5">
                        @csrf
                        <input name="code" value="{{ old('code') }}" placeholder="Code" class="input w-20" required>
                        <input name="name" value="{{ old('name') }}" placeholder="Room name" class="input flex-1" required>
                        <button class="btn btn-primary">Add</button>
                    </form>
                    @if ($errors->room->has('code') || $errors->room->has('name') || $errors->room->has('building') || $errors->room->has('capacity'))
                        <div class="mb-4 rounded-md border border-red-200 bg-red-50 px-3 py-2 text-sm text-red-700">
                            @foreach (['code', 'name', 'building', 'capacity'] as $field)
                                @error($field, 'room')<p>{{ $message }}</p>@enderror
                            @endforeach
                        </div>
                    @endif
                    <div class="space-y-1 h-96 overflow-y-auto pr-1 [scrollbar-width:thin]">
                        @forelse ($rooms as $r)
                            <div class="flex items-center justify-between gap-2 text-sm border-b border-slate-100 py-1.5">
                                <span class="text-slate-700"><b>{{ $r->code }}</b> — {{ $r->name }}</span>
                                <div class="flex items-center gap-3">
                                    <span class="text-xs text-slate-400">{{ $r->building }} · {{ $r->capacity }} seats</span>
                                    <form method="POST" action="{{ route('masterdata.rooms.destroy', $r) }}" onsubmit="return confirm('Delete room {{ $r->code }}?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-xs font-medium text-red-600 hover:text-red-800">Delete</button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <div class="empty-state">
                                <div class="empty-state-title">No Rooms</div>
                                <p class="empty-state-text">Add your first room.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            {{-- School Years --}}
            <div class="card flex flex-col h-full md:col-span-3">
                <div class="card-header shrink-0">
                    <h2 class="font-semibold text-slate-900">School Years & Semesters</h2>
                </div>
                <div class="card-body flex-1 min-h-0 flex flex-col gap-4">
                    <form method="POST" action="{{ route('masterdata.schoolyears.store') }}" class="space-y-2 shrink-0">
                        @csrf
                        <input name="name" placeholder="e.g. 2026-2027" class="input w-full" required>
                        <div class="flex gap-2">
                            <input type="date" name="start_date" class="input" required aria-label="Start date">
                            <input type="date" name="end_date" class="input" required aria-label="End date">
                        </div>
                        <button class="btn btn-primary w-full">Add School Year</button>
                    </form>
                    <div class="space-y-3 flex-1 min-h-[5rem] overflow-y-auto pr-1 [scrollbar-width:thin]">
                        @forelse ($schoolYears as $sy)
                            <div class="rounded-card border p-3 {{ $sy->is_active ? 'border-indigo-300 bg-indigo-50/40' : 'border-slate-200' }}">
                                <div class="flex justify-between items-center">
                                    <span class="font-medium text-slate-900">{{ $sy->name }} {{ $sy->is_active ? '⭐' : '' }}</span>
                                    @if (!$sy->is_active)
                                    <form method="POST" action="{{ route('masterdata.schoolyears.activate', $sy) }}">
                                        @csrf
                                        <button class="text-xs text-indigo-600 font-medium">Activate</button>
                                    </form>
                                    @endif
                                </div>
                                @foreach ($sy->semesters as $sem)
                                    <div class="flex justify-between text-xs text-slate-500 mt-1">
                                        <span>{{ $sem->name }} (<span class="font-mono">{{ $sem->start_date->format('M d') }} – {{ $sem->end_date->format('M d') }}</span>) {{ $sem->is_active ? '· active' : '' }}</span>
                                        @if (!$sem->is_active)
                                        <form method="POST" action="{{ route('masterdata.semesters.activate', $sem) }}">@csrf<button class="text-indigo-600">Activate</button></form>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @empty
                            <div class="empty-state">
                                <div class="empty-state-title">No School Years</div>
                                <p class="empty-state-text">Add your first school year.</p>
                            </div>
                        @endforelse
                    </div>

                    <form method="POST" action="{{ route('masterdata.semesters.store') }}" class="flex flex-wrap gap-2 items-end shrink-0">
                        @csrf
                        <div class="flex-1 min-w-full">
                            <label class="sr-only" for="semester-school-year">School year</label>
                            <select id="semester-school-year" name="school_year_id" class="input" required>
                                @foreach ($schoolYears as $sy)<option value="{{ $sy->id }}">{{ $sy->name }}</option>@endforeach
                            </select>
                        </div>
                        <input name="name" placeholder="e.g. 1st Semester" class="input flex-1 min-w-32" required aria-label="Semester name">
                        <input type="date" name="start_date" class="input" required aria-label="Semester start date">
                        <input type="date" name="end_date" class="input" required aria-label="Semester end date">
                        <button class="btn btn-primary shrink-0">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
