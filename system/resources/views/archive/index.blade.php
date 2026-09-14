<x-app-layout hris>
    <x-slot name="title">Archive & Historical Analytics</x-slot>

    <div class="page-container space-y-6">
        {{-- ===== Page Header ===== --}}
        <div class="mb-2 flex flex-wrap items-start justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold text-slate-900">Archive & Historical Analytics</h1>
                <p class="mt-2 text-slate-600">Review historical attendance, payroll, employee, and departmental records.</p>
            </div>

            {{-- Export Dropdown --}}
            @if ($archives->isNotEmpty())
            <div class="relative" x-data="{ exportOpen: false }" @click.outside="exportOpen = false">
                <button @click="exportOpen = !exportOpen" type="button"
                    class="btn btn-secondary inline-flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                    Export
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>

                <div x-show="exportOpen" x-cloak
                     class="absolute right-0 top-full mt-2 w-72 rounded-xl bg-white shadow-xl border border-slate-200 py-2 z-50">
                    <p class="px-4 py-2 text-xs font-semibold text-slate-400 uppercase tracking-wide">Filtered Records</p>
                    <div class="grid grid-cols-1 px-2 pb-1 gap-0.5">
                        @foreach (['print' => 'Print', 'pdf' => 'PDF Document', 'excel' => 'Excel (.xlsx)', 'csv' => 'CSV'] as $fmt => $label)
                        <form method="POST" action="{{ route('archives.export') }}" target="_blank" class="contents">
                            @csrf
                            <input type="hidden" name="format" value="{{ $fmt }}">
                            <input type="hidden" name="year" value="{{ $year }}">
                            <input type="hidden" name="month" value="{{ $month }}">
                            <input type="hidden" name="department_id" value="{{ $departmentId }}">
                            <input type="hidden" name="classification" value="{{ $classification }}">
                            <input type="hidden" name="employment_status" value="{{ $employmentStatus }}">
                            <input type="hidden" name="record_type" value="{{ $recordType }}">
                            @if ($from)
                                <input type="hidden" name="from" value="{{ $from->format('Y-m-d') }}">
                            @endif
                            @if ($to)
                                <input type="hidden" name="to" value="{{ $to->format('Y-m-d') }}">
                            @endif
                            <button type="submit" class="flex items-center gap-2 w-full px-3 py-2 text-sm text-slate-700 hover:bg-slate-50 rounded-lg text-left">
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                </svg>
                                {{ $label }}
                            </button>
                        </form>
                        @endforeach
                    </div>

                    <div class="border-t border-slate-100 my-1"></div>
                    <p class="px-4 py-2 text-xs font-semibold text-slate-400 uppercase tracking-wide">Entire Archive</p>
                    <div class="grid grid-cols-1 px-2 gap-0.5">
                        @foreach (['print' => 'Print', 'pdf' => 'PDF Document', 'excel' => 'Excel (.xlsx)', 'csv' => 'CSV'] as $fmt => $label)
                        <form method="POST" action="{{ route('archives.export') }}" target="_blank" class="contents">
                            @csrf
                            <input type="hidden" name="format" value="{{ $fmt }}">
                            <input type="hidden" name="export_all" value="1">
                            <button type="submit" class="flex items-center gap-2 w-full px-3 py-2 text-sm text-slate-700 hover:bg-slate-50 rounded-lg text-left">
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                                {{ $label }}
                            </button>
                        </form>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>

        {{-- ===== Filters ===== --}}
        <div class="card">
            <div class="card-header flex flex-wrap items-center justify-between gap-3">
                <h2 class="font-semibold text-slate-900">Filters</h2>
                <a href="{{ route('archives.index') }}" class="btn btn-outline btn-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                    Reset Filters
                </a>
            </div>
            <div class="card-body">
                <form method="GET" action="{{ route('archives.index') }}" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-7 gap-4 items-end">
                    <div>
                        <label class="input-label">Year</label>
                        <select name="year" class="input">
                            @foreach ($years as $y)
                                <option value="{{ $y }}" @selected($year == $y)>{{ $y }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="input-label">Month</label>
                        <select name="month" class="input">
                            <option value="0" @selected($month == 0)>All Months</option>
                            @foreach ($monthLabels as $i => $m)
                                <option value="{{ $i + 1 }}" @selected($month == $i + 1)>{{ $m }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="input-label">Department</label>
                        <select name="department_id" class="input">
                            <option value="0" @selected(!$departmentId)>All Departments</option>
                            @foreach ($departments as $d)
                                <option value="{{ $d->id }}" @selected($departmentId == $d->id)>{{ $d->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="input-label">Personnel Type</label>
                        <select name="classification" class="input">
                            <option value="" @selected(!$classification)>All</option>
                            <option value="teaching" @selected($classification == 'teaching')>Teaching</option>
                            <option value="non_teaching" @selected($classification == 'non_teaching')>Non-Teaching</option>
                        </select>
                    </div>
                    <div>
                        <label class="input-label">Employment Type</label>
                        <select name="employment_status" class="input">
                            <option value="" @selected(!$employmentStatus)>All</option>
                            <option value="permanent" @selected($employmentStatus == 'permanent')>Regular</option>
                            <option value="contractual" @selected($employmentStatus == 'contractual')>Contractual</option>
                        </select>
                    </div>
                    <div>
                        <label class="input-label">Record Type</label>
                        <select name="record_type" class="input">
                            <option value="" @selected(!$recordType)>All Records</option>
                            @foreach (['attendance','payroll','payslip','payroll_receipt','make_up_class','employee'] as $t)
                                <option value="{{ $t }}" @selected($recordType == $t)>{{ ucwords(str_replace('_', ' ', $t)) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                        </svg>
                        Apply Filter
                    </button>
                </form>

                {{-- Date Range --}}
                <form method="GET" action="{{ route('archives.index') }}" class="mt-4 pt-4 border-t border-slate-100 grid grid-cols-2 md:grid-cols-4 gap-4 items-end">
                    <div>
                        <label class="input-label">From</label>
                        <input type="date" name="from" value="{{ $from?->format('Y-m-d') ?? $startDate->format('Y-m-d') }}" class="input">
                    </div>
                    <div>
                        <label class="input-label">To</label>
                        <input type="date" name="to" value="{{ $to?->format('Y-m-d') ?? $endDate->format('Y-m-d') }}" class="input">
                    </div>
                    <div class="flex gap-2">
                        <button type="submit" class="btn btn-secondary">Apply Date Range</button>
                    </div>
                </form>
            </div>
        </div>

            </div>
        </div>

        {{-- ===== KPI Cards ===== --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4">
            @php
                $kpiCards = [
                    ['label' => 'Archived Employees', 'value' => number_format($kpis['archived_employees']), 'subtitle' => 'Employee snapshots', 'icon' => 'users', 'color' => 'bg-blue-50 text-blue-600'],
                    ['label' => 'Attendance Records', 'value' => number_format($kpis['attendance_records']), 'subtitle' => $month ? $monthLabels[$month - 1].' '.$year : 'Year '.$year, 'icon' => 'calendar', 'color' => 'bg-green-50 text-green-600'],
                    ['label' => 'Payroll Records', 'value' => number_format($kpis['payroll_records']), 'subtitle' => 'Salary entries', 'icon' => 'credit', 'color' => 'bg-blue-50 text-blue-600'],
                    ['label' => 'Total Payroll', 'value' => '₱'.number_format($kpis['payroll_amount']), 'subtitle' => 'Gross payroll', 'icon' => 'bank', 'color' => 'bg-violet-50 text-violet-600'],
                    ['label' => 'Total Deductions', 'value' => '₱'.number_format($kpis['total_deductions']), 'subtitle' => 'All deductions', 'icon' => 'minus', 'color' => 'bg-rose-50 text-rose-600'],
                    ['label' => 'Make-Up Classes', 'value' => number_format($kpis['makeup_records']), 'subtitle' => 'Recorded sessions', 'icon' => 'plus', 'color' => 'bg-amber-50 text-amber-600'],
                ];
            @endphp
            @foreach ($kpiCards as $k)
            <div class="kpi-card">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="kpi-label">{{ $k['label'] }}</p>
                        <p class="kpi-value">{{ $k['value'] }}</p>
                        <p class="kpi-subtitle">{{ $k['subtitle'] }}</p>
                    </div>
                    <div class="p-3 rounded-xl {{ $k['color'] }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            @if ($k['icon'] == 'users')
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M17 20h5v-2a3 3 0 00-5.856-1.487M15 10a3 3 0 11-6 0 3 3 0 016 0zM6 20h12a6 6 0 016-6H0a6 6 0 016 6z"></path>
                            @elseif ($k['icon'] == 'calendar')
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            @elseif ($k['icon'] == 'credit')
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M3 10h18M7 15h3m-6 3h12a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                            @elseif ($k['icon'] == 'bank')
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M3 21h18M4 18h16M6 18V8m4 10V8m4 10V8m4 10V8M3 21V5l9-3 9 3v16"></path>
                            @elseif ($k['icon'] == 'minus')
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M20 12H4"></path>
                            @else
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M12 4v16m8-8H4"></path>
                            @endif
                        </svg>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Determine if there is any data for the selected period --}}
        @php
            $hasAttendance = $kpis['attendance_records'] > 0;
            $hasPayroll = $kpis['payroll_records'] > 0;
            $hasMakeup = $kpis['makeup_records'] > 0;
            $hasAny = $hasAttendance || $hasPayroll || $hasMakeup || $kpis['archived_employees'] > 0;
        @endphp

        @if ($hasAny)
        {{-- ===== Row 1: Attendance Trend | Payroll Expense ===== --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            {{-- Attendance Trend --}}
            <div class="card">
                <div class="card-header">
                    <div>
                        <h2 class="font-semibold text-slate-900">Historical Attendance Trend</h2>
                        <p class="text-xs text-slate-500 mt-1">Present / Late / Absent / Half Day per month</p>
                    </div>
                </div>
                <div class="card-body">
                    @if ($hasAttendance)
                        <div class="h-72 relative" x-show="!$store.dash.chartsLoaded" x-cloak><div class="skeleton-chart"></div></div>
                        <div class="h-72" x-show="$store.dash.chartsLoaded" x-cloak><canvas id="attendanceTrendChart"></canvas></div>
                    @else
                        <div class="empty-state py-10">
                            <div class="empty-state-icon">📅</div>
                            <div class="empty-state-title">No attendance data</div>
                            <p class="empty-state-text">No attendance records for the selected filters.</p>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Payroll Expense --}}
            <div class="card">
                <div class="card-header">
                    <div>
                        <h2 class="font-semibold text-slate-900">Monthly Payroll Expense</h2>
                        <p class="text-xs text-slate-500 mt-1">Gross vs Net payroll per month</p>
                    </div>
                </div>
                <div class="card-body">
                    @if ($hasPayroll)
                        <div class="h-72 relative" x-show="!$store.dash.chartsLoaded" x-cloak><div class="skeleton-chart"></div></div>
                        <div class="h-72" x-show="$store.dash.chartsLoaded" x-cloak><canvas id="payrollExpenseChart"></canvas></div>
                    @else
                        <div class="empty-state py-10">
                            <div class="empty-state-icon">💵</div>
                            <div class="empty-state-title">No payroll data</div>
                            <p class="empty-state-text">No payroll records for the selected filters.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- ===== Row 2: Attendance Rate | Payroll Distribution ===== --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            {{-- Attendance Rate --}}
            <div class="card">
                <div class="card-header">
                    <div>
                        <h2 class="font-semibold text-slate-900">Monthly Attendance Rate</h2>
                        <p class="text-xs text-slate-500 mt-1">Present / Late / Absent percentage per month</p>
                    </div>
                </div>
                <div class="card-body">
                    @if ($hasAttendance)
                        <div class="h-72 relative" x-show="!$store.dash.chartsLoaded" x-cloak><div class="skeleton-chart"></div></div>
                        <div class="h-72" x-show="$store.dash.chartsLoaded" x-cloak><canvas id="attendanceRateChart"></canvas></div>
                    @else
                        <div class="empty-state py-10">
                            <div class="empty-state-icon">📊</div>
                            <div class="empty-state-title">No attendance data available</div>
                            <p class="empty-state-text">No attendance records to compute rates.</p>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Payroll Distribution --}}
            <div class="card">
                <div class="card-header">
                    <h2 class="font-semibold text-slate-900">Payroll Distribution</h2>
                    <p class="text-xs text-slate-500 mt-1">Breakdown of payroll components</p>
                </div>
                <div class="card-body">
                    @if ($payrollDistData->isNotEmpty())
                        <div class="h-72 relative" x-show="!$store.dash.chartsLoaded" x-cloak><div class="skeleton-chart"></div></div>
                        <div class="h-72" x-show="$store.dash.chartsLoaded" x-cloak><canvas id="payrollDistChart"></canvas></div>
                    @else
                        <div class="empty-state py-10">
                            <div class="empty-state-icon">🧾</div>
                            <div class="empty-state-title">No payroll distribution</div>
                            <p class="empty-state-text">No payroll components available for the selected filters.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- ===== Department Analytics ===== --}}
        <div class="card">
            <div class="card-header">
                <h2 class="font-semibold text-slate-900">Department Historical Performance</h2>
                <p class="text-xs text-slate-500 mt-1">Employees, attendance rate, and payroll expense by department</p>
            </div>
            <div class="card-body">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <h4 class="text-sm font-medium text-slate-700 mb-4">Employees by Department</h4>
                        <div class="h-64"><canvas id="deptEmpChart"></canvas></div>
                    </div>
                    <div>
                        <h4 class="text-sm font-medium text-slate-700 mb-4">Attendance Rate by Department</h4>
                        @if ($deptAttendanceRate->contains(fn ($d) => $d['rate'] > 0))
                            <div class="h-64"><canvas id="deptRateChart"></canvas></div>
                        @else
                            <div class="empty-state py-10">
                                <div class="empty-state-text">No attendance data per department.</div>
                            </div>
                        @endif
                    </div>
                    <div>
                        <h4 class="text-sm font-medium text-slate-700 mb-4">Payroll Expense by Department</h4>
                        @if ($deptPayroll->contains(fn ($d) => $d['total'] > 0))
                            <div class="h-64"><canvas id="deptPayrollChart"></canvas></div>
                        @else
                            <div class="empty-state py-10">
                                <div class="empty-state-text">No payroll data per department.</div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- ===== Employment Type Analytics ===== --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="font-semibold text-slate-900">Employment Type</h2>
                    <p class="text-xs text-slate-500 mt-1">Regular (permanent) vs Non-regular employees</p>
                </div>
                <div class="card-body">
                    @php
                        $reg = $employmentType->firstWhere('employment_status', 'permanent')->total ?? 0;
                        $nonReg = $employmentType->where('employment_status', '!=', 'permanent')->sum('total');
                        $empTotal = $reg + $nonReg;
                    @endphp
                    @if ($empTotal > 0)
                        <div class="flex flex-col md:flex-row items-center gap-6">
                            <div class="h-56 w-full md:w-1/2"><canvas id="empTypeChart"></canvas></div>
                            <div class="w-full md:w-1/2 space-y-3">
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-slate-600">Regular</span>
                                    <span class="font-semibold">{{ $reg }} <span class="text-slate-400">({{ $empTotal ? round($reg / $empTotal * 100) : 0 }}%)</span></span>
                                </div>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-slate-600">Non-Regular</span>
                                    <span class="font-semibold">{{ $nonReg }} <span class="text-slate-400">({{ $empTotal ? round($nonReg / $empTotal * 100) : 0 }}%)</span></span>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="empty-state py-10">
                            <div class="empty-state-text">No employee type data.</div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h2 class="font-semibold text-slate-900">Personnel Type</h2>
                    <p class="text-xs text-slate-500 mt-1">Teaching vs Non-Teaching personnel</p>
                </div>
                <div class="card-body">
                    @php
                        $teach = $personnelType->firstWhere('classification', 'teaching')->total ?? 0;
                        $nonTeach = $personnelType->where('classification', '!=', 'teaching')->sum('total');
                        $perTotal = $teach + $nonTeach;
                    @endphp
                    @if ($perTotal > 0)
                        <div class="flex flex-col md:flex-row items-center gap-6">
                            <div class="h-56 w-full md:w-1/2"><canvas id="personnelTypeChart"></canvas></div>
                            <div class="w-full md:w-1/2 space-y-3">
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-slate-600">Teaching</span>
                                    <span class="font-semibold">{{ $teach }} <span class="text-slate-400">({{ $perTotal ? round($teach / $perTotal * 100) : 0 }}%)</span></span>
                                </div>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-slate-600">Non-Teaching</span>
                                    <span class="font-semibold">{{ $nonTeach }} <span class="text-slate-400">({{ $perTotal ? round($nonTeach / $perTotal * 100) : 0 }}%)</span></span>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="empty-state py-10">
                            <div class="empty-state-text">No personnel type data.</div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- ===== Make-Up Class Analytics ===== --}}
        <div class="card">
            <div class="card-header">
                <h2 class="font-semibold text-slate-900">Make-Up Class History</h2>
                <p class="text-xs text-slate-500 mt-1">Number of make-up classes and additional compensation per month</p>
            </div>
            <div class="card-body">
                @if ($hasMakeup)
                    <div class="h-72 relative" x-show="!$store.dash.chartsLoaded" x-cloak><div class="skeleton-chart"></div></div>
                    <div class="h-72" x-show="$store.dash.chartsLoaded" x-cloak><canvas id="makeupChart"></canvas></div>
                @else
                    <div class="empty-state py-10">
                        <div class="empty-state-icon">📚</div>
                        <div class="empty-state-title">No make-up class data</div>
                        <p class="empty-state-text">No make-up class records for the selected filters.</p>
                    </div>
                @endif
            </div>
        </div>

        {{-- ===== Yearly Comparison ===== --}}
        @if ($yearlyComparison->count() > 1)
        <div class="card">
            <div class="card-header">
                <h2 class="font-semibold text-slate-900">Year-over-Year HRIS Summary</h2>
                <p class="text-xs text-slate-500 mt-1">Compare attendance rate, payroll, employees, and make-up classes across years</p>
            </div>
            <div class="card-body">
                <div class="h-72 relative" x-show="!$store.dash.chartsLoaded" x-cloak><div class="skeleton-chart"></div></div>
                <div class="h-72" x-show="$store.dash.chartsLoaded" x-cloak><canvas id="yearlyChart"></canvas></div>
            </div>
        </div>
        @endif
        @else
        {{-- ===== Zero-Data State ===== --}}
        <div class="card">
            <div class="card-body py-16 text-center">
                <div class="empty-state-icon text-5xl mb-4">🗄️</div>
                <div class="empty-state-title text-xl">No historical data available</div>
                <p class="empty-state-text mb-6">There are no archived records for the selected filters.</p>
                <a href="{{ route('archives.index') }}" class="btn btn-primary">Reset Filters</a>
            </div>
        </div>
        @endif

        {{-- ===== Archived Records Table ===== --}}
        <div class="card">
            <div class="card-header flex flex-wrap items-center justify-between gap-3">
                <div>
                    <h2 class="font-semibold text-slate-900">Archived Records</h2>
                    <p class="text-xs text-slate-500 mt-1">Searchable snapshots of historical records</p>
                </div>
                <form method="GET" action="{{ route('archives.index') }}" class="flex gap-2 items-center">
                    <input type="hidden" name="year" value="{{ $year }}">
                    <input type="hidden" name="month" value="{{ $month }}">
                    <input type="hidden" name="department_id" value="{{ $departmentId }}">
                    <input type="hidden" name="classification" value="{{ $classification }}">
                    <input type="hidden" name="employment_status" value="{{ $employmentStatus }}">
                    <input type="hidden" name="record_type" value="{{ $recordType }}">
                    <div>
                        <label class="input-label sr-only">Search</label>
                        <input name="search" value="{{ request('search') }}" placeholder="Search archived data..." class="input w-56">
                    </div>
                    <button class="btn btn-primary btn-sm">Search</button>
                </form>
            </div>
            <div class="table-container">
                <table class="data-table">
                    <thead class="table-head">
                        <tr>
                            <th class="table-head-cell">Employee</th>
                            <th class="table-head-cell">Department</th>
                            <th class="table-head-cell">Record Type</th>
                            <th class="table-head-cell">Date</th>
                            <th class="table-head-cell">Payroll Period</th>
                            <th class="table-head-cell">Status</th>
                            <th class="table-head-cell text-right">Amount</th>
                            <th class="table-head-cell">Archived Date</th>
                            <th class="table-head-cell text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($archives as $a)
                        @php
                            $d = is_array($a->data) ? $a->data : [];
                            $empName = data_get($d, 'employee.full_name') ?? data_get($d, 'employee_id') ?? 'Record #'.$a->ref_id;
                            $deptName = data_get($d, 'department.name') ?? data_get($d, 'employee.department.name') ?? '—';
                            $date = data_get($d, 'date') ?? data_get($d, 'class_date');
                            $status = data_get($d, 'status') ?? data_get($d, 'approval_status') ?? data_get($d, 'employment_status');
                            $amount = data_get($d, 'gross_pay') ?? data_get($d, 'net_pay') ?? data_get($d, 'additional_pay') ?? data_get($d, 'monthly_salary');
                        @endphp
                        <tr class="table-body-row">
                            <td class="table-body-cell text-sm font-medium text-slate-900">{{ $empName }}</td>
                            <td class="table-body-cell text-xs text-slate-500">{{ $deptName }}</td>
                            <td class="table-body-cell">
                                <span class="badge badge-info">{{ ucwords(str_replace('_', ' ', $a->archive_type)) }}</span>
                            </td>
                            <td class="table-body-cell text-xs text-slate-500">{{ $date ? \Illuminate\Support\Carbon::parse($date)->format('M d, Y') : '—' }}</td>
                            <td class="table-body-cell font-mono text-xs">{{ $a->period_label }}</td>
                            <td class="table-body-cell">
                                @if ($status)
                                    <span class="badge {{ in_array($status, ['present','released','approved','permanent','complete']) ? 'badge-success' : (in_array($status, ['late','pending','on_hold','summary']) ? 'badge-warning' : 'badge-danger') }}">{{ ucfirst($status) }}</span>
                                @else
                                    <span class="text-slate-400 text-xs">—</span>
                                @endif
                            </td>
                            <td class="table-body-cell text-right font-medium text-slate-900">{{ $amount !== null ? '₱'.number_format((float) $amount, 2) : '—' }}</td>
                            <td class="table-body-cell text-slate-500">{{ $a->archived_at?->format('M d, Y h:i A') }}</td>
                            <td class="table-body-cell text-right">
                                <form method="POST" action="{{ route('archives.destroy', $a) }}" onsubmit="return confirm('Delete archive entry?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="table-body-cell">
                                <div class="empty-state py-12">
                                    <div class="empty-state-icon">🗄️</div>
                                    <div class="empty-state-title">No Archives</div>
                                    <p class="empty-state-text">No archived records match the current filters.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if ($archives->hasPages())
                <div class="card-footer">{{ $archives->links() }}</div>
            @endif
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const colors = {
            primary: '#4f46e5',
            success: '#22c55e',
            warning: '#f59e0b',
            danger: '#ef4444',
            info: '#3b82f6',
            secondary: '#9ca3af',
            violet: '#8b5cf6',
            rose: '#f43f5e',
            amber: '#eab308',
        };
        const monthLabels = {!! json_encode($monthLabels) !!};

        const baseOptions = {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    labels: { font: { family: "'Inter', sans-serif", size: 12, weight: 500 }, color: '#6b7280', padding: 16, usePointStyle: true }
                },
                tooltip: {
                    titleFont: { family: "'Inter', sans-serif", size: 13, weight: 600 },
                    bodyFont: { family: "'Inter', sans-serif", size: 12 },
                    backgroundColor: 'rgba(30, 41, 59, 0.9)',
                    padding: 12,
                }
            }
        };
        const gridOptions = {
            scales: {
                y: { grid: { color: '#e5e7eb', drawBorder: false }, ticks: { font: { family: "'Inter', sans-serif", size: 12 }, color: '#9ca3af' } },
                x: { grid: { display: false }, ticks: { color: '#9ca3af', font: { family: "'Inter', sans-serif", size: 11 } } }
            }
        };

        function buildMonthlyData(collection, key) {
            const data = new Array(12).fill(0);
            collection.forEach(function(item) {
                const idx = parseInt(item.m, 10) - 1;
                if (idx >= 0 && idx < 12) data[idx] = Math.round(item[key] * 100) / 100;
            });
            return data;
        }

        // ===== Attendance Trend =====
        const attTrend = {!! json_encode($attendanceTrend->values()) !!};
        const attTrendCtx = document.getElementById('attendanceTrendChart');
        if (attTrendCtx && attTrend.length > 0) {
            new Chart(attTrendCtx, {
                type: 'line',
                data: {
                    labels: monthLabels,
                    datasets: [
                        { label: 'Present', data: buildMonthlyData(attTrend, 'present'), borderColor: colors.success, backgroundColor: 'rgba(34,197,94,0.1)', tension: 0.4, fill: true, pointRadius: 3, pointBackgroundColor: colors.success },
                        { label: 'Late', data: buildMonthlyData(attTrend, 'late'), borderColor: colors.warning, backgroundColor: 'rgba(245,158,11,0.1)', tension: 0.4, fill: true, pointRadius: 3, pointBackgroundColor: colors.warning },
                        { label: 'Absent', data: buildMonthlyData(attTrend, 'absent'), borderColor: colors.danger, backgroundColor: 'rgba(239,68,68,0.1)', tension: 0.4, fill: true, pointRadius: 3, pointBackgroundColor: colors.danger },
                        { label: 'Half Day', data: buildMonthlyData(attTrend, 'half_day'), borderColor: colors.amber, borderDash: [5,5], pointRadius: 3, pointBackgroundColor: colors.amber },
                    ]
                },
                options: { ...baseOptions, ...gridOptions, plugins: { ...baseOptions.plugins, filler: { propagate: true } } }
            });
        }

        // ===== Payroll Expense =====
        const payHist = {!! json_encode($payrollHistory->values()) !!};
        const payCtx = document.getElementById('payrollExpenseChart');
        if (payCtx && payHist.length > 0) {
            new Chart(payCtx, {
                type: 'bar',
                data: {
                    labels: monthLabels,
                    datasets: [
                        { label: 'Gross Payroll', data: buildMonthlyData(payHist, 'gross'), backgroundColor: colors.primary, borderRadius: 4 },
                        { label: 'Net Payroll', data: buildMonthlyData(payHist, 'net'), backgroundColor: colors.success, borderRadius: 4 },
                    ]
                },
                options: {
                    ...baseOptions, ...gridOptions,
                    plugins: {
                        ...baseOptions.plugins,
                        tooltip: {
                            ...baseOptions.plugins.tooltip,
                            callbacks: {
                                label: function(ctx) { return ctx.dataset.label + ': ₱' + Number(ctx.parsed.y).toLocaleString('en-PH', { maximumFractionDigits: 0 }); }
                            }
                        }
                    },
                    scales: {
                        ...gridOptions.scales,
                        y: { ...gridOptions.scales.y, ticks: { callback: function(v) { return '₱' + (v >= 1000 ? (v/1000) + 'K' : v); } } }
                    }
                }
            });
        }

        // ===== Attendance Rate =====
        const attRate = {!! json_encode($attendanceRate->values()) !!};
        const attRateCtx = document.getElementById('attendanceRateChart');
        if (attRateCtx && attRate.length > 0) {
            const present = attRate.map(function(r) { return r.total ? Math.round((r.present / r.total) * 1000) / 10 : 0; });
            const late = attRate.map(function(r) { return r.total ? Math.round((r.late / r.total) * 1000) / 10 : 0; });
            const absent = attRate.map(function(r) { return r.total ? Math.round((r.absent / r.total) * 1000) / 10 : 0; });
            new Chart(attRateCtx, {
                type: 'line',
                data: {
                    labels: attRate.map(function(r) { return monthLabels[parseInt(r.m,10)-1]; }),
                    datasets: [
                        { label: 'Present %', data: present, borderColor: colors.success, backgroundColor: 'rgba(34,197,94,0.1)', tension: 0.4, fill: true, pointRadius: 3 },
                        { label: 'Late %', data: late, borderColor: colors.warning, tension: 0.4, pointRadius: 3, borderDash: [5,5] },
                        { label: 'Absent %', data: absent, borderColor: colors.danger, tension: 0.4, pointRadius: 3, borderDash: [5,5] },
                    ]
                },
                options: {
                    ...baseOptions, ...gridOptions,
                    scales: {
                        ...gridOptions.scales,
                        y: { ...gridOptions.scales.y, suggestedMax: 100, ticks: { ...gridOptions.scales.y.ticks, callback: function(v) { return v + '%'; } } }
                    }
                }
            });
        }

        // ===== Payroll Distribution (donut) =====
        const payDist = {!! json_encode($payrollDistData) !!};
        const payDistCtx = document.getElementById('payrollDistChart');
        if (payDistCtx && payDist.length > 0) {
            const distColors = [colors.primary, colors.success, colors.warning, colors.violet, colors.danger];
            new Chart(payDistCtx, {
                type: 'doughnut',
                data: {
                    labels: payDist.map(function(d) { return d.label; }),
                    datasets: [{
                        data: payDist.map(function(d) { return d.value; }),
                        backgroundColor: payDist.map(function(_, i) { return distColors[i % distColors.length]; }),
                        borderColor: '#fff', borderWidth: 2,
                    }]
                },
                options: {
                    ...baseOptions,
                    scales: undefined,
                    plugins: {
                        ...baseOptions.plugins,
                        legend: { position: 'bottom' },
                        tooltip: {
                            ...baseOptions.plugins.tooltip,
                            callbacks: {
                                label: function(ctx) {
                                    const total = ctx.dataset.data.reduce(function(a,b){ return a+b; },0);
                                    const pct = total ? ((ctx.parsed / total) * 100).toFixed(1) : 0;
                                    return ' ₱' + Number(ctx.parsed).toLocaleString('en-PH', { maximumFractionDigits: 0 }) + ' (' + pct + '%)';
                                }
                            }
                        }
                    }
                }
            });
        }

        // ===== Department: Employees =====
        const deptEmp = {!! json_encode($deptEmployees) !!};
        const deptEmpCtx = document.getElementById('deptEmpChart');
        if (deptEmpCtx && deptEmp.length > 0) {
            new Chart(deptEmpCtx, {
                type: 'bar',
                data: {
                    labels: deptEmp.map(function(d) { return d.name; }),
                    datasets: [{ label: 'Employees', data: deptEmp.map(function(d) { return d.employees_count; }), backgroundColor: colors.primary, borderRadius: 4 }]
                },
                options: {
                    indexAxis: 'y', responsive: true, maintainAspectRatio: false,
                    plugins: { legend: { display: false }, tooltip: baseOptions.plugins.tooltip },
                    scales: {
                        x: { grid: { color: '#e5e7eb' }, ticks: { color: '#9ca3af', font: { size: 11 } } },
                        y: { grid: { display: false }, ticks: { color: '#6b7280', font: { size: 11 } } }
                    }
                }
            });
        }

        // ===== Department: Attendance Rate =====
        const deptRate = {!! json_encode($deptAttendanceRate) !!};
        const deptRateCtx = document.getElementById('deptRateChart');
        if (deptRateCtx && deptRate.length > 0) {
            new Chart(deptRateCtx, {
                type: 'bar',
                data: {
                    labels: deptRate.map(function(d) { return d.name; }),
                    datasets: [{ label: 'Attendance Rate %', data: deptRate.map(function(d) { return d.rate; }), backgroundColor: colors.success, borderRadius: 4 }]
                },
                options: {
                    indexAxis: 'y', responsive: true, maintainAspectRatio: false,
                    plugins: { legend: { display: false }, tooltip: baseOptions.plugins.tooltip },
                    scales: {
                        x: { grid: { color: '#e5e7eb' }, suggestedMax: 100, ticks: { color: '#9ca3af', font: { size: 11 }, callback: function(v) { return v + '%'; } } },
                        y: { grid: { display: false }, ticks: { color: '#6b7280', font: { size: 11 } } }
                    }
                }
            });
        }

        // ===== Department: Payroll =====
        const deptPay = {!! json_encode($deptPayroll) !!};
        const deptPayCtx = document.getElementById('deptPayrollChart');
        if (deptPayCtx && deptPay.length > 0) {
            new Chart(deptPayCtx, {
                type: 'bar',
                data: {
                    labels: deptPay.map(function(d) { return d.name; }),
                    datasets: [{ label: 'Payroll Expense', data: deptPay.map(function(d) { return d.total; }), backgroundColor: colors.violet, borderRadius: 4 }]
                },
                options: {
                    indexAxis: 'y', responsive: true, maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: { ...baseOptions.plugins.tooltip, callbacks: { label: function(ctx) { return '₱' + Number(ctx.parsed.x).toLocaleString('en-PH', { maximumFractionDigits: 0 }); } } }
                    },
                    scales: {
                        x: { grid: { color: '#e5e7eb' }, ticks: { color: '#9ca3af', font: { size: 11 }, callback: function(v) { return '₱' + (v >= 1000 ? (v/1000) + 'K' : v); } } },
                        y: { grid: { display: false }, ticks: { color: '#6b7280', font: { size: 11 } } }
                    }
                }
            });
        }

        // ===== Employment Type (donut) =====
        const empTypeCtx = document.getElementById('empTypeChart');
        if (empTypeCtx) {
            const reg = {{ $reg }};
            const nonReg = {{ $nonReg }};
            if (reg + nonReg > 0) {
                new Chart(empTypeCtx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Regular', 'Non-Regular'],
                        datasets: [{ data: [reg, nonReg], backgroundColor: [colors.primary, colors.secondary], borderColor: '#fff', borderWidth: 2 }]
                    },
                    options: { ...baseOptions, scales: undefined, plugins: { ...baseOptions.plugins, legend: { position: 'bottom' } } }
                });
            }
        }

        // ===== Personnel Type (donut) =====
        const personnelTypeCtx = document.getElementById('personnelTypeChart');
        if (personnelTypeCtx) {
            const teach = {{ $teach }};
            const nonTeach = {{ $nonTeach }};
            if (teach + nonTeach > 0) {
                new Chart(personnelTypeCtx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Teaching', 'Non-Teaching'],
                        datasets: [{ data: [teach, nonTeach], backgroundColor: [colors.success, colors.info], borderColor: '#fff', borderWidth: 2 }]
                    },
                    options: { ...baseOptions, scales: undefined, plugins: { ...baseOptions.plugins, legend: { position: 'bottom' } } }
                });
            }
        }

        // ===== Make-Up Class History =====
        const makeupHist = {!! json_encode($makeupHistory->values()) !!};
        const makeupCtx = document.getElementById('makeupChart');
        if (makeupCtx && makeupHist.length > 0) {
            new Chart(makeupCtx, {
                data: {
                    labels: makeupHist.map(function(r) { return monthLabels[parseInt(r.m,10)-1]; }),
                    datasets: [
                        { type: 'bar', label: 'Make-Up Classes', data: makeupHist.map(function(r) { return r.count; }), backgroundColor: colors.amber, yAxisID: 'yCount', borderRadius: 4 },
                        { type: 'line', label: 'Additional Pay (₱)', data: makeupHist.map(function(r) { return Math.round(r.pay); }), borderColor: colors.primary, yAxisID: 'yPay', tension: 0.4, pointRadius: 3 },
                    ]
                },
                options: {
                    ...baseOptions,
                    scales: {
                        yCount: { position: 'left', grid: { color: '#e5e7eb' }, ticks: { color: '#9ca3af', font: { size: 11 } }, title: { display: true, text: 'Classes', color: '#9ca3af' } },
                        yPay: { position: 'right', grid: { display: false }, ticks: { color: '#9ca3af', font: { size: 11 }, callback: function(v) { return '₱' + (v >= 1000 ? (v/1000) + 'K' : v); } }, title: { display: true, text: 'Additional Pay', color: '#9ca3af' } },
                        x: { grid: { display: false }, ticks: { color: '#9ca3af', font: { size: 11 } } }
                    }
                }
            });
        }

        // ===== Yearly Comparison =====
        const yearly = {!! json_encode($yearlyComparison) !!};
        const yearlyCtx = document.getElementById('yearlyChart');
        if (yearlyCtx && yearly.length > 0) {
            const years = yearly.map(function(r) { return 'CY ' + r.year; });
            new Chart(yearlyCtx, {
                data: {
                    labels: years,
                    datasets: [
                        { type: 'bar', label: 'Payroll (₱)', data: yearly.map(function(r) { return r.payroll; }), backgroundColor: colors.primary, yAxisID: 'yPay', borderRadius: 4 },
                        { type: 'bar', label: 'Employees', data: yearly.map(function(r) { return r.employees; }), backgroundColor: colors.info, yAxisID: 'yEmp', borderRadius: 4 },
                        { type: 'bar', label: 'Make-Up Classes', data: yearly.map(function(r) { return r.makeup; }), backgroundColor: colors.warning, yAxisID: 'yEmp', borderRadius: 4 },
                        { type: 'line', label: 'Attendance Rate %', data: yearly.map(function(r) { return r.attendance_rate; }), borderColor: colors.success, yAxisID: 'yRate', tension: 0.4, pointRadius: 4 },
                    ]
                },
                options: {
                    ...baseOptions,
                    scales: {
                        yPay: { position: 'left', grid: { color: '#e5e7eb' }, ticks: { color: '#9ca3af', font: { size: 11 }, callback: function(v) { return '₱' + (v >= 1000 ? (v/1000) + 'K' : v); } } },
                        yEmp: { position: 'right', grid: { display: false }, ticks: { color: '#9ca3af', font: { size: 11 } } },
                        yRate: { position: 'right', grid: { display: false }, ticks: { color: '#9ca3af', font: { size: 11 }, callback: function(v) { return v + '%'; } } },
                        x: { grid: { display: false }, ticks: { color: '#9ca3af', font: { size: 11 } } }
                    }
                }
            });
        }

        // Reveal charts
        if (typeof window.Alpine !== 'undefined') {
            setTimeout(() => { window.Alpine.store('dash').chartsLoaded = true; }, 50);
        }
    });
    </script>
</x-app-layout>
