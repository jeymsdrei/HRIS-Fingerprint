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
                <div class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
                        <div class="lg:col-span-2">
                            <label class="input-label">Search</label>
                            <input type="text" name="search" id="employee-search" value="{{ request('search') }}" placeholder="Search by name or employee ID..." class="input" autocomplete="off">
                        </div>
                        <div>
                            <label class="input-label">Department</label>
                            <select name="department_id" id="employee-department" class="input">
                                <option value="">All Departments</option>
                                @foreach ($departments ?? [] as $d)
                                    <option value="{{ $d->id }}">{{ $d->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="input-label">Employment Status</label>
                            <select name="employment_status" id="employee-employment-status" class="input">
                                <option value="">All</option>
                                <option value="permanent">Permanent</option>
                                <option value="contractual">Contractual</option>
                            </select>
                        </div>
                        <div>
                            <label class="input-label">Employee Type</label>
                            <select name="classification" id="employee-classification" class="input">
                                <option value="">All</option>
                                <option value="teaching">Teaching</option>
                                <option value="non_teaching">Non-Teaching</option>
                            </select>
                        </div>
                    </div>
                    <p id="employee-search-status" class="text-xs text-slate-500" aria-live="polite"></p>
                </div>
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
                        @forelse ($employees as $e)
                        <tr class="table-body-row employee-row" data-employee-id="{{ $e->id }}" data-employee-search="{{ strtolower($e->full_name.' '.$e->employee_id) }}" data-department-id="{{ $e->department_id }}" data-employment-status="{{ $e->employment_status }}" data-classification="{{ $e->classification }}">
                            <td class="table-body-cell">
                                <span class="font-mono text-xs font-semibold text-indigo-600">{{ $e->employee_id }}</span>
                            </td>
                            <td class="table-body-cell">
                                <div class="flex items-center gap-3">
                                        @if ($e->photo_path)
                                            <img src="{{ asset('storage/'.$e->photo_path) }}" alt="{{ $e->full_name }}" class="h-8 w-8 rounded-full object-cover cursor-pointer" data-avatar-preview>
                                        @else
                                            <div class="h-8 w-8 rounded-full bg-gradient-to-br from-indigo-600 to-indigo-700 text-white flex items-center justify-center text-xs font-bold">
                                                {{ mb_strtoupper(mb_substr($e->first_name, 0, 1) . mb_substr($e->last_name, 0, 1)) }}
                                            </div>
                                        @endif
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
                                <div class="flex justify-end gap-2 relative" x-data="{ open: false }" @click.outside="open = false">
                                    <a href="{{ route('employees.show', $e) }}" class="text-indigo-600 hover:text-indigo-700 text-xs font-medium">View</a>
                                    <button @click="open = !open" class="text-slate-400 hover:text-slate-600">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10.5 1.5H9.5A4.5 4.5 0 005 6v8a4.5 4.5 0 004.5 4.5h1a4.5 4.5 0 004.5-4.5V6a4.5 4.5 0 00-4.5-4.5z"></path>
                                        </svg>
                                    </button>
                                    <div x-show="open" x-cloak class="absolute right-0 mt-8 w-48 rounded-lg bg-white shadow-lg border border-slate-200 py-1">
                                        <a href="{{ route('employees.edit', $e) }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">Edit</a>
                                        <a href="{{ route('employees.show', $e) }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">Full Profile</a>
                                        <button type="button" data-permanent-delete-employee data-url="{{ route('employees.delete', $e) }}" class="block w-full px-4 py-2 text-left text-sm text-red-700 hover:bg-red-50 font-medium">Delete Permanently</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
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
                        @if ($employees->count())
                            <tr id="employee-filter-empty" hidden>
                                <td colspan="8" class="table-body-cell">
                                    <div class="empty-state py-12">
                                        <div class="empty-state-title">No Matching Employees</div>
                                        <p class="empty-state-text">Try changing the search, department, or employment status.</p>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    const employeeSearch = document.getElementById('employee-search');
    const employeeDepartment = document.getElementById('employee-department');
    const employeeEmploymentStatus = document.getElementById('employee-employment-status');
    const employeeClassification = document.getElementById('employee-classification');
    const employeeRows = document.querySelectorAll('.employee-row');
    const employeeSearchStatus = document.getElementById('employee-search-status');
    const employeeFilterEmpty = document.getElementById('employee-filter-empty');

    let lastScrollY = window.scrollY;

    function employeeMatches(employeeSearchText, term) {
        const nameWords = employeeSearchText.trim().split(/\s+/);
        const termWords = term.trim().split(/\s+/);

        if (termWords.length === 1) {
            return employeeSearchText.indexOf(termWords[0]) === 0
                || nameWords.some((word) => word.indexOf(termWords[0]) === 0);
        }

        let wordIndex = 0;
        return termWords.every((termWord) => {
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

    function filterEmployeeRows() {
        if (!employeeSearch) return;

        const searchTerm = employeeSearch.value.trim().toLowerCase();
        const departmentId = employeeDepartment.value;
        const employmentStatus = employeeEmploymentStatus.value;
        const classification = employeeClassification.value;
        let visibleCount = 0;

        employeeRows.forEach((row) => {
            const matchesSearch = searchTerm === '' || employeeMatches(row.dataset.employeeSearch || '', searchTerm);
            const matchesDepartment = departmentId === '' || row.dataset.departmentId === departmentId;
            const matchesEmploymentStatus = employmentStatus === '' || row.dataset.employmentStatus === employmentStatus;
            const matchesClassification = classification === '' || row.dataset.classification === classification;
            const isMatch = matchesSearch && matchesDepartment && matchesEmploymentStatus && matchesClassification;
            row.hidden = !isMatch;
            row.style.display = isMatch ? '' : 'none';
            if (isMatch) visibleCount++;
        });

        const hasFilters = searchTerm !== '' || departmentId !== '' || employmentStatus !== '' || classification !== '';
        employeeSearchStatus.textContent = hasFilters
            ? `${visibleCount} employee${visibleCount === 1 ? '' : 's'} shown below`
            : '';
        if (employeeFilterEmpty) employeeFilterEmpty.hidden = !hasFilters || visibleCount > 0;
    }

    const handleFilterChange = function() {
        lastScrollY = window.scrollY;
        filterEmployeeRows();
        window.scrollTo(0, lastScrollY);
    };

    employeeSearch?.addEventListener('input', handleFilterChange);

    employeeDepartment?.addEventListener('change', handleFilterChange);

    employeeEmploymentStatus?.addEventListener('change', handleFilterChange);

    employeeClassification?.addEventListener('change', handleFilterChange);

    filterEmployeeRows();
</script>