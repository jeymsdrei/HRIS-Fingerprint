<?php

namespace App\Services;

use App\Models\Archive;
use App\Models\Attendance;
use App\Models\Department;
use App\Models\Employee;
use App\Models\MakeUpClass;
use App\Models\Payroll;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

/**
 * Reusable service that applies the SAME filtering logic as the Archive
 * dashboard page and prepares consistent datasets for the PDF, Excel, CSV
 * and Print exporters. This is the single source of truth for archive exports.
 */
class ArchiveReportService
{
    public int $year;

    public int $month;

    public int $departmentId;

    public string $classification;

    public string $employmentStatus;

    public string $recordType;

    public bool $exportAll;

    public ?Carbon $from;

    public ?Carbon $to;

    public array $monthLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

    public function __construct(array $filters = [])
    {
        $this->year = (int) ($filters['year'] ?? now()->year);
        $this->month = (int) ($filters['month'] ?? 0);
        $this->departmentId = (int) ($filters['department_id'] ?? 0);
        $this->classification = (string) ($filters['classification'] ?? '');
        $this->employmentStatus = (string) ($filters['employment_status'] ?? '');
        $this->recordType = (string) ($filters['record_type'] ?? '');
        $this->exportAll = (bool) ($filters['export_all'] ?? false);
        $this->from = ! empty($filters['from']) ? Carbon::parse($filters['from']) : null;
        $this->to = ! empty($filters['to']) ? Carbon::parse($filters['to']) : null;
    }

    public function startDate(): Carbon
    {
        return $this->from ? $this->from->copy()->startOfDay() : Carbon::create($this->year, 1, 1)->startOfDay();
    }

    public function endDate(): Carbon
    {
        return $this->to ? $this->to->copy()->endOfDay() : Carbon::create($this->year, 12, 31)->endOfDay();
    }

    public function organization(): array
    {
        return [
            'name' => Setting::get('company_name', 'Human Resource Information System'),
            'address' => Setting::get('company_address', ''),
        ];
    }

    /**
     * Human-readable labels for the report filters.
     */
    public function filterLabels(): array
    {
        $dept = $this->departmentId
            ? optional(Department::find($this->departmentId))->name
            : null;

        return [
            'Year' => $this->exportAll ? 'All Years' : (string) $this->year,
            'Month' => $this->exportAll || ! $this->month ? 'All Months' : $this->monthLabels[$this->month - 1],
            'Department' => $this->exportAll ? 'All Departments' : ($dept ?? 'All Departments'),
            'Personnel Type' => $this->exportAll ? 'All' : (ucwords(str_replace('_', ' ', $this->classification)) ?: 'All'),
            'Employment Type' => $this->exportAll ? 'All' : (ucwords(str_replace('_', ' ', $this->employmentStatus)) ?: 'All'),
            'Record Type' => $this->exportAll ? 'All Records' : (ucwords(str_replace('_', ' ', $this->recordType)) ?: 'All Records'),
            'Date Range' => $this->exportAll
                ? 'All Dates'
                : $this->startDate()->format('M d, Y').' – '.$this->endDate()->format('M d, Y'),
        ];
    }

    /**
     * Filtered archive records (unpaginated — returns ALL matching records).
     */
    public function archives(): Collection
    {
        $q = Archive::with('archiver');

        if ($this->exportAll) {
            return $q->orderBy('archived_at')->get();
        }

        return $q
            ->when($this->recordType, fn ($q, $t) => $q->where('archive_type', $t))
            ->when($this->year, fn ($q, $y) => $q->where('period_label', 'like', "{$y}%"))
            ->when($this->month, fn ($q, $m) => $q->where('period_label', 'like', sprintf('%04d-%02d%%', $this->year, $m)))
            ->orderBy('archived_at')
            ->get();
    }

    /**
     * KPI summary statistics (uses the same source-of-truth tables as the dashboard).
     */
    public function summary(): array
    {
        $start = $this->startDate()->toDateString();
        $end = $this->endDate()->toDateString();

        return [
            'archived_employees' => Archive::where('archive_type', 'employee')->count(),
            'attendance_records' => Attendance::whereBetween('date', [$start, $end])
                ->when($this->departmentId, fn ($q, $id) => $q->where('department_id', $id))
                ->count(),
            'payroll_records' => Payroll::whereHas('period', fn ($q) => $q->whereBetween('pay_date', [$start, $end]))
                ->when($this->departmentId, fn ($q, $id) => $q->whereHas('employee', fn ($eq) => $eq->where('department_id', $id)))
                ->count(),
            'payroll_amount' => round(Payroll::whereHas('period', fn ($q) => $q->whereBetween('pay_date', [$start, $end]))
                ->when($this->departmentId, fn ($q, $id) => $q->whereHas('employee', fn ($eq) => $eq->where('department_id', $id)))
                ->sum('gross_pay'), 2),
            'total_deductions' => round(Payroll::whereHas('period', fn ($q) => $q->whereBetween('pay_date', [$start, $end]))
                ->when($this->departmentId, fn ($q, $id) => $q->whereHas('employee', fn ($eq) => $eq->where('department_id', $id)))
                ->sum('total_deductions'), 2),
            'makeup_records' => MakeUpClass::whereBetween('class_date', [$start, $end])
                ->when($this->departmentId, fn ($q, $id) => $q->whereHas('employee', fn ($eq) => $eq->where('department_id', $id)))
                ->count(),
        ];
    }

    /**
     * Attendance trend per month (present/late/half_day/absent).
     */
    public function attendanceTrend(): Collection
    {
        $start = $this->startDate()->toDateString();
        $end = $this->endDate()->toDateString();

        return Attendance::whereBetween('date', [$start, $end])
            ->when($this->departmentId, fn ($q, $id) => $q->where('department_id', $id))
            ->selectRaw('strftime("%m", date) as m,
                SUM(CASE WHEN status = "present" THEN 1 ELSE 0 END) as present,
                SUM(CASE WHEN status = "late" THEN 1 ELSE 0 END) as late,
                SUM(CASE WHEN status = "half_day" THEN 1 ELSE 0 END) as half_day,
                SUM(CASE WHEN status = "absent" THEN 1 ELSE 0 END) as absent')
            ->groupBy('m')
            ->orderBy('m')
            ->get()
            ->keyBy('m');
    }

    /**
     * Payroll history per month (gross/net/deductions/benefits).
     */
    public function payrollHistory(): Collection
    {
        $start = $this->startDate()->toDateString();
        $end = $this->endDate()->toDateString();

        return Payroll::whereHas('period', fn ($q) => $q->whereBetween('pay_date', [$start, $end]))
            ->when($this->departmentId, fn ($q, $id) => $q->whereHas('employee', fn ($eq) => $eq->where('department_id', $id)))
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
    }

    /**
     * Department analytics for charts.
     */
    public function departmentStats(): Collection
    {
        $start = $this->startDate()->toDateString();
        $end = $this->endDate()->toDateString();

        return Department::get(['id', 'name'])->map(function ($d) use ($start, $end) {
            $total = Attendance::where('department_id', $d->id)->whereBetween('date', [$start, $end])->count();
            $present = Attendance::where('department_id', $d->id)->whereBetween('date', [$start, $end])
                ->whereIn('status', ['present', 'late', 'half_day'])->count();
            $payroll = Payroll::whereHas('employee', fn ($q) => $q->where('department_id', $d->id))
                ->whereHas('period', fn ($q) => $q->whereBetween('pay_date', [$start, $end]))
                ->sum('gross_pay');

            return [
                'name' => $d->name,
                'employees' => $d->employees()->count(),
                'attendance_rate' => $total > 0 ? round($present / $total * 100, 1) : 0,
                'payroll' => round($payroll, 2),
            ];
        })->values();
    }

    /**
     * Build report datasets for the printable/PDF report.
     */
    public function reportDataset(): array
    {
        $summary = $this->summary();
        $attTrend = $this->attendanceTrend();
        $payHist = $this->payrollHistory();
        $deptStats = $this->departmentStats();
        $archives = $this->archives();

        // Chart arrays (12 months, zero-filled)
        $attendanceChart = [
            'labels' => $this->monthLabels,
            'present' => $this->monthlySeries($attTrend, 'present'),
            'late' => $this->monthlySeries($attTrend, 'late'),
            'half_day' => $this->monthlySeries($attTrend, 'half_day'),
            'absent' => $this->monthlySeries($attTrend, 'absent'),
        ];
        $payrollChart = [
            'labels' => $this->monthLabels,
            'gross' => $this->monthlySeries($payHist, 'gross'),
            'net' => $this->monthlySeries($payHist, 'net'),
        ];

        return [
            'filters' => $this->filterLabels(),
            'summary' => $summary,
            'attendance_chart' => $attendanceChart,
            'payroll_chart' => $payrollChart,
            'department_stats' => $deptStats,
            'archives' => $archives,
            'organization' => $this->organization(),
            'generated_by' => Auth::user()?->name ?? 'System',
            'generated_at' => now(),
        ];
    }

    protected function monthlySeries(Collection $keyed, string $key): array
    {
        $data = array_fill(0, 12, 0);
        foreach ($keyed as $item) {
            $idx = (int) $item['m'] - 1;
            if ($idx >= 0 && $idx < 12) {
                $data[$idx] = round((float) $item[$key], 2);
            }
        }

        return $data;
    }
}
