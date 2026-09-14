<x-app-layout hris>
    <x-slot name="title">Generate Payroll</x-slot>

    <div class="page-container">
        <div class="max-w-lg">
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-slate-900">Generate Payroll</h1>
                <p class="mt-2 text-slate-600">Create a new payroll period</p>
            </div>

            <div class="card">
                <div class="card-header">
                    <h2 class="font-semibold text-slate-900">New Payroll Period</h2>
                    <p class="text-xs text-slate-500 mt-1">Attendance validated per employee schedule. Incomplete clearance = <b>on hold</b>.</p>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('payroll.store') }}" class="space-y-4">
                        @csrf
                        <div>
                            <label class="input-label">Payroll Type</label>
                            <select name="type" class="input" required>
                                <option value="monthly">Monthly (Permanent employees)</option>
                                <option value="semi_monthly">Semi-Monthly (1st & 15th)</option>
                                <option value="daily">Daily (Contractual / Non-regular)</option>
                            </select>
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="input-label">Start Date</label>
                                <input type="date" name="start_date" value="{{ now()->startOfMonth()->format('Y-m-d') }}" class="input" required>
                            </div>
                            <div>
                                <label class="input-label">End Date</label>
                                <input type="date" name="end_date" value="{{ now()->endOfMonth()->format('Y-m-d') }}" class="input" required>
                            </div>
                        </div>
                        <div>
                            <label class="input-label">Pay Date</label>
                            <input type="date" name="pay_date" value="{{ now()->format('Y-m-d') }}" class="input" required>
                        </div>
                        <div>
                            <label class="input-label">Period Name (optional)</label>
                            <input name="name" placeholder="e.g. July 2026" class="input">
                        </div>
                        <button class="btn btn-primary w-full">Generate Payroll</button>
                    </form>
                </div>
                <div class="card-footer space-y-1 text-xs text-slate-500">
                    <p><b>Gross Pay</b> = Basic + Teaching Hours + Make-Up + Allowances + Benefits + Overtime</p>
                    <p><b>Deductions</b> = Late + Absent + Undertime + Tax + SSS + PhilHealth + Pag-IBIG + Loans + Cash Advance + Other</p>
                    <p><b>Net Pay</b> = Gross Pay − Total Deductions</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
