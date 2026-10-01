<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\MakeUpClass;
use App\Models\Payroll;
use App\Models\PayrollPeriod;
use App\Services\AttendanceService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(Request $request, AttendanceService $attendanceService)
    {
        $user = $request->user();

        if ($user->role === 'employee') {
            return $this->employeeDashboard($user);
        }

        $from = $request->get('from') ? Carbon::parse($request->get('from')) : now()->startOfMonth();
        $to = $request->get('to') ? Carbon::parse($request->get('to')) : now()->endOfMonth();

        $today = $attendanceService->dailySummary();

        $dayStatuses = $attendanceService->dayStatusRows($from->copy()->startOfMonth(), $to);

        // Monthly attendance trend (line chart) — per employee-day so
        // per-schedule teaching rows collapse into a single day status.
        $attendanceTrend = $dayStatuses
            ->groupBy(fn ($r) => $r['date']->toDateString())
            ->map(function ($rows, $day) {
                return [
                    'd' => $day,
                    'present' => $rows->whereIn('status', ['present', 'late', 'half_day'])->count(),
                    'late' => $rows->where('status', 'late')->count(),
                    'absent' => $rows->where('status', 'absent')->count(),
                ];
            })
            ->sortKeys()
            ->values();

        // Payroll expense trend
        $payrollTrend = Payroll::query()
            ->join('payroll_periods as period', 'period.id', '=', 'payrolls.payroll_period_id')
            ->where('payrolls.status', 'released')
            ->whereBetween('period.pay_date', [$from, $to])
            ->selectRaw('strftime("%m", period.pay_date) as m, SUM(payrolls.gross_pay) as gross, SUM(payrolls.net_pay) as net')
            ->groupBy('m')
            ->orderBy('m')
            ->get();

        $currentPeriod = PayrollPeriod::latest('pay_date')->first();

        $attendanceByDept = $dayStatuses
            ->groupBy('department_id')
            ->map(fn ($rows) => [
                'department_id' => $rows->first()['department_id'],
                'total' => $rows->count(),
                'present' => $rows->whereIn('status', ['present', 'late', 'half_day'])->count(),
            ])
            ->keyBy('department_id');

        $payrollByDept = Payroll::where('status', 'released')
            ->join('employees', 'employees.id', '=', 'payrolls.employee_id')
            ->selectRaw('employees.department_id, SUM(payrolls.gross_pay) as gross')
            ->groupBy('employees.department_id')
            ->get()
            ->keyBy('department_id');

        $departmentStats = Department::withCount('employees')->get()->map(function ($d) use ($attendanceByDept, $payrollByDept) {
            $total = (int) ($attendanceByDept->get($d->id)?->total ?? 0);
            $present = (int) ($attendanceByDept->get($d->id)?->present ?? 0);
            $payroll = (float) ($payrollByDept->get($d->id)?->gross ?? 0);

            return [
                'name' => $d->name,
                'count' => $d->employees_count,
                'rate' => $total > 0 ? round($present / $total * 100, 1) : 0,
                'payroll' => round($payroll, 2),
            ];
        })->sortByDesc('count')->values();

        $stats = [
            'employees' => Employee::where('is_active', true)->count(),
            'teaching' => Employee::where('is_active', true)->where('classification', 'teaching')->count(),
            'departments' => Department::count(),
            'today' => $today,
            'pending_makeup' => MakeUpClass::where('approval_status', 'pending')->count(),
            'released_this_month' => Payroll::where('status', 'released')->whereMonth('released_at', now()->month)->count(),
            'payroll_total' => round(Payroll::where('status', 'released')->sum('gross_pay'), 2),
            'net_total' => round(Payroll::where('status', 'released')->sum('net_pay'), 2),
            'on_hold' => Payroll::where('status', 'on_hold')->count(),
        ];

        return view('dashboard.index', compact('stats', 'attendanceTrend', 'payrollTrend', 'departmentStats', 'currentPeriod', 'from', 'to'));
    }

    private function employeeDashboard($user): View
    {
        $employee = $user->employee;

        $today = $employee ? $employee->attendances()->whereDate('date', now()->toDateString())->first() : null;

        $weekAttendances = $employee
            ? $employee->attendances()->whereBetween('date', [now()->startOfWeek()->toDateString(), now()->endOfWeek()->toDateString()])->get()
            : collect();

        $recentPayslips = $employee
            ? $employee->payrolls()->with('period')->where('status', 'released')->latest('released_at')->take(5)->get()
            : collect();

        $schedules = $employee?->teachingSchedules()->with(['subject', 'room'])->get() ?? collect();
        $workSchedules = $employee?->workSchedules()->get() ?? collect();

        return view('dashboard.employee', compact('employee', 'today', 'weekAttendances', 'recentPayslips', 'schedules', 'workSchedules'));
    }
}
