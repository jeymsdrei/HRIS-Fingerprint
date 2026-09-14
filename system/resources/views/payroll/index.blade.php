<x-app-layout hris>
    <x-slot name="title">Payroll</x-slot>

    <div class="page-container">
        {{-- Page Header --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
            <div>
                <h1 class="text-3xl font-bold text-slate-900">Payroll</h1>
                <p class="mt-2 text-slate-600">Permanent employees run monthly; contractual employees run daily by completed hours.</p>
            </div>
            <a href="{{ route('payroll.create') }}" class="btn btn-primary">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Generate Payroll
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($periods as $p)
            <a href="{{ route('payroll.show', $p) }}" class="card p-6 hover:shadow-hover hover:border-indigo-300 transition-all duration-fast">
                <div class="flex justify-between items-start">
                    <div>
                        <h4 class="font-semibold text-slate-900">{{ $p->name }}</h4>
                        <p class="text-xs text-slate-400 mt-1">{{ ucwords(str_replace('_', ' ', $p->type)) }} · <span class="font-mono">{{ $p->start_date->format('M d') }} – {{ $p->end_date->format('M d') }}</span></p>
                    </div>
                    <span class="badge {{ $p->status === 'released' ? 'badge-success' : ($p->status === 'processing' ? 'badge-info' : 'badge-neutral') }}">{{ ucfirst($p->status) }}</span>
                </div>
                <div class="grid grid-cols-3 gap-3 mt-6 text-sm">
                    <div>
                        <p class="kpi-label">Employees</p>
                        <p class="font-semibold text-slate-900">{{ $p->payrolls_count }}</p>
                    </div>
                    <div>
                        <p class="kpi-label">Pay Date</p>
                        <p class="font-semibold text-slate-900">{{ $p->pay_date->format('M d, Y') }}</p>
                    </div>
                    <div>
                        <p class="kpi-label">Net Total</p>
                        <p class="font-semibold text-indigo-600">₱{{ number_format($p->payrolls()->sum('net_pay'), 0) }}</p>
                    </div>
                </div>
            </a>
            @empty
            <div class="col-span-full card">
                <div class="card-body">
                    <div class="empty-state">
                        <div class="empty-state-icon">💰</div>
                        <div class="empty-state-title">No Payroll Periods</div>
                        <p class="empty-state-text">Generate your first payroll period to get started.</p>
                        <a href="{{ route('payroll.create') }}" class="btn btn-primary mt-3">Generate Payroll</a>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
        @if ($periods->hasPages())
            <div class="card-footer">{{ $periods->links() }}</div>
        @endif
    </div>
</x-app-layout>
