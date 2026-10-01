<?php

namespace App\Services;

use App\Models\Attendance;
use App\Models\Department;
use App\Models\Employee;
use App\Models\EmployeeBenefit;
use App\Models\Loan;
use App\Models\MakeUpClass;
use App\Models\Payroll;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class ReportService
{
    private array $filters;

    public function __construct(array $filters = [])
    {
        $this->filters = $filters;
    }

    private function departmentId(): int|string|null
    {
        return $this->filters['department_id'] ?? null;
    }

    private function classification(): ?string
    {
        return $this->filters['classification'] ?? null;
    }

    private function employmentStatus(): ?string
    {
        return $this->filters['employment_status'] ?? null;
    }

    private function from(): ?Carbon
    {
        return isset($this->filters['from']) ? Carbon::parse($this->filters['from']) : null;
    }

    private function to(): ?Carbon
    {
        return isset($this->filters['to']) ? Carbon::parse($this->filters['to']) : null;
    }

    private function scopeEmployees(Builder $q): Builder
    {
        return $q->where('is_active', true)
            ->when($this->departmentId(), fn ($q, $id) => $q->where('department_id', $id))
            ->when($this->classification(), fn ($q, $c) => $q->where('classification', $c))
            ->when($this->employmentStatus(), fn ($q, $s) => $q->where('employment_status', $s));
    }

    /**
     * Attendance report: one row per attendance within the range.
     */
    public function attendanceReport(): Collection
    {
        return Attendance::with(['employee.department', 'employee.position', 'teachingSchedule.subject', 'teachingSchedule.room'])
            ->when($this->departmentId(), fn ($q, $id) => $q->where('department_id', $id))
            ->when($this->from(), fn ($q, $d) => $q->whereDate('date', '>=', $d))
            ->when($this->to(), fn ($q, $d) => $q->whereDate('date', '<=', $d))
            ->whereHas('employee', fn ($q) => $this->scopeEmployees($q))
            ->orderBy('date', 'desc')
            ->get();
    }

    /**
     * Daily summary per employee in the range.
     */
    public function attendanceDailySummary(): Collection
    {
        $aggregates = Attendance::selectRaw('employee_id,
                COUNT(*) as total_records,
                SUM(CASE WHEN status = "present" THEN 1 ELSE 0 END) as present,
                SUM(CASE WHEN status = "late" THEN 1 ELSE 0 END) as late,
                SUM(CASE WHEN status = "half_day" THEN 1 ELSE 0 END) as half_day,
                SUM(CASE WHEN status = "absent" THEN 1 ELSE 0 END) as absent,
                SUM(CASE WHEN status = "rest_day" THEN 1 ELSE 0 END) as rest,
                SUM(working_hours) as working_hours,
                SUM(late_minutes) as late_minutes,
                SUM(undertime_minutes) as undertime_minutes,
                SUM(overtime_minutes) as overtime_minutes')
            ->when($this->from(), fn ($q, $d) => $q->whereDate('date', '>=', $d))
            ->when($this->to(), fn ($q, $d) => $q->whereDate('date', '<=', $d))
            ->groupBy('employee_id')
            ->get()
            ->keyBy('employee_id');

        return $this->scopeEmployees(Employee::with('department', 'position'))
            ->get()
            ->map(function ($e) use ($aggregates) {
                $row = $aggregates->get($e->id);

                return [
                    'employee' => $e,
                    'present' => (int) ($row->present ?? 0),
                    'late' => (int) ($row->late ?? 0),
                    'half_day' => (int) ($row->half_day ?? 0),
                    'absent' => (int) ($row->absent ?? 0),
                    'rest' => (int) ($row->rest ?? 0),
                    'working_hours' => round((float) ($row->working_hours ?? 0), 2),
                    'late_minutes' => (int) ($row->late_minutes ?? 0),
                    'undertime_minutes' => (int) ($row->undertime_minutes ?? 0),
                    'overtime_minutes' => (int) ($row->overtime_minutes ?? 0),
                ];
            })
            ->sortByDesc(fn ($r) => $r['working_hours'])
            ->values();
    }

    public function lateReport(): Collection
    {
        return $this->attendanceReport()->where('late_minutes', '>', 0)->values();
    }

    public function absentReport(): Collection
    {
        return $this->attendanceReport()->where('status', Attendance::ABSENT)->values();
    }

    /**
     * Payroll report across periods.
     */
    public function payrollReport(): Collection
    {
        return Payroll::with(['employee.department', 'period'])
            ->when($this->filters['payroll_period_id'] ?? null, fn ($q, $id) => $q->where('payroll_period_id', $id))
            ->when($this->departmentId(), fn ($q, $id) => $q->whereHas('employee', fn ($eq) => $eq->where('department_id', $id)))
            ->when($this->from(), fn ($q, $d) => $q->whereHas('period', fn ($pq) => $pq->whereDate('pay_date', '>=', $d)))
            ->when($this->to(), fn ($q, $d) => $q->whereHas('period', fn ($pq) => $pq->whereDate('pay_date', '<=', $d)))
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function teachingHoursReport(): Collection
    {
        return $this->attendanceReport()
            ->where('employee.classification', Employee::CLASSIFICATION_TEACHING)
            ->where('working_hours', '>', 0)
            ->values();
    }

    public function makeUpClassReport(): Collection
    {
        return MakeUpClass::with(['employee.department', 'subject'])
            ->when($this->filters['approval_status'] ?? null, fn ($q, $s) => $q->where('approval_status', $s))
            ->when($this->departmentId(), fn ($q, $id) => $q->whereHas('employee', fn ($eq) => $eq->where('department_id', $id)))
            ->when($this->from(), fn ($q, $d) => $q->whereDate('class_date', '>=', $d))
            ->when($this->to(), fn ($q, $d) => $q->whereDate('class_date', '<=', $d))
            ->orderBy('class_date', 'desc')
            ->get();
    }

    public function benefitReport(): Collection
    {
        return EmployeeBenefit::with(['employee.department', 'benefit'])
            ->when($this->departmentId(), fn ($q, $id) => $q->whereHas('employee', fn ($eq) => $eq->where('department_id', $id)))
            ->get()
            ->groupBy('benefit.name')
            ->map(fn ($rows) => [
                'benefit' => $rows->first()->benefit,
                'count' => $rows->count(),
                'amount' => round($rows->sum('effective_amount'), 2),
            ])
            ->values();
    }

    public function loanReport(): Collection
    {
        return Loan::with(['employee.department'])
            ->when($this->filters['loan_type'] ?? null, fn ($q, $t) => $q->where('loan_type', $t))
            ->when($this->departmentId(), fn ($q, $id) => $q->whereHas('employee', fn ($eq) => $eq->where('department_id', $id)))
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function departmentReport(): Collection
    {
        $attendanceStats = Attendance::selectRaw('department_id,
                COUNT(*) as total,
                SUM(CASE WHEN status IN ("present","late","half_day") THEN 1 ELSE 0 END) as present')
            ->when($this->from(), fn ($q, $dt) => $q->whereDate('date', '>=', $dt))
            ->when($this->to(), fn ($q, $dt) => $q->whereDate('date', '<=', $dt))
            ->groupBy('department_id')
            ->get()
            ->keyBy('department_id');

        $payrollByDept = Payroll::where('status', Payroll::RELEASED)
            ->join('employees', 'employees.id', '=', 'payrolls.employee_id')
            ->selectRaw('employees.department_id, SUM(payrolls.gross_pay) as gross')
            ->groupBy('employees.department_id')
            ->get()
            ->keyBy('department_id');

        return Department::withCount('employees')
            ->get()
            ->map(function ($d) use ($attendanceStats, $payrollByDept) {
                $total = (int) ($attendanceStats->get($d->id)?->total ?? 0);
                $present = (int) ($attendanceStats->get($d->id)?->present ?? 0);

                return [
                    'department' => $d,
                    'employee_count' => $d->employees_count,
                    'attendance_records' => $total,
                    'attendance_rate' => $total > 0 ? round($present / $total * 100, 1) : 0,
                    'payroll_expenses' => round((float) ($payrollByDept->get($d->id)?->gross ?? 0), 2),
                ];
            });
    }

    public function employeeReport(): Collection
    {
        return $this->scopeEmployees(Employee::with(['department', 'position']))
            ->get()
            ->map(function ($e) {
                return [
                    'employee' => $e,
                    'teaching_schedules' => $e->teachingSchedules()->count(),
                    'work_days' => $e->workSchedules()->count(),
                    'active_loans' => $e->loans()->where('status', 'active')->sum('balance'),
                    'clearance_complete' => $e->hasCompleteClearance(),
                ];
            });
    }
}
