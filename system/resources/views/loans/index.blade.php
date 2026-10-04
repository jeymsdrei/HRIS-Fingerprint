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
                    <x-typeahead
                        name="employee_id"
                        label="Employee"
                        placeholder="Type a name or ID…"
                        required
                        :value="old('employee_id', '')"
                        :items="$employees->map(fn ($e) => [
                            'id' => $e->id,
                            'text' => $e->employee_id.' — '.$e->full_name,
                            'label' => $e->full_name,
                            'meta' => $e->employee_id,
                        ])->values()" />
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
            <div class="card-body px-4 py-3">
                <form method="GET" class="grid w-full min-w-0 grid-cols-1 gap-2 items-end sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-[1.25fr_1.4fr_0.9fr_0.95fr_0.9fr_auto]">
                    @include('partials.employee-filters')
                    <div class="w-full min-w-0 sm:w-auto">
                        <label class="input-label">Type</label>
                        <select name="loan_type" class="input w-full min-w-0">
                            <option value="">All Types</option>
                            @foreach (['sss','pagibig','company','cash_advance','other'] as $t)
                                <option value="{{ $t }}" @selected(request('loan_type') == $t)>{{ ucwords(str_replace('_', ' ', $t)) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full min-w-0 sm:w-auto">
                        <label class="input-label">Status</label>
                        <select name="status" class="input w-full min-w-0">
                            <option value="">All Status</option>
                            @foreach (['active','paid','closed'] as $s)<option value="{{ $s }}" @selected(request('status') == $s)>{{ ucfirst($s) }}</option>@endforeach
                        </select>
                    </div>
                    <button class="btn btn-primary w-full sm:w-auto">Filter</button>
                </form>
            </div>
        </div>

        {{-- Table --}}
        <div class="card" x-data="loansTable()" x-init="init()">
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
                        <tr class="table-body-row" data-loan-id="{{ $l->id }}">
<td class="table-body-cell">
                                 <span id="loan-employee-name-{{ $l->id }}" class="font-medium text-slate-900">{{ $l->employee->full_name }}</span>
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
                                <button @click="openEditor($event.currentTarget)"
                                    data-loan-id="{{ $l->id }}"
                                    data-employee-name="{{ $l->employee->full_name }}"
                                    data-balance="{{ $l->balance }}"
                                    data-status="{{ $l->status }}"
                                    data-update-url="{{ route('loans.update', $l) }}"
                                    class="btn btn-secondary btn-sm">Update</button>
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

            <x-modal name="loan-editor" maxWidth="md" focusable>
                <div role="dialog" aria-modal="true" aria-labelledby="loan-editor-title" class="bg-white">
                    <div class="card-header">
                        <h2 id="loan-editor-title" class="font-semibold text-slate-900">Update Loan</h2>
                        <p class="mt-1 text-sm text-slate-600">Employee: <span x-text="selectedLoan.employeeName" class="font-semibold text-slate-900"></span></p>
                    </div>
                    <div class="card-body">
                        <form :action="selectedLoan.updateUrl" method="POST" @submit.prevent="submitEditor(editingId, $event)" class="space-y-4">
                            @csrf @method('PUT')
                            <div>
                                <label for="loan-editor-balance" class="input-label">Balance</label>
                                <input id="loan-editor-balance" x-model="selectedLoan.balance" type="number" step="0.01" name="balance" class="input" placeholder="Balance" required>
                            </div>
                            <div>
                                <label for="loan-editor-status" class="input-label">Status</label>
                                <select id="loan-editor-status" x-model="selectedLoan.status" name="status" class="input">
                                    <option value="active">Active</option>
                                    <option value="paid">Paid</option>
                                    <option value="closed">Closed</option>
                                </select>
                            </div>
                            <div class="flex justify-end gap-2">
                                <button type="button" @click="closeEditor()" class="btn btn-secondary">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </x-modal>
        </div>
    </div>

<script>
// On a hard load this inline script runs before the deferred app.js bundle, so the
// Alpine global does not exist yet. On an SPA swap it already does, and `alpine:init`
// has long since fired, so registering through that event alone would leave
// x-data="loansTable()" undefined on every return visit.
const registerLoansTable = () => Alpine.data('loansTable', () => ({
        editingId: null,
        selectedLoan: {
            employeeName: '',
            balance: '',
            status: 'active',
            updateUrl: '',
        },

        openEditor(button) {
            this.editingId = Number(button.dataset.loanId);
            this.selectedLoan = {
                employeeName: button.dataset.employeeName,
                balance: button.dataset.balance,
                status: button.dataset.status,
                updateUrl: button.dataset.updateUrl,
            };
            localStorage.setItem('lastEditedLoan', this.editingId);
            window.dispatchEvent(new CustomEvent('open-modal', { detail: 'loan-editor' }));
        },

        closeEditor() {
            this.editingId = null;
            window.dispatchEvent(new CustomEvent('close-modal', { detail: 'loan-editor' }));
        },

        async submitEditor(id, event) {
            const form = event.target;
            const formData = new FormData(form);

            try {
                const response = await fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                    body: formData,
                });

                if (response.ok || response.status === 302) {
                    window.location.reload();
                    return;
                }
            } catch (e) {
                // Fallback through to traditional submit
            }
            form.submit();
        },

        sortRows() {
            const tbody = document.querySelector('.data-table tbody');
            if (!tbody) return;
            const dataRows = Array.from(tbody.querySelectorAll('tr.table-body-row'));

            dataRows.sort((a, b) => {
                const statusElA = a.querySelectorAll('td.table-body-cell')[5]?.querySelector('.badge');
                const statusElB = b.querySelectorAll('td.table-body-cell')[5]?.querySelector('.badge');
                const statusA = statusElA ? statusElA.textContent.trim().toLowerCase() : '';
                const statusB = statusElB ? statusElB.textContent.trim().toLowerCase() : '';

                const balA = a.querySelectorAll('td.table-body-cell.text-right')[2]?.textContent || '0';
                const balB = b.querySelectorAll('td.table-body-cell.text-right')[2]?.textContent || '0';
                const balanceA = parseFloat(balA.replace(/[^0-9.]/g, '')) || 0;
                const balanceB = parseFloat(balB.replace(/[^0-9.]/g, '')) || 0;

                if (statusA === 'active' && statusB !== 'active') return -1;
                if (statusA !== 'active' && statusB === 'active') return 1;
                return balanceB - balanceA;
            });

            dataRows.forEach(row => tbody.appendChild(row));
        },

        init() {
            const self = this;
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') self.closeEditor();
            });
            setTimeout(() => self.sortRows(), 150);
        },
}));

if (window.Alpine) {
    registerLoansTable();
} else {
    document.addEventListener('alpine:init', registerLoansTable, { once: true });
}
</script>

<style>
tr.table-body-row.highlight-row {
    animation: highlightPulse 1.8s ease-out forwards;
}

@keyframes highlightPulse {
    0% { background-color: #c7d2fe; }
    40% { background-color: #a5b4fc; }
    100% { background-color: transparent; }
}

</style>
</x-app-layout>
