<x-app-layout hris>
    <x-slot name="title">Employees</x-slot>

    <div class="page-container">
        {{-- Page Header --}}
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-900">Employees</h1>
            <p class="mt-2 text-slate-600">Manage employee information, positions, and assignments</p>
        </div>

        {{-- Search & Filters --}}
        <div class="mb-8 card">
            <div class="card-body">
                <form method="GET" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div class="lg:col-span-2">
                            <label class="input-label">Search</label>
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name or employee ID..." class="input">
                        </div>
                        <div>
                            <label class="input-label">Department</label>
                            <select name="department" class="input">
                                <option value="">All Departments</option>
                                @foreach ($departments ?? [] as $d)
                                    <option value="{{ $d->id }}" {{ request('department') == $d->id ? 'selected' : '' }}>{{ $d->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="input-label">Status</label>
                            <select name="status" class="input">
                                <option value="">All</option>
                                <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex gap-3 pt-2">
                        <button type="submit" class="btn btn-primary">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                            </svg>
                            Filter
                        </button>
                        @if(request()->hasAny(['search', 'department', 'status']))
                            <a href="{{ route('employees.index') }}" class="btn btn-secondary">Reset</a>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        {{-- Add Employee Button --}}
        <div class="mb-6">
            <a href="{{ route('employees.create') }}" class="btn btn-primary">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Add Employee
            </a>
        </div>

        {{-- Employee Table --}}
        <div class="card">
            <div class="table-container">
                <table class="data-table">
                    <thead class="table-head">
                        <tr>
                            <th class="table-head-cell">ID</th>
                            <th class="table-head-cell">Name</th>
                            <th class="table-head-cell">Department</th>
                            <th class="table-head-cell">Position</th>
                            <th class="table-head-cell">Type</th>
                            <th class="table-head-cell">Status</th>
                            <th class="table-head-cell">Monthly Rate</th>
                            <th class="table-head-cell text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Data-driven skeleton rows while data renders --}}
                        <tr x-show="!$store.table.loaded" x-cloak>
                            <td colspan="8" class="table-body-cell p-6">
                                <div class="space-y-3">
                                    @for ($i = 0; $i < 6; $i++)
                                        <div class="flex items-center gap-4">
                                            <div class="skeleton-circle h-8 w-8"></div>
                                            <div class="flex-1 skeleton-text"></div>
                                            <div class="w-32 skeleton-text"></div>
                                            <div class="w-24 skeleton-text"></div>
                                        </div>
                                    @endfor
                                </div>
                            </td>
                        </tr>

                        @forelse ($employees as $e)
                        <tr class="table-body-row" x-show="$store.table.loaded" x-cloak>
                            <td class="table-body-cell">
                                <span class="font-mono text-xs font-semibold text-indigo-600">{{ $e->employee_id }}</span>
                            </td>
                            <td class="table-body-cell">
                                <div class="flex items-center gap-3">
                                    <div class="h-8 w-8 rounded-full bg-gradient-to-br from-indigo-600 to-indigo-700 text-white flex items-center justify-center text-xs font-bold">
                                        {{ mb_strtoupper(mb_substr($e->first_name, 0, 1) . mb_substr($e->last_name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <a href="{{ route('employees.show', $e) }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-700">{{ $e->full_name }}</a>
                                        <p class="text-xs text-slate-500">{{ $e->email ?? '—' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="table-body-cell">{{ $e->department?->name ?? '—' }}</td>
                            <td class="table-body-cell">{{ $e->position?->name ?? '—' }}</td>
                            <td class="table-body-cell">
                                <div class="flex flex-wrap gap-1">
                                    <span class="badge {{ $e->isTeaching ? 'badge-info' : 'badge-success' }} text-xs">{{ $e->classification == 'teaching' ? 'Teaching' : 'Non-Teaching' }}</span>
                                    <span class="badge {{ $e->isPermanent ? 'badge-info' : 'badge-warning' }} text-xs">{{ $e->employment_status == 'permanent' ? 'Permanent' : 'Contractual' }}</span>
                                </div>
                            </td>
                            <td class="table-body-cell">
                                <span class="badge {{ $e->is_active ? 'badge-success' : 'badge-danger' }} text-xs">
                                    {{ $e->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="table-body-cell font-medium text-slate-900">₱{{ number_format($e->monthly_salary, 2) }}</td>
                            <td class="table-body-cell text-right">
                                <div class="flex justify-end gap-2" x-data="{ open: false }" @click.outside="open = false">
                                    <a href="{{ route('employees.show', $e) }}" class="text-indigo-600 hover:text-indigo-700 text-xs font-medium">View</a>
                                    <button @click="open = !open" class="text-slate-400 hover:text-slate-600">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10.5 1.5H9.5A4.5 4.5 0 005 6v8a4.5 4.5 0 004.5 4.5h1a4.5 4.5 0 004.5-4.5V6a4.5 4.5 0 00-4.5-4.5z"></path>
                                        </svg>
                                    </button>
                                    <div x-show="open" x-cloak class="absolute right-0 mt-8 w-40 rounded-lg bg-white shadow-lg border border-slate-200 py-1">
                                        <a href="{{ route('employees.edit', $e) }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">Edit</a>
                                        <a href="{{ route('employees.show', $e) }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">Full Profile</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr x-show="$store.table.loaded" x-cloak>
                            <td colspan="8" class="table-body-cell">
                                <div class="empty-state py-12">
                                    <div class="empty-state-icon">👥</div>
                                    <div class="empty-state-title">No Employees Found</div>
                                    <p class="empty-state-text">Try adjusting your search criteria or create a new employee</p>
                                    <a href="{{ route('employees.create') }}" class="btn btn-primary mt-4">Add Employee</a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if ($employees->hasPages())
                <div class="card-footer">
                    {{ $employees->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>

