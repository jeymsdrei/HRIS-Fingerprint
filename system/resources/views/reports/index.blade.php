<x-app-layout hris>
    <x-slot name="title">Reports</x-slot>

    <div class="page-container space-y-6">
        {{-- Page Header --}}
        <div class="mb-2">
            <h1 class="text-3xl font-bold text-slate-900">Reports & Export</h1>
            <p class="mt-2 text-slate-600">Generate and export organizational reports</p>
        </div>

        {{-- Generate Report --}}
        <div class="card">
            <div class="card-body px-4 py-3">
                <form method="GET" action="{{ route('reports.show') }}" class="grid w-full min-w-0 grid-cols-1 gap-2 items-end sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-[1.6fr_1.1fr_1fr_1fr_1fr_0.9fr_0.9fr_auto]">
                    <div class="w-full min-w-0">
                        <label class="input-label" for="report-type">Report Type</label>
                        <select id="report-type" name="type" class="input w-full min-w-0" required>
                            <option value="attendance" @selected(request('type') === 'attendance')>Attendance Report</option>
                            <option value="attendance_daily" @selected(request('type') === 'attendance_daily')>Attendance Summary (per employee)</option>
                            <option value="late" @selected(request('type') === 'late')>Late Report</option>
                            <option value="absent" @selected(request('type') === 'absent')>Absent Report</option>
                            <option value="teaching_hours" @selected(request('type') === 'teaching_hours')>Teaching Hours Report</option>
                            <option value="payroll" @selected(request('type') === 'payroll')>Payroll Report</option>
                            <option value="make_up" @selected(request('type') === 'make_up')>Make-Up Class Report</option>
                            <option value="benefits" @selected(request('type') === 'benefits')>Benefits Report</option>
                            <option value="loans" @selected(request('type') === 'loans')>Loan Report</option>
                            <option value="departments" @selected(request('type') === 'departments')>Department Report</option>
                            <option value="employees" @selected(request('type') === 'employees')>Employee Report</option>
                        </select>
                    </div>
                    <div class="w-full min-w-0">
                        <label class="input-label" for="report-department">Department</label>
                        <select id="report-department" name="department_id" class="input w-full min-w-0">
                            <option value="">All</option>
                            @foreach ($departments as $d)<option value="{{ $d->id }}" @selected((string) request('department_id') === (string) $d->id)>{{ $d->name }}</option>@endforeach
                        </select>
                    </div>
                    <div class="w-full min-w-0">
                        <label class="input-label" for="report-classification">Employee Type</label>
                        <select id="report-classification" name="classification" class="input w-full min-w-0">
                            <option value="">All</option>
                            <option value="teaching" @selected(request('classification') === 'teaching')>Teaching</option>
                            <option value="non_teaching" @selected(request('classification') === 'non_teaching')>Non-Teaching</option>
                        </select>
                    </div>
                    <div class="w-full min-w-0">
                        <label class="input-label" for="report-employment">Employment Status</label>
                        <select id="report-employment" name="employment_status" class="input w-full min-w-0">
                            <option value="">All</option>
                            <option value="permanent" @selected(request('employment_status') === 'permanent')>Permanent</option>
                            <option value="contractual" @selected(request('employment_status') === 'contractual')>Contractual</option>
                        </select>
                    </div>
                    <div class="w-full min-w-0">
                        <label class="input-label" for="report-period">Payroll Period</label>
                        <select id="report-period" name="payroll_period_id" class="input w-full min-w-0">
                            <option value="">All</option>
                            @foreach ($periods as $pp)<option value="{{ $pp->id }}" @selected((string) request('payroll_period_id') === (string) $pp->id)>{{ $pp->name }}</option>@endforeach
                        </select>
                    </div>
                    <div class="w-full min-w-0">
                        <label class="input-label" for="report-from">From</label>
                        <input id="report-from" type="date" name="from" value="{{ request('from', now()->startOfMonth()->format('Y-m-d')) }}" class="input w-full min-w-0">
                    </div>
                    <div class="w-full min-w-0">
                        <label class="input-label" for="report-to">To</label>
                        <input id="report-to" type="date" name="to" value="{{ request('to', now()->format('Y-m-d')) }}" class="input w-full min-w-0">
                    </div>
                    <button class="btn btn-primary w-full sm:w-auto">Generate</button>
                </form>
            </div>
        </div>

        {{-- Available Reports --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ([
                ['attendance','Attendance','Daily / weekly / monthly / yearly attendance records with status and hours.'],
                ['attendance_daily','Attendance Summary','Per-employee totals: present, late, absent, hours, overtime.'],
                ['late','Late','All employees flagged late with minutes.'],
                ['absent','Absent','All employees flagged absent.'],
                ['teaching_hours','Teaching Hours','Completed teaching hours per class day for teaching personnel.'],
                ['payroll','Payroll','Gross, deductions and net per employee across periods.'],
                ['make_up','Make-Up Class','Make-up class records, hours and additional pay.'],
                ['benefits','Benefits','Benefit types, recipients and totals.'],
                ['loans','Loans','Loan balances, amortizations and status.'],
                ['departments','Departments','Employee counts, attendance rate and payroll expenses.'],
                ['employees','Employees','Register summary with clearance status.'],
            ] as [$key, $name, $desc])
            <div class="card p-5 flex flex-col">
                <h4 class="font-semibold text-slate-900 text-sm">{{ $name }}</h4>
                <p class="text-xs text-slate-500 mt-1 mb-4 flex-1">{{ $desc }}</p>
                <div class="flex flex-wrap gap-2 w-full">
                    <form method="GET" action="{{ route('reports.show') }}" class="w-full">
                        <input type="hidden" name="type" value="{{ $key }}">
                        @foreach (['department_id', 'classification', 'employment_status', 'payroll_period_id', 'from', 'to'] as $carry)
                            @if (request($carry))
                                <input type="hidden" name="{{ $carry }}" value="{{ request($carry) }}">
                            @endif
                        @endforeach
                        <button class="btn btn-primary w-full">View</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
