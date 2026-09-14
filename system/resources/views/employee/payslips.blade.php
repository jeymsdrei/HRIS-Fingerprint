<x-app-layout hris>
    <x-slot name="title">My Payslips</x-slot>

    <div class="page-container space-y-6">
        {{-- Page Header --}}
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-900">My Payslips</h1>
            <p class="mt-2 text-slate-600">Download your payslips</p>
        </div>

        <div class="card">
            <div class="table-container">
                <table class="data-table">
                    <thead class="table-head">
                        <tr><th class="table-head-cell">Payslip No.</th><th class="table-head-cell">Period</th><th class="table-head-cell">Pay Date</th><th class="table-head-cell">Net Pay</th><th class="table-head-cell text-right">Action</th></tr>
                    </thead>
                    <tbody>
                        @forelse ($payslips as $p)
                        <tr class="table-body-row">
                            <td class="table-body-cell font-mono text-xs">{{ $p->payslip_no }}</td>
                            <td class="table-body-cell">{{ $p->payroll?->period?->name ?? '—' }}</td>
                            <td class="table-body-cell">{{ $p->pay_date?->format('M d, Y') ?? '—' }}</td>
                            <td class="table-body-cell font-semibold text-green-600">₱{{ number_format($p->net_pay, 2) }}</td>
                            <td class="table-body-cell text-right">
                                <a href="{{ route('employee.payslips.download', $p) }}" class="btn btn-outline btn-sm">Download PDF</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="table-body-cell">
                                <div class="empty-state py-12">
                                    <div class="empty-state-icon">📄</div>
                                    <div class="empty-state-title">No Payslips</div>
                                    <p class="empty-state-text">No payslips available yet.</p>
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
