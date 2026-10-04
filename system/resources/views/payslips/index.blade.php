<x-app-layout hris>
    <x-slot name="title">Payslips</x-slot>

    <div class="page-container space-y-6">
        {{-- Page Header --}}
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-900">Payslips</h1>
            <p class="mt-2 text-slate-600">Generated payslips for released salaries</p>
        </div>

        {{-- Filters --}}
        <div class="card">
            <div class="card-body px-4 py-3">
                <form method="GET" class="grid w-full min-w-0 grid-cols-1 gap-2 items-end sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-[1.3fr_1.25fr_1.4fr_1.1fr_1fr_1fr_auto]">
                    <div class="w-full min-w-0">
                        <label class="input-label" for="payslip-search">Search employee name or ID</label>
                        <input id="payslip-search" name="search" value="{{ request('search') }}" placeholder="Employee..." class="input w-full min-w-0" autocomplete="off">
                    </div>
                    @include('partials.employee-filters')
                    <div class="w-full min-w-0">
                        <label class="input-label" for="payslip-period">Period</label>
                        <select id="payslip-period" name="payroll_period_id" class="input w-full min-w-0">
                            <option value="">All Periods</option>
                            @foreach (App\Models\PayrollPeriod::orderByDesc('end_date')->get() as $pp)
                                <option value="{{ $pp->id }}" @selected(request('payroll_period_id') == $pp->id)>{{ $pp->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-primary w-full sm:w-auto">Filter</button>
                </form>
            </div>
        </div>

        {{-- Table --}}
        <div class="card">
            <div class="table-container">
                <table class="data-table">
                    <thead class="table-head">
                        <tr>
                            <th class="table-head-cell">Payslip No.</th>
                            <th class="table-head-cell">Employee</th>
                            <th class="table-head-cell">Period</th>
                            <th class="table-head-cell text-right">Net Pay</th>
                            <th class="table-head-cell">Generated</th>
                            <th class="table-head-cell text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($payslips as $ps)
                        <tr class="table-body-row">
                            <td class="table-body-cell font-mono text-xs text-slate-500">{{ $ps->payslip_no }}</td>
                            <td class="table-body-cell">
                                <a href="{{ route('payslips.show', $ps) }}" class="font-medium text-indigo-600 hover:text-indigo-700">{{ $ps->employee->full_name }}</a>
                                <p class="text-xs text-slate-400">{{ $ps->employee->employee_id }}</p>
                            </td>
                            <td class="table-body-cell">{{ $ps->payroll->period->name }}</td>
                            <td class="table-body-cell text-right font-bold text-green-600">₱{{ number_format($ps->payroll->net_pay, 2) }}</td>
                            <td class="table-body-cell text-slate-500">{{ $ps->generated_at?->format('M d, Y h:i A') }}</td>
<td class="table-body-cell text-right space-x-2">
<a href="{{ route('payslips.show', $ps) }}" onclick="window.__autoPrint = true;" class="btn btn-outline btn-sm">Print</a>
<a href="{{ route('payslips.show', $ps) }}" class="btn btn-secondary btn-sm">View</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="table-body-cell">
                                <div class="empty-state py-12">
                                    <div class="empty-state-icon">📄</div>
                                    <div class="empty-state-title">No Payslips</div>
                                    <p class="empty-state-text">Payslips are created on salary release.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if ($payslips->hasPages())
                <div class="card-footer">{{ $payslips->links() }}</div>
            @endif
        </div>
    </div>
</x-app-layout>
