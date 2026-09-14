@aware(['error' => null])
<x-app-layout hris>
    <x-slot name="title">My Payroll History</x-slot>

    <div class="page-container space-y-6">
        {{-- Page Header --}}
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-900">My Payroll History</h1>
            <p class="mt-2 text-slate-600">Your payroll records over time</p>
        </div>

        <div class="card">
            <div class="table-container">
                <table class="data-table">
                    <thead class="table-head">
                        <tr><th class="table-head-cell">Period</th><th class="table-head-cell">Status</th><th class="table-head-cell">Gross</th><th class="table-head-cell">Net</th><th class="table-head-cell text-right">Date</th></tr>
                    </thead>
                    <tbody>
                        @forelse ($payrolls as $pay)
                        <tr class="table-body-row">
                            <td class="table-body-cell">{{ $pay->period->name ?? '—' }}</td>
                            <td class="table-body-cell">
                                @php
                                    $c = ['draft' => 'badge-neutral', 'computed' => 'badge-info', 'released' => 'badge-success', 'on_hold' => 'badge-warning'];
                                @endphp
                                <span class="badge {{ $c[$pay->status] ?? 'badge-neutral' }}">{{ ucwords(str_replace('_', ' ', $pay->status)) }}</span>
                            </td>
                            <td class="table-body-cell">₱{{ number_format($pay->gross, 2) }}</td>
                            <td class="table-body-cell font-semibold text-green-600">₱{{ number_format($pay->net, 2) }}</td>
                            <td class="table-body-cell text-right text-slate-500">{{ $pay->created_at->format('M d, Y') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="table-body-cell">
                                <div class="empty-state py-12">
                                    <div class="empty-state-icon">💼</div>
                                    <div class="empty-state-title">No Payroll Records</div>
                                    <p class="empty-state-text">No payroll records available yet.</p>
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
