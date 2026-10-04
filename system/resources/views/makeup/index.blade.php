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
                    @php
                        $teachingEmployees = $employees->where('classification', 'teaching')->values();
                    @endphp
                    <x-typeahead
                        name="employee_id"
                        label="Employee"
                        placeholder="Type a name or ID…"
                        required
                        :value="old('employee_id', '')"
                        :items="$teachingEmployees->map(fn ($e) => [
                            'id' => $e->id,
                            'text' => $e->employee_id.' — '.$e->full_name,
                            'label' => $e->full_name,
                            'meta' => $e->employee_id,
                        ])->values()" />
                    <x-typeahead
                        name="subject_id"
                        label="Subject"
                        placeholder="Type a code or name…"
                        :value="old('subject_id', '')"
                        :items="$subjects->map(fn ($s) => [
                            'id' => $s->id,
                            'text' => $s->code.' — '.$s->name,
                            'label' => $s->name,
                            'meta' => $s->code,
                        ])->values()" />
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
                        <label class="input-label">Reason</label>
                        <div class="flex gap-2">
                            <input name="reason" placeholder="e.g. Replacement class for holiday" class="input flex-1">
                            <button class="btn btn-primary whitespace-nowrap">Record (Pending)</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- List --}}
        <div class="card">
            <div class="card-header p-3">
                <div class="flex flex-wrap gap-2 items-center justify-between">
                    <h2 class="font-semibold text-slate-900">Make-Up Class Records</h2>
                    <form method="GET" class="grid w-full min-w-0 grid-cols-1 gap-2 items-end sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-[1.25fr_1.4fr_1.1fr_1fr_0.9fr_0.9fr_auto]">
                        @include('partials.employee-filters')
                        <div class="w-full min-w-0">
                            <label class="input-label" for="makeup-approval-status">Approval Status</label>
                            <select id="makeup-approval-status" name="approval_status" class="input w-full min-w-0">
                                <option value="">All Status</option>
                                @foreach (['pending','approved','rejected'] as $s)<option value="{{ $s }}" @selected(request('approval_status') == $s)>{{ $s === 'rejected' ? 'Denied' : ucfirst($s) }}</option>@endforeach
                            </select>
                        </div>
                        <div class="w-full min-w-0">
                            <label class="input-label" for="makeup-from">From</label>
                            <input id="makeup-from" type="date" name="from" value="{{ request('from') }}" class="input w-full min-w-0">
                        </div>
                        <div class="w-full min-w-0">
                            <label class="input-label" for="makeup-to">To</label>
                            <input id="makeup-to" type="date" name="to" value="{{ request('to') }}" class="input w-full min-w-0">
                        </div>
                        <button class="btn btn-primary w-full sm:w-auto">Filter</button>
                    </form>
                </div>
            </div>
            <div class="table-container">
                <table class="data-table">
                    <thead class="table-head">
                        <tr>
                            <th class="table-head-cell">Employee</th>
                            <th class="table-head-cell">Subject</th>
                            <th class="table-head-cell">Reason</th>
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
                            <td class="table-body-cell">{{ $m->reason ?: '—' }}@if ($m->remarks)<p class="mt-1 text-xs text-slate-500">Reviewer: {{ $m->remarks }}</p>@endif</td>
                            <td class="table-body-cell">{{ $m->class_date->format('M d, Y') }}</td>
                            <td class="table-body-cell text-slate-500">{{ $m->start_time->format('h:i A') }} – {{ $m->end_time->format('h:i A') }}</td>
                            <td class="table-body-cell">{{ $m->hours_rendered }}h</td>
                            <td class="table-body-cell">₱{{ number_format($m->hourly_rate, 2) }}</td>
                            <td class="table-body-cell font-medium text-emerald-600">₱{{ number_format($m->additional_pay, 2) }}</td>
                            <td class="table-body-cell">
                                <span class="badge
                                    {{ $m->approval_status === 'approved' ? 'badge-success' : '' }}
                                    {{ $m->approval_status === 'pending' ? 'badge-warning' : '' }}
                                    {{ $m->approval_status === 'rejected' ? 'badge-danger' : '' }}">{{ $m->status_label }}</span>
                            </td>
                            <td class="table-body-cell text-right">
                                @if ($m->approval_status === 'pending')
                                    <div class="flex flex-col gap-1 items-end">
                                        <form method="POST" action="{{ route('makeup.approve', $m) }}" class="w-full">
                                            @csrf
                                            <button class="btn btn-success btn-sm w-full">Approve</button>
                                        </form>
                                        <form method="POST" action="{{ route('makeup.reject', $m) }}" class="w-full">
                                            @csrf
                                            <button class="btn btn-danger btn-sm w-full" onclick="return confirm('Deny this request?')">Deny</button>
                                        </form>
                                    </div>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10" class="table-body-cell">
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
