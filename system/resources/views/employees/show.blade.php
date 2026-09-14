<x-app-layout hris>
    <x-slot name="title">Employee Profile — {{ $employee->full_name }}</x-slot>

    <div class="page-container">
        {{-- Page Header --}}
        <div class="mb-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div class="flex items-center gap-4">
                    <div class="h-16 w-16 rounded-2xl bg-gradient-to-br from-indigo-600 to-indigo-700 text-white flex items-center justify-center text-xl font-bold shadow-lg">
                        {{ mb_strtoupper(mb_substr($employee->first_name, 0, 1) . mb_substr($employee->last_name, 0, 1)) }}
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-slate-900">{{ $employee->full_name }}</h1>
                        <p class="text-sm text-slate-500 mt-1">{{ $employee->employee_id }} · {{ $employee->position?->name }} · {{ $employee->department?->name }}{{ $employee->course ? ' · '.$employee->course->code : '' }}</p>
                    </div>
                </div>
                <div class="flex gap-2">
                    <a href="{{ route('employees.edit', $employee) }}" class="btn btn-primary btn-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Edit
                    </a>
                    @if ($employee->is_active)
                    <form method="POST" action="{{ route('employees.destroy', $employee) }}" onsubmit="return confirm('Deactivate {{ $employee->full_name }}?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">Deactivate</button>
                    </form>
                    @else
                    <form method="POST" action="{{ route('employees.reactivate', $employee) }}">
                        @csrf
                        <button class="btn btn-success btn-sm">Reactivate</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>

        {{-- Profile summary cards --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-8">
            <div class="kpi-card">
                <p class="kpi-label uppercase">Classification</p>
                <p class="font-semibold text-slate-900 mt-2">{{ ucwords(str_replace('_', ' ', $employee->classification)) }}</p>
                <p class="kpi-subtitle">{{ ucfirst($employee->employment_status) }} · {{ ucfirst($employee->salary_type) }}</p>
            </div>
            <div class="kpi-card">
                <p class="kpi-label uppercase">Compensation</p>
                <p class="font-semibold text-slate-900 mt-2">₱{{ number_format($employee->monthly_salary, 2) }}/mo</p>
                <p class="kpi-subtitle">₱{{ number_format($employee->hourly_rate, 2) }}/hr · Load: {{ $employee->teaching_load }}h</p>
            </div>
            <div class="kpi-card">
                <p class="kpi-label uppercase">Fingerprint</p>
                <p class="font-semibold text-slate-900 mt-2">{{ $employee->fingerprint_id ? 'ZK ID: '.$employee->fingerprint_id : 'Not enrolled' }}</p>
                <p class="kpi-subtitle">{{ $employee->fingerprint_template ? 'Template on file' : 'No template' }}</p>
            </div>
            <div class="kpi-card">
                <p class="kpi-label uppercase">Hired</p>
                <p class="font-semibold text-slate-900 mt-2">{{ $employee->date_hired?->format('M d, Y') ?? '—' }}</p>
                <p class="kpi-subtitle">Pay: {{ ucwords(str_replace('_', ' ', $employee->payment_method ?? 'cash')) }}</p>
            </div>
        </div>

        {{-- Clearance status --}}
        <div class="card mb-8">
            <div class="card-header flex items-center justify-between">
                <h2 class="font-semibold text-slate-900">Clearance Status</h2>
                <span class="badge {{ $employee->hasCompleteClearance() ? 'badge-success' : 'badge-danger' }}">{{ $employee->hasCompleteClearance() ? 'Complete' : 'Incomplete' }}</span>
            </div>
            <div class="card-body space-y-2">
                @forelse ($employee->clearances as $c)
                    <div class="flex items-center justify-between border-b border-slate-100 pb-2">
                        <span class="text-sm text-slate-700">{{ $c->clearance->name }}</span>
                        <span class="badge {{ $c->status === 'cleared' ? 'badge-success' : 'badge-neutral' }}">{{ ucfirst($c->status) }}</span>
                    </div>
                @empty
                    <p class="text-sm text-slate-400">No clearance record yet.</p>
                @endforelse
            </div>
        </div>

        {{-- Schedules --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="font-semibold text-slate-900">Teaching Schedule</h2>
                </div>
                <div class="card-body space-y-2">
                    @forelse ($employee->teachingSchedules as $s)
                        <div class="flex justify-between text-sm border-b border-slate-100 py-2">
                            <span class="text-slate-700">{{ $s->day_name }} · {{ $s->subject?->name }}</span>
                            <span class="text-slate-500">{{ $s->start_time->format('h:i A') }} – {{ $s->end_time->format('h:i A') }} · Room {{ $s->room?->name }}</span>
                        </div>
                    @empty
                        <p class="text-sm text-slate-400">No teaching schedules.</p>
                    @endforelse
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h2 class="font-semibold text-slate-900">Work Schedule ({{ $employee->isTeaching ? 'N/A — Teaching' : 'Fixed' }})</h2>
                </div>
                <div class="card-body space-y-2">
                    @forelse ($employee->workSchedules as $s)
                        <div class="flex justify-between text-sm border-b border-slate-100 py-2">
                            <span class="text-slate-700">{{ $s->day_name }}</span>
                            <span class="text-slate-500">{{ $s->start_time->format('h:i A') }} – {{ $s->end_time->format('h:i A') }}</span>
                        </div>
                    @empty
                        <p class="text-sm text-slate-400">No work schedules defined.</p>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- Approved make-up classes --}}
        <div class="card mb-8">
            <div class="card-header flex items-center justify-between">
                <h2 class="font-semibold text-slate-900">Approved Make-Up Classes</h2>
                <span class="badge badge-success">{{ $employee->makeUpClasses->count() }} approved</span>
            </div>
            <div class="table-container">
                <table class="data-table">
                    <thead class="table-head">
                        <tr>
                            <th class="table-head-cell">Date</th>
                            <th class="table-head-cell">Subject</th>
                            <th class="table-head-cell">Time</th>
                            <th class="table-head-cell">Hours</th>
                            <th class="table-head-cell">Additional Pay</th>
                            <th class="table-head-cell">Approved</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($employee->makeUpClasses as $makeUpClass)
                            <tr class="table-body-row">
                                <td class="table-body-cell">{{ $makeUpClass->class_date->format('M d, Y') }}</td>
                                <td class="table-body-cell">{{ $makeUpClass->subject?->name ?? '—' }}</td>
                                <td class="table-body-cell text-slate-500">{{ $makeUpClass->start_time->format('h:i A') }} – {{ $makeUpClass->end_time->format('h:i A') }}</td>
                                <td class="table-body-cell">{{ $makeUpClass->hours_rendered }}h</td>
                                <td class="table-body-cell font-medium text-emerald-600">₱{{ number_format($makeUpClass->additional_pay, 2) }}</td>
                                <td class="table-body-cell text-slate-500">{{ $makeUpClass->approved_at?->format('M d, Y') ?? '—' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="table-body-cell">
                                    <p class="text-sm text-slate-400">No approved make-up classes.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Loans & Benefits --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="font-semibold text-slate-900">Loans <span class="text-xs font-normal text-slate-500">({{ $employee->loans->sum('balance') ? '₱'.number_format($employee->loans->sum('balance'), 2).' balance' : 'None' }})</span></h2>
                </div>
                <div class="card-body space-y-2">
                    @forelse ($employee->loans as $loan)
                        <div class="flex justify-between text-sm border-b border-slate-100 py-2">
                            <span class="text-slate-700">{{ ucwords(str_replace('_', ' ', $loan->loan_type)) }} · ₱{{ number_format($loan->amount, 2) }}</span>
                            <span class="text-slate-500">Balance: ₱{{ number_format($loan->balance, 2) }} · <span class="badge {{ $loan->status === 'active' ? 'badge-warning' : 'badge-success' }}">{{ $loan->status }}</span></span>
                        </div>
                    @empty
                        <p class="text-sm text-slate-400">No loans.</p>
                    @endforelse
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h2 class="font-semibold text-slate-900">Benefits</h2>
                </div>
                <div class="card-body space-y-2">
                    @forelse ($employee->benefits as $b)
                        <div class="flex justify-between text-sm border-b border-slate-100 py-2">
                            <span class="text-slate-700">{{ $b->benefit->name }}</span>
                            <span class="text-slate-500">₱{{ number_format($b->effective_amount, 2) }}<span class="text-xs"> ({{ $b->benefit->frequency }})</span></span>
                        </div>
                    @empty
                        <p class="text-sm text-slate-400">No benefits assigned.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
