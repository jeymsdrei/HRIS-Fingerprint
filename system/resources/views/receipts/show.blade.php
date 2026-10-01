<x-app-layout hris>
    <x-slot name="title">Receipt — {{ $receipt->receipt_no }}</x-slot>

    <div class="page-container">
        <div class="mb-4 flex justify-start no-print">
            <a href="{{ request()->routeIs('employee.receipts.view') ? route('employee.receipts') : route('receipts.index') }}" class="btn btn-outline btn-sm">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                Back to Receipts
            </a>
        </div>

        <div class="max-w-2xl mx-auto card p-8">
            <div class="text-center border-b-2 border-slate-900 pb-4">
                <h2 class="text-xl font-bold text-slate-900">{{ $company['name'] }}</h2>
                <p class="text-xs text-slate-500">{{ $company['address'] }}</p>
                <p class="mt-2 text-sm font-semibold tracking-wide text-slate-700">OFFICIAL PAYROLL RECEIPT</p>
            </div>

            <div class="py-4 text-sm space-y-1.5 border-b border-slate-100">
                <div class="flex justify-between"><span class="text-slate-400">Receipt No.</span><span class="font-mono font-semibold text-slate-900">{{ $receipt->receipt_no }}</span></div>
                <div class="flex justify-between"><span class="text-slate-400">Date</span><span class="text-slate-700">{{ $receipt->created_at?->format('M d, Y h:i A') }}</span></div>
                <div class="flex justify-between"><span class="text-slate-400">Payroll Period</span><span class="text-slate-700">{{ $receipt->payroll->period->name ?? '—' }}</span></div>
                <div class="flex justify-between"><span class="text-slate-400">Payment Method</span><span class="text-slate-700">{{ $receipt->payment_method ? ucfirst(str_replace('_', ' ', $receipt->payment_method)) : '—' }}</span></div>
                <div class="flex justify-between"><span class="text-slate-400">Employee</span><span class="font-medium text-slate-900">{{ $receipt->employee->full_name }} ({{ $receipt->employee->employee_id }})</span></div>
            </div>

            <div class="border border-slate-300 rounded-lg px-6 py-8 my-6 text-center">
                <p class="text-sm text-slate-500">Received from <strong>{{ $company['name'] }}</strong> the amount of</p>
                <p class="text-3xl font-bold text-slate-900 my-2">₱{{ number_format($receipt->amount_received, 2) }}</p>
                <p class="text-sm text-slate-400">({{ ucfirst($receipt->employee->full_name) }})</p>
            </div>

            <div class="grid grid-cols-2 gap-8 pt-12 text-center">
                <div>
                    <p class="font-mono text-sm">{{ $receipt->employee_signature ?? '' }}</p>
                    <div class="border-t border-slate-400 mt-1 pt-1 text-xs text-slate-500">Employee Signature{{ $receipt->signed_at ? ' · '.$receipt->signed_at->format('M d, Y h:i A') : '' }}</div>
                </div>
                <div>
                    <p class="font-mono text-sm">{{ $receipt->hr_signature ?? '' }}</p>
                    <div class="border-t border-slate-400 mt-1 pt-1 text-xs text-slate-500">HR / Cashier Signature</div>
                </div>
            </div>

            <div class="mt-6 flex gap-2 no-print">
                @unless (request()->routeIs('employee.receipts.view'))
                <button type="button" class="btn btn-primary" onclick="window.print()">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4H7v4a2 2 0 002 2z"></path></svg>
                    Print Receipt
                </button>
                @endunless
            </div>
        </div>
    </div>

    <style>
        @media print {
            body { background: #fff !important; }
            .sidebar, .app-header, .action-loading-overlay, #action-loading-overlay, .no-print { display: none !important; }
            .app-main { margin-left: 0 !important; }
            .page-content { overflow: visible !important; }
            .page-container { max-width: 100% !important; padding: 0 !important; }
            .card { box-shadow: none !important; border: 1px solid #cbd5e1 !important; }
        }
    </style>

    <script>
        if (window.__autoPrint) {
            window.__autoPrint = false;
            setTimeout(() => window.print(), 500);
        }
    </script>
</x-app-layout>