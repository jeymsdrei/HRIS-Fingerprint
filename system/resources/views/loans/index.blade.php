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
                <table class="data-table"
                    x-data="loansTable()"
                    x-init="init()"
                    @click.outside="closeEditor()">
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
                        <tr class="table-body-row" :class="{ 'bg-slate-50': editingId === {{ $l->id }} }" data-loan-id="{{ $l->id }}">
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
                                <button @click="openEditor({{ $l->id }})" class="btn btn-secondary btn-sm">Update</button>
                            </td>
                        </tr>
                        <tr x-show="editingId === {{ $l->id }}"
                            x-effect="editingId === {{ $l->id }} && setTimeout(() => { const inp = $el.querySelector('input'); if (inp) inp.focus(); }, 100)"
                            class="editor-row"
                            data-loan-id="{{ $l->id }}">
                            <td colspan="7">
                                <form action="{{ route('loans.update', $l) }}" method="POST"
                                    @submit.prevent="submitEditor({{ $l->id }}, $event)"
                                    class="editor-form">
                                    @csrf @method('PUT')
                                    <div class="editor-fields">
                                        <div class="editor-field">
                                            <label class="input-label">Balance</label>
                                            <input type="number" step="0.01" name="balance" value="{{ $l->balance }}" class="input" placeholder="Balance" required>
                                        </div>
                                        <div class="editor-field">
                                            <label class="input-label">Status</label>
                                            <select name="status" class="input">
                                                @foreach (['active','paid','closed'] as $s)
                                                    <option value="{{ $s }}" @selected($l->status == $s)>{{ ucfirst($s) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="editor-field">
                                            <div class="flex gap-2">
                                                <button type="submit" class="btn btn-primary btn-sm">Save</button>
                                                <button type="button" @click="closeEditor()" class="btn btn-secondary btn-sm">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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

<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('loansTable', () => ({
        editingId: null,

        openEditor(id) {
            this.editingId = id;
            localStorage.setItem('lastEditedLoan', id);
        },

        closeEditor() {
            this.editingId = null;
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
                    // Highlight employee name
                    const nameEl = document.getElementById('loan-employee-name-' + id);
                    if (nameEl) {
                        nameEl.classList.add('bg-red-100', 'text-red-900', 'px-2', 'rounded', 'animate-pulse');
                        setTimeout(() => {
                            nameEl.classList.remove('bg-red-100', 'text-red-900', 'px-2', 'rounded', 'animate-pulse');
                        }, 2000);
                    }

                    this.closeEditor();
                    setTimeout(() => {
                        this.sortRows();
                        const el = document.querySelector(`tr[data-loan-id="${id}"]`);
                        if (el) {
                            el.classList.add('highlight-row');
                            setTimeout(() => el.classList.remove('highlight-row'), 2000);
                        }
                    }, 50);
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
});
</script>

<style>
.editor-row td {
    padding: 0 !important;
    border-bottom: 2px solid #e2e8f0;
}

.editor-form {
    padding: 16px 24px;
    background: #f8fafc;
    border-bottom: 2px solid #e2e8f0;
}

.editor-fields {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 12px;
    align-items: end;
}

.editor-field {
    display: flex;
    flex-direction: column;
    gap: 6px;
}

.editor-field .flex {
    display: flex;
    gap: 8px;
}

.editor-field .flex .btn {
    flex: 1;
}

@media (max-width: 640px) {
    .editor-fields {
        grid-template-columns: 1fr !important;
    }
    .editor-field .flex {
        flex-direction: column;
    }
    .editor-field .flex .btn {
        width: 100%;
    }
}

tr.table-body-row.highlight-row {
    animation: highlightPulse 1.8s ease-out forwards;
}

@keyframes highlightPulse {
    0% { background-color: #c7d2fe; }
    40% { background-color: #a5b4fc; }
    100% { background-color: transparent; }
}

@media (max-width: 767px) {
    .editor-row td {
        padding: 0 !important;
    }
    .editor-form {
        padding: 12px 14px;
    }
}
</style>
