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
        return Attendance::with(['employee.department', 'employee.position'])
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
        return Employee::with('department', 'position')
            ->where('is_active', true)
            ->when($this->departmentId(), fn ($q, $id) => $q->where('department_id', $id))
            ->when($this->classification(), fn ($q, $c) => $q->where('classification', $c))
            ->when($this->employmentStatus(), fn ($q, $s) => $q->where('employment_status', $s))
            ->get()
            ->map(function ($e) {
                $q = $e->attendances()
                    ->when($this->from(), fn ($q, $d) => $q->whereDate('date', '>=', $d))
                    ->when($this->to(), fn ($q, $d) => $q->whereDate('date', '<=', $d));

                return [
                    'employee' => $e,
                    'present' => (clone $q)->where('status', Attendance::PRESENT)->count(),
                    'late' => (clone $q)->where('status', Attendance::LATE)->count(),
                    'half_day' => (clone $q)->where('status', Attendance::HALF_DAY)->count(),
                    'absent' => (clone $q)->where('status', Attendance::ABSENT)->count(),
                    'rest' => (clone $q)->where('status', Attendance::REST_DAY)->count(),
                    'working_hours' => round((clone $q)->sum('working_hours'), 2),
                    'late_minutes' => (int) (clone $q)->sum('late_minutes'),
                    'undertime_minutes' => (int) (clone $q)->sum('undertime_minutes'),
                    'overtime_minutes' => (int) (clone $q)->sum('overtime_minutes'),
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
            ->where('employee.classification', 'teaching')
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
        return Department::withCount('employees')
            ->with('employees')
            ->get()
            ->map(function ($d) {
                $attendances = Attendance::where('department_id', $d->id)
                    ->when($this->from(), fn ($q, $dt) => $q->whereDate('date', '>=', $dt))
                    ->when($this->to(), fn ($q, $dt) => $q->whereDate('date', '<=', $dt));

                $payrollTotal = Payroll::whereHas('employee', fn ($q) => $q->where('department_id', $d->id))
                    ->where('status', 'released')
                    ->sum('gross_pay');

                $present = (clone $attendances)->whereIn('status', [Attendance::PRESENT, Attendance::LATE, Attendance::HALF_DAY])->count();
                $total = (clone $attendances)->count();

                return [
                    'department' => $d,
                    'employee_count' => $d->employees_count,
                    'attendance_records' => $total,
                    'attendance_rate' => $total > 0 ? round($present / $total * 100, 1) : 0,
                    'payroll_expenses' => round($payrollTotal, 2),
                ];
            });
    }

    public function employeeReport(): Collection
    {
        return Employee::with(['department', 'position'])
            ->where('is_active', true)
            ->when($this->departmentId(), fn ($q, $id) => $q->where('department_id', $id))
            ->when($this->classification(), fn ($q, $c) => $q->where('classification', $c))
            ->when($this->employmentStatus(), fn ($q, $s) => $q->where('employment_status', $s))
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
