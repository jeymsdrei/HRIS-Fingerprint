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

        {{-- Filters: no submit button and no request. Filtering runs in the browser on every
     keystroke, so the whole user set is rendered by the controller. The active values
     are mirrored into the query string so reload and browser Back still restore them. --}}
        <div class="card">
            <div class="card-body">
                <div class="grid grid-cols-1 gap-3 items-end sm:grid-cols-[minmax(0,1fr)_minmax(0,14rem)]">
                    <div class="min-w-0">
                        <label class="input-label" for="users-search">Search</label>
                        <input id="users-search" name="search" value="{{ request('search') }}"
                               placeholder="Search name, username, or employee…"
                               class="input w-full"
                               autocomplete="off">
                    </div>
                    <div class="min-w-0">
                        <label class="input-label" for="users-role">Role</label>
                        <select id="users-role" name="role" class="input w-full">
                            <option value="">All Roles</option>
                            @foreach (collect(App\Models\User::ROLES)->reject(fn ($r) => $r === 'employee') as $r)<option value="{{ $r }}" @selected(request('role') == $r)>{{ ucwords(str_replace('_', ' ', $r)) }}</option>@endforeach
                        </select>
                    </div>
                </div>
                <p id="users-search-status" class="mt-2 text-xs text-slate-500" aria-live="polite"></p>
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
                        <tr class="table-body-row user-row"
                            data-user-search="{{ strtolower(trim($u->name.' '.$u->username.' '.($u->employee?->employee_id ?? '').' '.($u->employee?->full_name ?? ''))) }}"
                            data-role="{{ $u->role }}">
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
                                @if ($u->id !== auth()->id())
                                <form method="POST" action="{{ route('users.destroy', $u) }}" class="inline" data-confirm="{{ $u->is_active ? 'Deactivate this user? Their records are preserved.' : 'Reactivate this user?' }}">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm {{ $u->is_active ? 'btn-danger' : 'btn-success' }}">{{ $u->is_active ? 'Deactivate' : 'Reactivate' }}</button>
                                </form>
                                @endif
                            </td>
                        </tr>
@empty
                        <tr id="users-empty">
                            <td colspan="6" class="table-body-cell">
                                <div class="empty-state">
                                    <div class="empty-state-icon">👤</div>
                                    <div class="empty-state-title">No Users Found</div>
                                    <p class="empty-state-text">There are no system users yet.</p>
                                </div>
                            </td>
                        </tr>
@endforelse
                        {{-- Shown only when a filter hides every row. --}}
                        <tr id="users-no-results" hidden>
                            <td colspan="6" class="table-body-cell">
                                <div class="empty-state">
                                    <div class="empty-state-icon">🔍</div>
                                    <div class="empty-state-title">No Matching Users</div>
                                    <p class="empty-state-text">No users match your search or role filter.</p>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        // IIFE-wrapped so nothing is declared in the global scope: content scripts are
        // re-run on every SPA swap, and a top-level const would then be a redeclaration.
        (function () {
            const search = document.getElementById('users-search');
            const role = document.getElementById('users-role');
            const status = document.getElementById('users-search-status');
            const noResults = document.getElementById('users-no-results');
            const emptyState = document.getElementById('users-empty');

            if (!search || !role) return;

            const rows = Array.prototype.slice.call(document.querySelectorAll('.user-row'));

            // Sequenced prefix matching, the same rule the attendance and employee
            // tables use: type letter by letter from the start of any part of the name.
            function matches(haystack, term) {
                const nameWords = haystack.trim().split(/\s+/);
                const termWords = term.trim().split(/\s+/);

                if (termWords.length === 1) {
                    return nameWords.some(function (word) {
                        return word.indexOf(termWords[0]) === 0;
                    });
                }

                let wordIndex = 0;

                return termWords.every(function (termWord) {
                    while (wordIndex < nameWords.length) {
                        if (nameWords[wordIndex].indexOf(termWord) === 0) {
                            wordIndex++;
                            return true;
                        }
                        wordIndex++;
                    }
                    return false;
                });
            }

            function apply() {
                const term = search.value.trim().toLowerCase();
                const wantedRole = role.value;
                let visible = 0;

                rows.forEach(function (row) {
                    const haystack = row.dataset.userSearch || '';
                    const okSearch = term === '' || matches(haystack, term);
                    const okRole = wantedRole === '' || row.dataset.role === wantedRole;
                    const isMatch = okSearch && okRole;

                    row.hidden = !isMatch;
                    row.style.display = isMatch ? '' : 'none';
                    if (isMatch) visible++;
                });

                const hasFilters = term !== '' || wantedRole !== '';

                if (emptyState) emptyState.hidden = visible > 0 || hasFilters;
                if (noResults) noResults.hidden = !(hasFilters && visible === 0);

                if (status) {
                    status.textContent = hasFilters
                        ? visible + ' user' + (visible === 1 ? '' : 's') + ' shown below'
                        : '';
                }

                // Mirror the filter into the URL so reload and Back restore it, without
                // issuing a request. replaceState avoids stacking history entries.
                const url = new URL(window.location.href);

                if (term) {
                    url.searchParams.set('search', search.value.trim());
                } else {
                    url.searchParams.delete('search');
                }

                if (wantedRole) {
                    url.searchParams.set('role', wantedRole);
                } else {
                    url.searchParams.delete('role');
                }

                url.searchParams.delete('page');
                window.history.replaceState({}, '', url);
            }

            search.addEventListener('input', apply);
            role.addEventListener('change', apply);
            apply();
        })();
    </script>
</x-app-layout>
