<x-app-layout hris>
    <x-slot name="title">Payroll Settings</x-slot>

    <div class="page-container">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-900">Payroll Settings</h1>
            <p class="mt-2 text-slate-600">Configure payroll computation parameters</p>
        </div>

        <div class="max-w-3xl card">
            <div class="card-header">
                <h2 class="font-semibold text-slate-900">Payroll Configuration</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('settings.payroll.save') }}" class="space-y-5">
                    @csrf
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="input-label">Company / School Name</label>
                            <input name="company_name" value="{{ $values['company_name'] }}" class="input">
                        </div>
                        <div>
                            <label class="input-label">Company Address</label>
                            <input name="company_address" value="{{ $values['company_address'] }}" class="input">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="input-label">Default Shift Start</label>
                            <input type="time" name="default_shift_start" value="{{ $values['default_shift_start'] }}" class="input">
                        </div>
                        <div>
                            <label class="input-label">Default Shift End</label>
                            <input type="time" name="default_shift_end" value="{{ $values['default_shift_end'] }}" class="input">
                        </div>
                        <div>
                            <label class="input-label">Workdays per Month</label>
                            <input type="number" name="workdays_per_month" value="{{ $values['workdays_per_month'] }}" class="input">
                        </div>
                        <div>
                            <label class="input-label">Overtime Multiplier</label>
                            <input type="number" step="0.05" name="overtime_multiplier" value="{{ $values['overtime_multiplier'] }}" class="input">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="input-label">SSS EE Rate (%)</label>
                            <input type="number" step="0.1" name="sss_ee_rate" value="{{ $values['sss_ee_rate'] }}" class="input">
                        </div>
                        <div>
                            <label class="input-label">SSS EE Cap</label>
                            <input type="number" step="0.01" name="sss_ee_cap" value="{{ $values['sss_ee_cap'] }}" class="input">
                        </div>
                        <div>
                            <label class="input-label">PhilHealth EE Rate (%)</label>
                            <input type="number" step="0.1" name="philhealth_ee_rate" value="{{ $values['philhealth_ee_rate'] }}" class="input">
                        </div>
                        <div>
                            <label class="input-label">PhilHealth EE Cap</label>
                            <input type="number" step="0.01" name="philhealth_ee_cap" value="{{ $values['philhealth_ee_cap'] }}" class="input">
                        </div>
                        <div>
                            <label class="input-label">Pag-IBIG EE Rate (%)</label>
                            <input type="number" step="0.1" name="pagibig_ee_rate" value="{{ $values['pagibig_ee_rate'] }}" class="input">
                        </div>
                        <div>
                            <label class="input-label">Pag-IBIG EE Cap</label>
                            <input type="number" step="0.01" name="pagibig_ee_cap" value="{{ $values['pagibig_ee_cap'] }}" class="input">
                        </div>
                        <div>
                            <label class="input-label">Default Other Deduction</label>
                            <input type="number" step="0.01" name="default_other_deduction" value="{{ $values['default_other_deduction'] }}" class="input">
                        </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="input-label">Late Deduction Rate (per minute, ₱)</label>
                            <input type="number" step="0.01" name="late_deduction_rate" value="{{ $values['late_deduction_rate'] }}" class="input" placeholder="Blank = minutes × hourly/60">
                        </div>
                        <div>
                            <label class="input-label">Undertime Deduction Rate (per minute, ₱)</label>
                            <input type="number" step="0.01" name="undertime_deduction_rate" value="{{ $values['undertime_deduction_rate'] }}" class="input" placeholder="Blank = minutes × hourly/60">
                        </div>
                        <div>
                            <label class="input-label">Absence Deduction Rate (per day, ₱)</label>
                            <input type="number" step="0.01" name="absent_deduction_rate" value="{{ $values['absent_deduction_rate'] }}" class="input" placeholder="Blank = monthly ÷ workdays/month">
                        </div>
                    </div>
                    <div class="border-t border-slate-100 pt-4">
                        <label class="input-label">Monthly Payroll Days</label>
                        <div class="flex gap-3">
                            <label class="flex items-center gap-2 text-sm text-slate-600">
                                <input type="checkbox" name="monthly_payroll_days[]" value="15" class="rounded border-slate-300" {{ in_array(15, (array) $values['monthly_payroll_days']) ? 'checked' : '' }}> 15th
                            </label>
                            <label class="flex items-center gap-2 text-sm text-slate-600">
                                <input type="checkbox" name="monthly_payroll_days[]" value="30" class="rounded border-slate-300" {{ in_array(30, (array) $values['monthly_payroll_days']) ? 'checked' : '' }}> 30th
                            </label>
                        </div>
                    </div>
                    <button class="btn btn-primary">Save Settings</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
