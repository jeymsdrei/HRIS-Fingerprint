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
            <div class="card-header">
                <h2 class="font-semibold text-slate-900">Generate Report</h2>
            </div>
            <div class="card-body">
                <form method="GET" action="{{ route('reports.show') }}" class="grid grid-cols-2 md:grid-cols-4 gap-4 items-end">
                    <div>
                        <label class="input-label">Report Type</label>
                        <select name="type" class="input" required>
                            <option value="attendance">Attendance Report</option>
                            <option value="attendance_daily">Attendance Summary (per employee)</option>
                            <option value="late">Late Report</option>
                            <option value="absent">Absent Report</option>
                            <option value="teaching_hours">Teaching Hours Report</option>
                            <option value="payroll">Payroll Report</option>
                            <option value="make_up">Make-Up Class Report</option>
                            <option value="benefits">Benefits Report</option>
                            <option value="loans">Loan Report</option>
                            <option value="departments">Department Report</option>
                            <option value="employees">Employee Report</option>
                        </select>
                    </div>
                    <div>
                        <label class="input-label">Department</label>
                        <select name="department_id" class="input">
                            <option value="">All</option>
                            @foreach (App\Models\Department::orderBy('name')->get() as $d)<option value="{{ $d->id }}">{{ $d->name }}</option>@endforeach
                        </select>
                    </div>
                    <div>
                        <label class="input-label">Employee Type</label>
                        <select name="classification" class="input">
                            <option value="">All</option>
                            <option value="teaching">Teaching</option>
                            <option value="non_teaching">Non-Teaching</option>
                        </select>
                    </div>
                    <div>
                        <label class="input-label">Employment Status</label>
                        <select name="employment_status" class="input">
                            <option value="">All</option>
                            <option value="permanent">Permanent</option>
                            <option value="contractual">Contractual</option>
                        </select>
                    </div>
                    <div>
                        <label class="input-label">Payroll Period</label>
                        <select name="payroll_period_id" class="input">
                            <option value="">All</option>
                            @foreach ($periods as $pp)<option value="{{ $pp->id }}">{{ $pp->name }}</option>@endforeach
                        </select>
                    </div>
                    <div>
                        <label class="input-label">From</label>
                        <input type="date" name="from" value="{{ now()->startOfMonth()->format('Y-m-d') }}" class="input">
                    </div>
                    <div>
                        <label class="input-label">To</label>
                        <input type="date" name="to" value="{{ now()->format('Y-m-d') }}" class="input">
                    </div>
                    <button class="btn btn-primary">Generate</button>
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
                <div class="flex flex-wrap gap-2">
                    <form method="GET" action="{{ route('reports.show') }}">
                        <input type="hidden" name="type" value="{{ $key }}">
                        <button class="btn btn-outline btn-sm">View</button>
                    </form>
                    <form method="POST" action="{{ route('reports.export') }}">
                        @csrf
                        <input type="hidden" name="type" value="{{ $key }}">
                        <input type="hidden" name="format" value="pdf">
                        <button class="btn btn-secondary btn-sm">PDF</button>
                    </form>
                    <form method="POST" action="{{ route('reports.export') }}">
                        @csrf
                        <input type="hidden" name="type" value="{{ $key }}">
                        <input type="hidden" name="format" value="excel">
                        <button class="btn btn-secondary btn-sm">Excel</button>
                    </form>
                    <form method="POST" action="{{ route('reports.export') }}">
                        @csrf
                        <input type="hidden" name="type" value="{{ $key }}">
                        <input type="hidden" name="format" value="csv">
                        <button class="btn btn-secondary btn-sm">CSV</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
