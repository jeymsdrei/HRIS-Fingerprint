<x-app-layout hris>
    <x-slot name="title">Departments & Positions</x-slot>

    <div class="page-container">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-900">Departments & Positions</h1>
            <p class="mt-2 text-slate-600">Manage organizational structure</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            {{-- Departments --}}
            <div class="card">
                <div class="card-header">
                    <h2 class="font-semibold text-slate-900">Departments</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('departments.store') }}" class="flex gap-2 mb-5">
                        @csrf
                        <input name="name" placeholder="Department name" class="input flex-1" required>
                        <input name="code" placeholder="Code" class="input w-24">
                        <button class="btn btn-primary">Add</button>
                    </form>
                    <div class="space-y-2">
                        @forelse ($departments as $d)
                        <div class="relative flex items-center justify-between border-b border-slate-100 py-2" x-data="{ open: false, editing: false }" @click.outside="open = false">
                            <div>
                                <p class="font-medium text-slate-900">{{ $d->name }} <span class="text-xs text-slate-400">{{ $d->code }}</span></p>
                                <p class="text-xs text-slate-400">{{ $d->employees_count }} employees</p>
                            </div>
                            <div class="relative">
                                <button type="button" @click="open = !open" class="p-2 text-slate-500 hover:bg-slate-100 rounded-lg" aria-label="Department actions">
                                    <span class="block text-lg leading-none">&middot;&middot;&middot;</span>
                                </button>
                                <div x-show="open" x-cloak class="absolute right-0 top-full mt-1 w-32 rounded-lg bg-white shadow-lg border border-slate-200 py-1 z-10">
                                    <button type="button" @click="editing = true; open = false" class="block w-full text-left px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">Edit</button>
                                    <form method="POST" action="{{ route('departments.destroy', $d) }}" onsubmit="return confirm('Delete department?')">
                                        @csrf @method('DELETE')
                                        <button class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">Delete</button>
                                    </form>
                                </div>
                            </div>
                            <form x-show="editing" x-cloak method="POST" action="{{ route('departments.update', $d) }}" class="absolute inset-x-0 top-full z-20 mt-1 flex gap-2 rounded-lg border border-slate-200 bg-white p-2 shadow-lg">
                                @csrf @method('PATCH')
                                <input name="name" value="{{ $d->name }}" class="input flex-1" required>
                                <input name="code" value="{{ $d->code }}" class="input w-24">
                                <button class="btn btn-primary btn-sm">Save</button>
                                <button type="button" @click="editing = false" class="btn btn-secondary btn-sm">Cancel</button>
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
                        <div>
                            <label class="input-label">Department</label>
                            <select name="department_id" class="input">
                                <option value="">No dept</option>
                                @foreach ($departments as $d)<option value="{{ $d->id }}">{{ $d->name }}</option>@endforeach
                            </select>
                        </div>
                        <div>
                            <label class="input-label">Category</label>
                            <select name="category" class="input">
                                <option value="non_teaching">Non-Teaching</option>
                                <option value="teaching">Teaching</option>
                            </select>
                        </div>
                        <button class="btn btn-primary">Add</button>
                    </form>
                    <div class="space-y-2 max-h-96 overflow-y-auto">
                        @forelse ($positions as $p)
                        <div class="relative flex items-center justify-between border-b border-slate-100 py-2" x-data="{ open: false, editing: false }" @click.outside="open = false">
                            <div>
                                <p class="font-medium text-slate-900">{{ $p->name }}</p>
                                <p class="text-xs text-slate-400">{{ $p->department?->name ?? 'General' }} · {{ $p->category }}</p>
                            </div>
                            <div class="relative">
                                <button type="button" @click="open = !open" class="p-2 text-slate-500 hover:bg-slate-100 rounded-lg" aria-label="Position actions">
                                    <span class="block text-lg leading-none">&middot;&middot;&middot;</span>
                                </button>
                                <div x-show="open" x-cloak class="absolute right-0 top-full mt-1 w-32 rounded-lg bg-white shadow-lg border border-slate-200 py-1 z-10">
                                    <button type="button" @click="editing = true; open = false" class="block w-full text-left px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">Edit</button>
                                    <form method="POST" action="{{ route('positions.destroy', $p) }}" onsubmit="return confirm('Delete position?')">
                                        @csrf @method('DELETE')
                                        <button class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">Delete</button>
                                    </form>
                                </div>
                            </div>
                            <form x-show="editing" x-cloak method="POST" action="{{ route('positions.update', $p) }}" class="absolute inset-x-0 top-full z-20 mt-1 flex flex-wrap gap-2 rounded-lg border border-slate-200 bg-white p-2 shadow-lg">
                                @csrf @method('PATCH')
                                <input name="name" value="{{ $p->name }}" class="input flex-1 min-w-32" required>
                                <select name="department_id" class="input">
                                    <option value="">No dept</option>
                                    @foreach ($departments as $d)<option value="{{ $d->id }}" @selected($p->department_id === $d->id)>{{ $d->name }}</option>@endforeach
                                </select>
                                <select name="category" class="input">
                                    <option value="non_teaching" @selected($p->category === 'non_teaching')>Non-Teaching</option>
                                    <option value="teaching" @selected($p->category === 'teaching')>Teaching</option>
                                </select>
                                <button class="btn btn-primary btn-sm">Save</button>
                                <button type="button" @click="editing = false" class="btn btn-secondary btn-sm">Cancel</button>
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
