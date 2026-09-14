<x-app-layout hris>
    <x-slot name="title">Users & Permissions</x-slot>

    <div class="page-container space-y-6">
        {{-- Page Header --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold text-slate-900">Users & Permissions</h1>
                <p class="mt-2 text-slate-600">Manage system users and roles</p>
            </div>
            <a href="{{ route('users.create') }}" class="btn btn-primary">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M12 4v16m8-8H4"></path></svg>
                New User
            </a>
        </div>

        {{-- Filters --}}
        <div class="card">
            <div class="card-body">
                <form method="GET" class="flex flex-wrap gap-3 items-end">
                    <div>
                        <label class="input-label">Search</label>
                        <input name="search" value="{{ request('search') }}" placeholder="Search user..." class="input w-56">
                    </div>
                    <div>
                        <label class="input-label">Role</label>
                        <select name="role" class="input">
                            <option value="">All Roles</option>
                            @foreach (collect(App\Models\User::ROLES)->reject(fn ($r) => $r === 'employee') as $r)<option value="{{ $r }}" @selected(request('role') == $r)>{{ ucwords(str_replace('_', ' ', $r)) }}</option>@endforeach
                        </select>
                    </div>
                    <button class="btn btn-primary">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M21 21l-4.35-4.35M17 10.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z"></path></svg>
                        Filter
                    </button>
                </form>
            </div>
        </div>

        {{-- Table --}}
        <div class="card">
            <div class="table-container">
                <table class="data-table">
                    <thead class="table-head">
                        <tr>
                            <th class="table-head-cell">Name</th>
                            <th class="table-head-cell">Username</th>
                            <th class="table-head-cell">Role</th>
                            <th class="table-head-cell">Employee</th>
                            <th class="table-head-cell">Status</th>
                            <th class="table-head-cell text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $u)
                        <tr class="table-body-row">
                            <td class="table-body-cell font-medium text-slate-900">{{ $u->name }}</td>
                            <td class="table-body-cell text-slate-600">{{ $u->username }}</td>
                            <td class="table-body-cell">
                                <span class="badge {{ $u->role === 'admin' ? 'badge-info' : ($u->role === 'hr' ? 'badge-neutral' : ($u->role === 'payroll_officer' ? 'badge-success' : 'badge-warning')) }}">{{ $u->roleLabel() }}</span>
                            </td>
                            <td class="table-body-cell text-slate-600">{{ $u->employee?->full_name ?? '—' }}</td>
                            <td class="table-body-cell">
                                <span class="badge {{ $u->is_active ? 'badge-success' : 'badge-danger' }}">{{ $u->is_active ? 'Active' : 'Inactive' }}</span>
                            </td>
                            <td class="table-body-cell text-right space-x-2 whitespace-nowrap">
                                <a href="{{ route('users.edit', $u) }}" class="btn btn-secondary btn-sm">Edit</a>
                                <form method="POST" action="{{ route('users.toggle', $u) }}" class="inline">
                                    @csrf @method('PATCH')
                                    <button class="btn btn-outline btn-sm">{{ $u->is_active ? 'Disable' : 'Enable' }}</button>
                                </form>
                                @if ($u->id !== auth()->id())
                                <form method="POST" action="{{ route('users.destroy', $u) }}" class="inline" onsubmit="return confirm('Delete this user?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="table-body-cell">
                                <div class="empty-state">
                                    <div class="empty-state-icon">👤</div>
                                    <div class="empty-state-title">No Users Found</div>
                                    <p class="empty-state-text">No users matching your criteria.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if ($users->hasPages())
                <div class="card-footer">{{ $users->links() }}</div>
            @endif
        </div>
    </div>
</x-app-layout>
