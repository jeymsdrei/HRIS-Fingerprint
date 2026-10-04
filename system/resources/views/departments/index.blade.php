<x-app-layout hris>
    <x-slot name="title">Departments & Positions</x-slot>

    <div class="page-container">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-900">Departments & Positions</h1>
            <p class="mt-2 text-slate-600">Manage organizational structure</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 items-start">
            {{-- Departments --}}
            <div class="card">
                <div class="card-header">
                    <h2 class="font-semibold text-slate-900">Departments</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('departments.store') }}" class="flex flex-wrap gap-2 mb-5">
                        @csrf
                        <input name="name" placeholder="Department name" class="input flex-1 min-w-0" required>
                        <input name="code" placeholder="Code" class="input w-24">
                        <button class="btn btn-primary">Add</button>
                    </form>
                    <div class="space-y-2 max-h-96 overflow-y-auto overscroll-contain pr-1">
                        @forelse ($departments as $d)
                        <div class="flex items-center justify-between gap-3 border-b border-slate-100 py-2">
                            <div class="min-w-0">
                                <p class="truncate font-medium text-slate-900">{{ $d->name }} <span class="text-xs text-slate-400">{{ $d->code }}</span></p>
                                <p class="text-xs text-slate-400">{{ $d->employees_count }} employees</p>
                            </div>
                            <form method="POST" action="{{ route('departments.destroy', $d) }}" data-confirm="Delete department?" class="shrink-0">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-sm font-medium text-red-600 hover:text-red-700" title="Delete department" aria-label="Delete {{ $d->name }}">Delete</button>
                            </form>
                        </div>
                        @empty
                        <div class="empty-state">
                            <div class="empty-state-icon">🏢</div>
                            <div class="empty-state-title">No Departments</div>
                            <p class="empty-state-text">Add your first department.</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>

            {{-- Positions --}}
            <div class="card">
                <div class="card-header">
                    <h2 class="font-semibold text-slate-900">Positions</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('positions.store') }}" class="flex flex-wrap gap-2 mb-5 items-end">
                        @csrf
                        <div class="flex-1 min-w-32">
                            <label class="input-label">Name</label>
                            <input name="name" placeholder="Position name" class="input" required>
                        </div>
                        <div class="w-full min-w-0 sm:w-auto">
                            <label class="input-label">Department</label>
                            <select name="department_id" class="input w-full min-w-0 sm:w-auto">
                                <option value="">No dept</option>
                                @foreach ($departments as $d)<option value="{{ $d->id }}">{{ $d->name }}</option>@endforeach
                            </select>
                        </div>
                        <div class="w-full min-w-0 sm:w-auto">
                            <label class="input-label">Category</label>
                            <select name="category" class="input w-full min-w-0 sm:w-auto">
                                <option value="non_teaching">Non-Teaching</option>
                                <option value="teaching">Teaching</option>
                            </select>
                        </div>
                        <button class="btn btn-primary">Add</button>
                    </form>
                    <div class="space-y-2 max-h-96 overflow-y-auto overscroll-contain pr-1">
                        @forelse ($positions as $p)
                        <div class="flex items-center justify-between gap-3 border-b border-slate-100 py-2">
                            <div class="min-w-0">
                                <p class="truncate font-medium text-slate-900">{{ $p->name }}</p>
                                <p class="truncate text-xs text-slate-400">{{ $p->department?->name ?? 'General' }} · {{ $p->category }}</p>
                            </div>
                            <form method="POST" action="{{ route('positions.destroy', $p) }}" data-confirm="Delete position?" class="shrink-0">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-sm font-medium text-red-600 hover:text-red-700" title="Delete position" aria-label="Delete {{ $p->name }}">Delete</button>
                            </form>
                        </div>
                        @empty
                        <div class="empty-state">
                            <div class="empty-state-icon">💼</div>
                            <div class="empty-state-title">No Positions</div>
                            <p class="empty-state-text">Add your first position.</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>