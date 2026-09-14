<x-app-layout hris>
    <x-slot name="title">Make-Up Classes</x-slot>

    <div class="page-container space-y-6">
        {{-- Page Header --}}
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-900">Make-Up Classes</h1>
            <p class="mt-2 text-slate-600">Record and approve make-up classes for additional compensation</p>
        </div>

        {{-- Create --}}
        <div class="card">
            <div class="card-header">
                <h2 class="font-semibold text-slate-900">Record Make-Up Class</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('makeup.store') }}" class="grid grid-cols-2 md:grid-cols-6 gap-4 items-end">
                    @csrf
                    <div>
                        <label class="input-label">Employee</label>
                        <select name="employee_id" class="input">
                            @foreach ($employees->where('classification', 'teaching') as $e)
                                <option value="{{ $e->id }}">{{ $e->employee_id }} — {{ $e->full_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="input-label">Subject</label>
                        <select name="subject_id" class="input">
                            <option value="">—</option>
                            @foreach ($subjects as $s)<option value="{{ $s->id }}">{{ $s->code }} — {{ $s->name }}</option>@endforeach
                        </select>
                    </div>
                    <div>
                        <label class="input-label">Date</label>
                        <input type="date" name="class_date" class="input" required>
                    </div>
                    <div>
                        <label class="input-label">Start</label>
                        <input type="time" name="start_time" class="input" required>
                    </div>
                    <div>
                        <label class="input-label">End</label>
                        <input type="time" name="end_time" class="input" required>
                    </div>
                    <div>
                        <label class="input-label">Hourly Rate</label>
                        <input type="number" step="0.01" name="hourly_rate" class="input" placeholder="Blank = emp. rate">
                    </div>
                    <div class="col-span-2 md:col-span-6">
                        <label class="input-label">Remarks</label>
                        <div class="flex gap-2">
                            <input name="remarks" placeholder="e.g. Replacement class for holiday" class="input flex-1">
                            <button class="btn btn-primary whitespace-nowrap">Record (Pending)</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- List --}}
        <div class="card">
            <div class="card-header">
                <div class="flex flex-wrap gap-3 items-center justify-between">
                    <h2 class="font-semibold text-slate-900">Make-Up Class Records</h2>
                    <form method="GET" class="flex flex-wrap gap-2">
                        @include('partials.employee-filters')
                        <select name="approval_status" class="input">
                            <option value="">All Status</option>
                            @foreach (['pending','approved','rejected'] as $s)<option value="{{ $s }}" @selected(request('approval_status') == $s)>{{ ucfirst($s) }}</option>@endforeach
                        </select>
                        <input type="date" name="from" value="{{ request('from') }}" class="input">
                        <input type="date" name="to" value="{{ request('to') }}" class="input">
                        <button class="btn btn-primary btn-sm">Filter</button>
                    </form>
                </div>
            </div>
            <div class="table-container">
                <table class="data-table">
                    <thead class="table-head">
                        <tr>
                            <th class="table-head-cell">Employee</th>
                            <th class="table-head-cell">Subject</th>
                            <th class="table-head-cell">Date</th>
                            <th class="table-head-cell">Time</th>
                            <th class="table-head-cell">Hours</th>
                            <th class="table-head-cell">Rate</th>
                            <th class="table-head-cell">Additional Pay</th>
                            <th class="table-head-cell">Status</th>
                            <th class="table-head-cell text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($makeUps as $m)
                        <tr class="table-body-row">
                            <td class="table-body-cell font-medium text-slate-900">{{ $m->employee->full_name }}</td>
                            <td class="table-body-cell">{{ $m->subject?->name ?? '—' }}</td>
                            <td class="table-body-cell">{{ $m->class_date->format('M d, Y') }}</td>
                            <td class="table-body-cell text-slate-500">{{ $m->start_time->format('h:i A') }} – {{ $m->end_time->format('h:i A') }}</td>
                            <td class="table-body-cell">{{ $m->hours_rendered }}h</td>
                            <td class="table-body-cell">₱{{ number_format($m->hourly_rate, 2) }}</td>
                            <td class="table-body-cell font-medium text-emerald-600">₱{{ number_format($m->additional_pay, 2) }}</td>
                            <td class="table-body-cell">
                                <span class="badge
                                    {{ $m->approval_status === 'approved' ? 'badge-success' : '' }}
                                    {{ $m->approval_status === 'pending' ? 'badge-warning' : '' }}
                                    {{ $m->approval_status === 'rejected' ? 'badge-danger' : '' }}">{{ ucfirst($m->approval_status) }}</span>
                            </td>
                            <td class="table-body-cell text-right whitespace-nowrap">
                                @if ($m->approval_status === 'pending')
                                    <form method="POST" action="{{ route('makeup.approve', $m) }}" class="inline">
                                        @csrf
                                        <button class="btn btn-success btn-sm">Approve</button>
                                    </form>
                                    <form method="POST" action="{{ route('makeup.reject', $m) }}" class="inline">
                                        @csrf
                                        <button class="btn btn-danger btn-sm ml-1" onclick="return confirm('Reject?')">Reject</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="table-body-cell">
                                <div class="empty-state py-12">
                                    <div class="empty-state-icon">📚</div>
                                    <div class="empty-state-title">No Make-Up Classes</div>
                                    <p class="empty-state-text">No make-up class records found.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if ($makeUps->hasPages())
                <div class="card-footer">{{ $makeUps->links() }}</div>
            @endif
        </div>
    </div>
</x-app-layout>
