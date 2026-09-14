<x-app-layout hris>
    <x-slot name="title">Payroll — {{ $period->name }}</x-slot>

    <div class="page-container space-y-6">
        {{-- Page Header --}}
        <div class="mb-8 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold text-slate-900">{{ $period->name }}</h1>
                <p class="mt-2 text-slate-600">{{ $period->start_date->format('M d, Y') }} – {{ $period->end_date->format('M d, Y') }}</p>
            </div>
            <div class="flex flex-wrap gap-2">
                <a href="{{ route('payroll.index') }}" class="btn btn-outline">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    BACK
                </a>
                <form method="POST" action="{{ route('payroll.regenerate', $period) }}">
                    @csrf
                    <button class="btn btn-outline">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                        Regenerate
                    </button>
                </form>
                <form method="POST" action="{{ route('payroll.destroy', $period) }}" onsubmit="return confirm('Delete this entire payroll period?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger">Delete Period</button>
                </form>
            </div>
        </div>

        {{-- Totals KPIs --}}
        <div class="grid grid-cols-2 md:grid-cols-5 gap-6">
            <div class="kpi-card">
                <p class="kpi-label">Gross</p>
                <p class="kpi-value text-slate-900">₱{{ number_format($totals['gross'], 2) }}</p>
            </div>
            <div class="kpi-card">
                <p class="kpi-label">Deductions</p>
                <p class="kpi-value text-red-600">₱{{ number_format($totals['deductions'], 2) }}</p>
            </div>
            <div class="kpi-card">
                <p class="kpi-label">Net</p>
                <p class="kpi-value text-green-600">₱{{ number_format($totals['net'], 2) }}</p>
            </div>
            <div class="kpi-card">
                <p class="kpi-label">Released</p>
                <p class="kpi-value text-indigo-600">{{ $totals['released'] }}</p>
            </div>
            <div class="kpi-card">
                <p class="kpi-label">On Hold</p>
                <p class="kpi-value text-red-600">{{ $totals['held'] }}</p>
            </div>
        </div>

        {{-- Filters --}}
        <div class="card">
            <div class="card-body">
                <form method="GET" class="flex flex-wrap gap-3 items-end">
                    @include('partials.employee-filters')
                    <div>
                        <label class="input-label">Status</label>
                        <select name="status" class="input">
                            <option value="">All Status</option>
                            @foreach (['draft','on_hold','ready','released'] as $s)<option value="{{ $s }}" @selected(request('status') == $s)>{{ ucwords(str_replace('_', ' ', $s)) }}</option>@endforeach
                        </select>
                    </div>
                    <div>
                        <label class="input-label">Search</label>
                        <input name="search" value="{{ request('search') }}" placeholder="Employee..." class="input w-48">
                    </div>
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
                            <th class="table-head-cell">Employee</th>
                            <th class="table-head-cell text-right">Gross</th>
                            <th class="table-head-cell text-right">Deductions</th>
                            <th class="table-head-cell text-right">Net Pay</th>
                            <th class="table-head-cell">Status</th>
                            <th class="table-head-cell">Clearance</th>
                            <th class="table-head-cell text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($payrolls as $p)
                        <tr class="table-body-row">
                            <td class="table-body-cell">
                                <a href="{{ route('payroll.line', $p) }}" class="font-medium text-indigo-600 hover:text-indigo-700">{{ $p->employee->full_name }}</a>
                                <p class="text-xs text-slate-400">{{ $p->employee->employee_id }} · {{ $p->employee->department?->name }} · {{ $p->employee->classification }}</p>
                            </td>
                            <td class="table-body-cell text-right font-medium text-slate-900">₱{{ number_format($p->gross_pay, 2) }}</td>
                            <td class="table-body-cell text-right text-red-600">₱{{ number_format($p->total_deductions, 2) }}</td>
                            <td class="table-body-cell text-right font-bold text-green-600">₱{{ number_format($p->net_pay, 2) }}</td>
                            <td class="table-body-cell">
                                <span class="badge
                                    {{ $p->status === 'released' ? 'badge-success' : '' }}
                                    {{ $p->status === 'on_hold' ? 'badge-danger' : '' }}
                                    {{ $p->status === 'ready' ? 'badge-info' : '' }}
                                    {{ $p->status === 'draft' ? 'badge-neutral' : '' }}">{{ $p->status_label }}</span>
                                @if ($p->hold_reason)<p class="text-[11px] text-red-500 mt-1">{{ $p->hold_reason }}</p>@endif
                            </td>
                            <td class="table-body-cell">
                                <span class="badge {{ $p->employee->clearance_status === 'Approved' ? 'badge-success' : 'badge-warning' }}">
                                    {{ $p->employee->clearance_status }}
                                </span>
                            </td>
                            <td class="table-body-cell text-right whitespace-nowrap">
                                <a href="{{ route('payroll.line', $p) }}" class="btn btn-secondary btn-sm">Details</a>
                                @if ($p->status === 'ready')
                                    <form method="POST" action="{{ route('payroll.release', $p) }}" class="inline ml-1" onsubmit="return confirm('Release salary + generate payslip/receipt?')">
                                        @csrf
                                        <button class="btn btn-success btn-sm">Release</button>
                                    </form>
                                @endif
                                @if ($p->payslip)
                                    <a href="{{ route('payslips.download', $p->payslip) }}" class="ml-1 text-indigo-600 text-xs font-medium">Payslip</a>
                                @endif
                                @if ($p->receipt)
                                    <a href="{{ route('receipts.print', $p->receipt) }}" class="ml-1 text-slate-600 text-xs font-medium">Receipt</a>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="table-body-cell">
                                <div class="empty-state py-12">
                                    <div class="empty-state-icon">💰</div>
                                    <div class="empty-state-title">No Payroll Lines</div>
                                    <p class="empty-state-text">No payroll lines found. Generate the period first.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if ($payrolls->hasPages())
                <div class="card-footer">{{ $payrolls->links() }}</div>
            @endif
        </div>
    </div>
</x-app-layout>
