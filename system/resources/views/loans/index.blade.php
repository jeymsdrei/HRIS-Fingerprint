<x-app-layout hris>
    <x-slot name="title">Loans & Cash Advances</x-slot>

    <div class="page-container space-y-6">
        {{-- Page Header --}}
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-900">Loans & Cash Advances</h1>
            <p class="mt-2 text-slate-600">Manage employee loans and cash advances</p>
        </div>

        {{-- Create --}}
        <div class="card">
            <div class="card-header">
                <h2 class="font-semibold text-slate-900">Record Loan / Cash Advance</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('loans.store') }}" class="grid grid-cols-2 md:grid-cols-5 gap-3 items-end">
                    @csrf
                    <div>
                        <label class="input-label">Employee</label>
                        <select name="employee_id" class="input" required>
                            @foreach (App\Models\Employee::where('is_active', true)->orderBy('last_name')->get() as $e)
                                <option value="{{ $e->id }}">{{ $e->employee_id }} — {{ $e->full_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="input-label">Type</label>
                        <select name="loan_type" class="input" required>
                            <option value="sss">SSS Loan</option>
                            <option value="pagibig">Pag-IBIG Loan</option>
                            <option value="company">Company Loan</option>
                            <option value="cash_advance">Cash Advance</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div>
                        <label class="input-label">Amount</label>
                        <input type="number" step="0.01" name="amount" placeholder="Amount" class="input" required>
                    </div>
                    <div>
                        <label class="input-label">Monthly Amortization</label>
                        <input type="number" step="0.01" name="monthly_amortization" placeholder="Monthly" class="input" required>
                    </div>
                    <div>
                        <label class="input-label">Start Date</label>
                        <input type="date" name="start_date" value="{{ now()->format('Y-m-d') }}" class="input" required>
                    </div>
                    <div>
                        <label class="input-label">Reference No.</label>
                        <input name="reference_no" placeholder="Optional" class="input">
                    </div>
                    <div>
                        <label class="input-label">Interest Rate %</label>
                        <input type="number" step="0.01" name="interest_rate" placeholder="Optional" class="input">
                    </div>
                    <button class="btn btn-primary">Record Loan</button>
                </form>
            </div>
        </div>

        {{-- Filters --}}
        <div class="card">
            <div class="card-body">
                <form method="GET" class="flex flex-wrap gap-3 items-end">
                    @include('partials.employee-filters')
                    <div>
                        <label class="input-label">Type</label>
                        <select name="loan_type" class="input">
                            <option value="">All Types</option>
                            @foreach (['sss','pagibig','company','cash_advance','other'] as $t)
                                <option value="{{ $t }}" @selected(request('loan_type') == $t)>{{ ucwords(str_replace('_', ' ', $t)) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="input-label">Status</label>
                        <select name="status" class="input">
                            <option value="">All Status</option>
                            @foreach (['active','paid','closed'] as $s)<option value="{{ $s }}" @selected(request('status') == $s)>{{ ucfirst($s) }}</option>@endforeach
                        </select>
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
                            <th class="table-head-cell">Type</th>
                            <th class="table-head-cell text-right">Amount</th>
                            <th class="table-head-cell text-right">Amortization</th>
                            <th class="table-head-cell text-right">Balance</th>
                            <th class="table-head-cell">Status</th>
                            <th class="table-head-cell text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($loans as $l)
                        <tr class="table-body-row">
                            <td class="table-body-cell">
                                <span class="font-medium text-slate-900">{{ $l->employee->full_name }}</span>
                                <p class="text-xs text-slate-400">{{ $l->employee->employee_id }} · {{ $l->reference_no }}</p>
                            </td>
                            <td class="table-body-cell">
                                <span class="badge {{ $l->loan_type === 'cash_advance' ? 'badge-warning' : 'badge-info' }}">{{ ucwords(str_replace('_', ' ', $l->loan_type)) }}</span>
                            </td>
                            <td class="table-body-cell text-right">₱{{ number_format($l->amount, 2) }}</td>
                            <td class="table-body-cell text-right">₱{{ number_format($l->monthly_amortization, 2) }}</td>
                            <td class="table-body-cell text-right font-medium {{ $l->balance > 0 ? 'text-amber-600' : 'text-green-600' }}">₱{{ number_format($l->balance, 2) }}</td>
                            <td class="table-body-cell">
                                <span class="badge {{ $l->status === 'active' ? 'badge-warning' : 'badge-success' }}">{{ ucfirst($l->status) }}</span>
                            </td>
                            <td class="table-body-cell text-right">
                                <details class="inline-block relative">
                                    <summary class="btn btn-secondary btn-sm">Update</summary>
                                    <form method="POST" action="{{ route('loans.update', $l) }}" class="absolute z-10 mt-1 right-0 bg-white border border-slate-200 rounded-lg shadow-lg p-3 w-48 space-y-2">
                                        @csrf @method('PUT')
                                        <input type="number" step="0.01" name="balance" value="{{ $l->balance }}" class="input" placeholder="Balance">
                                        <select name="status" class="input">
                                            @foreach (['active','paid','closed'] as $s)<option value="{{ $s }}" @selected($l->status == $s)>{{ ucfirst($s) }}</option>@endforeach
                                        </select>
                                        <button class="btn btn-primary btn-sm w-full">Save</button>
                                    </form>
                                </details>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="table-body-cell">
                                <div class="empty-state py-12">
                                    <div class="empty-state-icon">💳</div>
                                    <div class="empty-state-title">No Loans</div>
                                    <p class="empty-state-text">No loans recorded.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if ($loans->hasPages())
                <div class="card-footer">{{ $loans->links() }}</div>
            @endif
        </div>
    </div>
</x-app-layout>
