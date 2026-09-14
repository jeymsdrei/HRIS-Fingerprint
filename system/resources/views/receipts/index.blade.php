<x-app-layout hris>
    <x-slot name="title">Payroll Receipts</x-slot>

    <div class="page-container space-y-6">
        {{-- Page Header --}}
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-900">Payroll Receipts</h1>
            <p class="mt-2 text-slate-600">Signed payroll receipts for released salaries</p>
        </div>

        {{-- Filters --}}
        <div class="card">
            <div class="card-body">
                <form method="GET" class="flex flex-wrap gap-3 items-end">
                    <div>
                        <label class="input-label">Search</label>
                        <input name="search" value="{{ request('search') }}" placeholder="Employee..." class="input w-56">
                    </div>
                    @include('partials.employee-filters')
                    <button class="btn btn-primary">Filter</button>
                </form>
            </div>
        </div>

        {{-- Table --}}
        <div class="card">
            <div class="table-container">
                <table class="data-table">
                    <thead class="table-head">
                        <tr>
                            <th class="table-head-cell">Receipt No.</th>
                            <th class="table-head-cell">Employee</th>
                            <th class="table-head-cell">Period</th>
                            <th class="table-head-cell text-right">Amount</th>
                            <th class="table-head-cell">Method</th>
                            <th class="table-head-cell">Signatures</th>
                            <th class="table-head-cell">Status</th>
                            <th class="table-head-cell text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($receipts as $r)
                        <tr class="table-body-row">
                            <td class="table-body-cell font-mono text-xs text-slate-500">{{ $r->receipt_no }}</td>
                            <td class="table-body-cell">
                                <span class="font-medium text-slate-900">{{ $r->employee->full_name }}</span>
                                <p class="text-xs text-slate-400">{{ $r->employee->employee_id }} · {{ $r->employee->department?->name }}</p>
                            </td>
                            <td class="table-body-cell">{{ $r->payroll->period->name }}</td>
                            <td class="table-body-cell text-right font-bold text-green-600">₱{{ number_format($r->amount_received, 2) }}</td>
                            <td class="table-body-cell">{{ ucwords(str_replace('_', ' ', $r->payment_method)) }}</td>
                            <td class="table-body-cell text-xs">
                                <span class="{{ $r->employee_signature ? 'text-green-600' : 'text-slate-300' }}">Emp: {{ $r->employee_signature ? '✓' : '—' }}</span>
                                <span class="ml-2 {{ $r->hr_signature ? 'text-green-600' : 'text-slate-300' }}">HR: {{ $r->hr_signature ? '✓' : '—' }}</span>
                            </td>
                            <td class="table-body-cell">
                                <span class="badge {{ $r->signed_at ? 'badge-success' : 'badge-warning' }}">
                                    {{ $r->signed_at ? 'Signed' : 'Awaiting signature' }}
                                </span>
                            </td>
                            <td class="table-body-cell text-right">
                                <a href="{{ route('receipts.print', $r) }}" class="btn btn-outline btn-sm">PDF</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="table-body-cell">
                                <div class="empty-state py-12">
                                    <div class="empty-state-icon">🧾</div>
                                    <div class="empty-state-title">No Receipts</div>
                                    <p class="empty-state-text">Receipts are generated on salary release.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if ($receipts->hasPages())
                <div class="card-footer">{{ $receipts->links() }}</div>
            @endif
        </div>
    </div>
</x-app-layout>
