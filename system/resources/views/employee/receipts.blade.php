@aware(['error' => null])
<x-app-layout hris>
    <x-slot name="title">My Receipts</x-slot>

    <div class="page-container space-y-6">
        {{-- Page Header --}}
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-900">My Payroll Receipts</h1>
            <p class="mt-2 text-slate-600">View and sign your payroll receipts</p>
        </div>

        <div class="card">
            <div class="table-container">
                <table class="data-table">
                    <thead class="table-head">
                        <tr><th class="table-head-cell">Receipt No.</th><th class="table-head-cell">Period</th><th class="table-head-cell">Net Pay</th><th class="table-head-cell">Signed</th><th class="table-head-cell text-right">Action</th></tr>
                    </thead>
                    <tbody>
                        @forelse ($receipts as $r)
                        <tr class="table-body-row">
                            <td class="table-body-cell font-mono text-xs">{{ $r->receipt_no }}</td>
                            <td class="table-body-cell">{{ $r->payroll?->period?->name ?? '—' }}</td>
                            <td class="table-body-cell font-semibold text-green-600">₱{{ number_format($r->net_pay, 2) }}</td>
                            <td class="table-body-cell">
                                @if ($r->signed_at)
                                    <span class="badge badge-success">Signed</span>
                                @else
                                    <span class="badge badge-warning">Pending</span>
                                @endif
                            </td>
                            <td class="table-body-cell text-right whitespace-nowrap">
                                <a href="{{ route('employee.receipts.download', $r) }}" class="btn btn-outline btn-sm">PDF</a>
                                @unless ($r->signed_at)
                                    <button class="btn btn-success btn-sm" onclick="document.getElementById('sign-receipt-{{ $r->id }}').showModal()">Sign</button>
                                    <dialog id="sign-receipt-{{ $r->id }}" class="rounded-xl border border-slate-200 p-0 backdrop:bg-slate-900/40">
                                        <form method="POST" action="{{ route('employee.receipts.sign', $r) }}" class="p-6 w-96">
                                            @csrf
                                            <h3 class="font-semibold text-slate-900 mb-2">Sign Receipt {{ $r->receipt_no }}</h3>
                                            <p class="text-xs text-slate-500 mb-4">Please type your full name as your electronic signature.</p>
                                            <input name="employee_signature" required placeholder="Full name" class="input mb-4">
                                            <div class="flex justify-end gap-2">
                                                <button type="button" class="btn btn-secondary btn-sm" onclick="document.getElementById('sign-receipt-{{ $r->id }}').close()">Cancel</button>
                                                <button class="btn btn-success btn-sm">Sign &amp; Confirm</button>
                                            </div>
                                        </form>
                                    </dialog>
                                @endunless
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="table-body-cell">
                                <div class="empty-state py-12">
                                    <div class="empty-state-icon">🧾</div>
                                    <div class="empty-state-title">No Receipts</div>
                                    <p class="empty-state-text">No receipts available yet.</p>
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
