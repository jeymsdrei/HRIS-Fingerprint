<?php

namespace App\Http\Controllers;

use App\Exports\ArchiveExport;
use App\Models\Archive;
use App\Models\Attendance;
use App\Models\Department;
use App\Models\Employee;
use App\Models\MakeUpClass;
use App\Models\Payroll;
use App\Services\ArchiveReportService;
use App\Services\ArchiveService;
use App\Services\AttendanceService;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class ArchiveController extends Controller
{
    public function index(Request $request)
    {
        // ---- Filters ----
        $year = $request->integer('year', now()->year);
        $month = $request->integer('month', 0); // 0 = all months
        $departmentId = $request->integer('department_id', 0);
        $classification = $request->get('classification', '');
        $employmentStatus = $request->get('employment_status', '');
        $recordType = $request->get('record_type', '');
        $from = $request->get('from') ? Carbon::parse($request->get('from')) : null;
        $to = $request->get('to') ? Carbon::parse($request->get('to')) : null;

        // Effective date range for source-of-truth queries
        $startDate = $from ? $from->copy()->startOfDay() : Carbon::create($year, 1, 1)->startOfDay();
        $endDate = $to ? $to->copy()->endOfDay() : Carbon::create($year, 12, 31)->endOfDay();

        // ---- Filter dropdown data ----
        $years = collect(range(now()->year - 5, now()->year))->reverse()->values();
        $departments = Department::orderBy('name')->get(['id', 'name']);

        // ---- Employee scope helper (shared across queries) ----
        $employeeScope = function ($q) use ($departmentId, $classification, $employmentStatus) {
            $q->where('is_active', true)
                ->when($departmentId, fn ($q, $id) => $q->where('department_id', $id))
                ->when($classification, fn ($q, $c) => $q->where('classification', $c))
                ->when($employmentStatus, fn ($q, $s) => $q->where('employment_status', $s));
        };

        // ---- KPIs & attendance aggregates (per employee-day so per-schedule
        // teaching rows collapse into a single day status) ----
        $dayStatuses = app(AttendanceService::class)->dayStatusRows($startDate, $endDate, $departmentId ?: null);

        $kpis = [
            'archived_employees' => Archive::where('archive_type', 'employee')->count(),
            'attendance_records' => $dayStatuses->count(),
            'payroll_records' => Payroll::whereHas('period', fn ($q) => $q->whereBetween('pay_date', [$startDate->toDateString(), $endDate->toDateString()]))
                ->when($departmentId, fn ($q, $id) => $q->whereHas('employee', fn ($eq) => $eq->where('department_id', $id)))
                ->count(),
            'payroll_amount' => round(Payroll::whereHas('period', fn ($q) => $q->whereBetween('pay_date', [$startDate->toDateString(), $endDate->toDateString()]))
                ->when($departmentId, fn ($q, $id) => $q->whereHas('employee', fn ($eq) => $eq->where('department_id', $id)))
                ->sum('gross_pay'), 2),
            'total_deductions' => round(Payroll::whereHas('period', fn ($q) => $q->whereBetween('pay_date', [$startDate->toDateString(), $endDate->toDateString()]))
                ->when($departmentId, fn ($q, $id) => $q->whereHas('employee', fn ($eq) => $eq->where('department_id', $id)))
                ->sum('total_deductions'), 2),
            'makeup_records' => MakeUpClass::whereBetween('class_date', [$startDate->toDateString(), $endDate->toDateString()])
                ->when($departmentId, fn ($q, $id) => $q->whereHas('employee', fn ($eq) => $eq->where('department_id', $id)))
                ->count(),
        ];

        // ---- Attendance Trend (per month) ----
        $attendanceTrend = $dayStatuses
            ->groupBy('month')
            ->map(fn ($rows) => [
                'm' => $rows->first()['month'],
                'present' => $rows->where('status', 'present')->count(),
                'late' => $rows->where('status', 'late')->count(),
                'half_day' => $rows->where('status', 'half_day')->count(),
                'absent' => $rows->where('status', 'absent')->count(),
            ])
            ->keyBy('m');

        // ---- Attendance Rate (per month) ----
        $attendanceRate = $dayStatuses
            ->groupBy('month')
            ->map(fn ($rows) => [
                'm' => $rows->first()['month'],
                'present' => $rows->whereIn('status', ['present', 'late', 'half_day'])->count(),
                'late' => $rows->where('status', 'late')->count(),
                'absent' => $rows->where('status', 'absent')->count(),
                'total' => $rows->count(),
            ])
            ->keyBy('m');

        // ---- Payroll History (per month) ----
        $payrollHistory = Payroll::whereHas('period', fn ($q) => $q->whereBetween('pay_date', [$startDate->toDateString(), $endDate->toDateString()]))
            ->when($departmentId, fn ($q, $id) => $q->whereHas('employee', fn ($eq) => $eq->where('department_id', $id)))
            ->join('payroll_periods as period', 'period.id', '=', 'payrolls.payroll_period_id')
            ->selectRaw('strftime("%m", period.pay_date) as m,
                SUM(payrolls.gross_pay) as gross,
                SUM(payrolls.total_deductions) as deductions,
                SUM(payrolls.benefits) as benefits,
                SUM(payrolls.net_pay) as net')
            ->groupBy('m')
            ->orderBy('m')
            ->get()
            ->keyBy('m');

        // ---- Payroll Distribution (only non-zero categories) ----
        $payrollDist = Payroll::whereHas('period', fn ($q) => $q->whereBetween('pay_date', [$startDate->toDateString(), $endDate->toDateString()]))
            ->when($departmentId, fn ($q, $id) => $q->whereHas('employee', fn ($eq) => $eq->where('department_id', $id)))
            ->selectRaw('SUM(basic_pay) as basic,
                SUM(overtime_pay) as overtime,
                SUM(make_up_pay) as makeup,
                SUM(benefits) as benefits,
                SUM(total_deductions) as deductions')
            ->first();

        $payrollDistData = collect();
        if ($payrollDist) {
            $map = [
                'Basic Pay' => (float) $payrollDist->basic,
                'Overtime' => (float) $payrollDist->overtime,
                'Make-Up Classes' => (float) $payrollDist->makeup,
                'Benefits' => (float) $payrollDist->benefits,
                'Deductions' => (float) $payrollDist->deductions,
            ];
            foreach ($map as $label => $value) {
                if ($value > 0) {
                    $payrollDistData->push(['label' => $label, 'value' => $value]);
                }
            }
        }

        // ---- Department Analytics ----
        $deptEmployees = Department::withCount('employees')->orderBy('employees_count', 'desc')->get(['id', 'name', 'employees_count']);
        $deptDayStats = $dayStatuses->groupBy('department_id')->map(fn ($rows) => [
            'total' => $rows->count(),
            'present' => $rows->whereIn('status', ['present', 'late', 'half_day'])->count(),
        ]);
        $deptAttendanceRate = Department::get(['id', 'name'])->map(function ($d) use ($deptDayStats) {
            $total = (int) ($deptDayStats->get($d->id)['total'] ?? 0);
            $present = (int) ($deptDayStats->get($d->id)['present'] ?? 0);

            return [
                'name' => $d->name,
                'rate' => $total > 0 ? round($present / $total * 100, 1) : 0,
            ];
        })->sortByDesc('rate')->values();

        $deptPayroll = Department::get(['id', 'name'])->map(function ($d) use ($startDate, $endDate) {
            $total = Payroll::whereHas('employee', fn ($q) => $q->where('department_id', $d->id))
                ->whereHas('period', fn ($q) => $q->whereBetween('pay_date', [$startDate->toDateString(), $endDate->toDateString()]))
                ->sum('gross_pay');

            return [
                'name' => $d->name,
                'total' => round($total, 2),
            ];
        })->sortByDesc('total')->values();

        // ---- Employment Type Analytics ----
        $employmentType = Employee::where('is_active', true)
            ->when($departmentId, fn ($q, $id) => $q->where('department_id', $id))
            ->selectRaw('employment_status, COUNT(*) as total')
            ->groupBy('employment_status')
            ->get();

        $personnelType = Employee::where('is_active', true)
            ->when($departmentId, fn ($q, $id) => $q->where('department_id', $id))
            ->selectRaw('classification, COUNT(*) as total')
            ->groupBy('classification')
            ->get();

        // ---- Make-Up Class History (per month) ----
        $makeupHistory = MakeUpClass::whereBetween('class_date', [$startDate->toDateString(), $endDate->toDateString()])
            ->when($departmentId, fn ($q, $id) => $q->whereHas('employee', fn ($eq) => $eq->where('department_id', $id)))
            ->selectRaw('strftime("%m", class_date) as m, COUNT(*) as count, SUM(additional_pay) as pay')
            ->groupBy('m')
            ->orderBy('m')
            ->get()
            ->keyBy('m');

        // ---- Yearly Comparison (only if >1 year has data) ----
        $yearlyComparison = collect();
        $availableYears = Attendance::selectRaw('strftime("%Y", date) as y')
            ->groupBy('y')
            ->orderBy('y')
            ->pluck('y');

        if ($availableYears->count() > 1) {
            $yearDayStats = $dayStatuses->groupBy('year')->map(fn ($rows) => [
                'total' => $rows->count(),
                'present' => $rows->whereIn('status', ['present', 'late', 'half_day'])->count(),
            ]);
            $yearlyComparison = $availableYears->map(function ($y) use ($yearDayStats) {
                $total = (int) ($yearDayStats->get($y)['total'] ?? 0);
                $present = (int) ($yearDayStats->get($y)['present'] ?? 0);

                return [
                    'year' => $y,
                    'attendance_rate' => $total > 0 ? round($present / $total * 100, 1) : 0,
                    'payroll' => round(Payroll::whereHas('period', fn ($q) => $q->whereYear('pay_date', $y))->sum('gross_pay'), 2),
                    'employees' => Employee::whereYear('date_hired', '<=', $y.'-12-31')->where(function ($q) use ($y) {
                        $q->whereNull('date_resigned')->orWhereYear('date_resigned', '>=', $y);
                    })->count(),
                    'makeup' => MakeUpClass::whereYear('class_date', $y)->count(),
                ];
            })->values();
        }

        // ---- Archived Records Table ----
        $archives = Archive::with('archiver')
            ->when($recordType, fn ($q, $t) => $q->where('archive_type', $t))
            ->when($year, fn ($q, $y) => $q->where('period_label', 'like', "{$y}%"))
            ->when($month, fn ($q, $m) => $q->where('period_label', 'like', sprintf('%04d-%02d%%', $year, $m)))
            ->when($request->search, fn ($q, $s) => $q->where('data', 'like', "%{$s}%"))
            ->orderByDesc('archived_at')
            ->paginate(20)
            ->withQueryString();

        // ---- Month labels ----
        $monthLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        return view('archive.index', compact(
            'archives', 'years', 'departments',
            'year', 'month', 'departmentId', 'classification', 'employmentStatus', 'recordType', 'from', 'to',
            'kpis', 'attendanceTrend', 'attendanceRate', 'payrollHistory', 'payrollDistData',
            'deptEmployees', 'deptAttendanceRate', 'deptPayroll',
            'employmentType', 'personnelType', 'makeupHistory', 'yearlyComparison',
            'monthLabels', 'startDate', 'endDate'
        ));
    }

    public function run(Request $request, ArchiveService $service)
    {
        $request->validate([
            'month' => 'required|date_format:Y-m',
        ]);

        $results = $service->archivePeriod($request->month);
        $total = array_sum($results);

        return back()->with('success', "Archived {$total} records for {$request->month}.");
    }

    public function destroy(Archive $archive)
    {
        $archive->delete();

        return back()->with('success', 'Archive entry removed.');
    }

    /**
     * Export / print the archive data currently matching the filters.
     * Formats: print, pdf, excel, csv. Scope: filtered | all.
     */
    public function export(Request $request)
    {
        $format = $request->get('format', 'pdf');
        $exportAll = (bool) $request->boolean('export_all', false);

        // Server-side validation of format + scope.
        if (! in_array($format, ['print', 'pdf', 'excel', 'csv'])) {
            abort(400, 'Invalid export format.');
        }

        $filters = $request->merge(['export_all' => $exportAll])->all();
        $service = new ArchiveReportService($filters);
        $dataset = $service->reportDataset();

        if ($dataset['archives']->isEmpty()) {
            return back()->with('error', 'No archived records found. There are no records matching the selected filters.');
        }

        $filename = $this->archiveExportFilename($service, $format);

        switch ($format) {
            case 'pdf':
                $pdf = Pdf::loadView('archive.export_pdf', ['report' => $dataset])
                    ->setPaper('a4', 'landscape');

                return $pdf->download($filename.'.pdf');
            case 'excel':
                return Excel::download(new ArchiveExport($dataset), $filename.'.xlsx');
            case 'csv':
                return $this->streamArchiveCsv($filename.'.csv', $dataset);
            case 'print':
                return view('archive.print', ['report' => $dataset]);
        }

        abort(400, 'Invalid export format.');
    }

    private function archiveExportFilename(ArchiveReportService $service, string $format): string
    {
        $parts = ['HRIS', 'Archive'];
        if ($service->exportAll) {
            $parts[] = 'All_Records';
        } elseif ($service->recordType) {
            $parts[] = ucwords(str_replace('_', ' ', $service->recordType));
        }
        if (! $service->exportAll && $service->departmentId) {
            $parts[] = str_replace(' ', '_', (string) (Department::find($service->departmentId)?->name ?? 'Department'));
        }
        if (! $service->exportAll) {
            $parts[] = $service->year;
        }
        if ($service->exportAll) {
            $parts[] = str_replace('_', '', Str::slug(now()->format('Y-m-d')));
        }

        return implode('_', array_map(fn ($p) => Str::slug($p), $parts));
    }

    private function streamArchiveCsv(string $filename, array $dataset)
    {
        $callback = function () use ($dataset) {
            $handle = fopen('php://output', 'w');
            // UTF-8 BOM for Excel compatibility
            fwrite($handle, "\xEF\xBB\xBF");
            fputcsv($handle, ['Archive & Historical Report']);
            fputcsv($handle, []);
            fputcsv($handle, ['Filter', 'Value']);
            foreach ($dataset['filters'] as $label => $value) {
                fputcsv($handle, [$label, $value]);
            }
            fputcsv($handle, []);
            fputcsv($handle, ['Archived Records']);
            fputcsv($handle, ['Employee', 'Department', 'Record Type', 'Date', 'Period', 'Status', 'Amount', 'Archived At']);
            foreach ($dataset['archives'] as $a) {
                $d = is_array($a->data) ? $a->data : [];
                $amount = data_get($d, 'gross_pay') ?? data_get($d, 'net_pay') ?? data_get($d, 'additional_pay') ?? data_get($d, 'monthly_salary');
                $status = data_get($d, 'status') ?? data_get($d, 'approval_status') ?? data_get($d, 'employment_status');
                fputcsv($handle, [
                    data_get($d, 'employee.full_name') ?? data_get($d, 'employee_id') ?? 'Record #'.$a->ref_id,
                    data_get($d, 'department.name') ?? data_get($d, 'employee.department.name') ?? '—',
                    ucwords(str_replace('_', ' ', $a->archive_type)),
                    data_get($d, 'date') ?? data_get($d, 'class_date') ?? '—',
                    $a->period_label,
                    $status ?? '—',
                    $amount !== null ? '₱'.number_format((float) $amount, 2) : '—',
                    $a->archived_at?->format('M d, Y'),
                ]);
            }
            fclose($handle);
        };

        return response()->streamDownload($callback, $filename, ['Content-Type' => 'text/csv; charset=UTF-8']);
    }
}
