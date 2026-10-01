<?php

namespace App\Http\Controllers;

use App\Models\Clearance;
use App\Models\Department;
use App\Models\MakeUpClass;
use App\Models\Payroll;
use App\Models\PayrollPeriod;
use App\Models\Setting;
use App\Services\PayrollService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    public function index(Request $request)
    {
        $periods = PayrollPeriod::withCount('payrolls')->withSum('payrolls', 'net_pay')->orderByDesc('end_date')->paginate(12);

        return view('payroll.index', compact('periods'));
    }

    public function show(PayrollPeriod $period, Request $request)
    {
        $payrolls = $period->payrolls()
            ->with(['employee.department', 'employee.clearances'])
            ->when($request->status, fn ($q, $s) => $q->where('status', $s))
            ->when($request->department_id, fn ($q, $id) => $q->whereHas('employee', fn ($w) => $w->where('department_id', $id)))
            ->when($request->classification, fn ($q, $c) => $q->whereHas('employee', fn ($w) => $w->where('classification', $c)))
            ->when($request->employment_status, fn ($q, $s) => $q->whereHas('employee', fn ($w) => $w->where('employment_status', $s)))
            ->when($request->search, fn ($q, $s) => $q->whereHas('employee', fn ($w) => $w
                ->where('employee_id', 'like', "%{$s}%")
                ->orWhere('first_name', 'like', "%{$s}%")
                ->orWhere('last_name', 'like', "%{$s}%")))
            ->orderByDesc('net_pay')
            ->paginate(15)
            ->withQueryString();

        $requiredClearanceIds = Clearance::where('is_required', true)->pluck('id');
        $makeUpSummaries = MakeUpClass::query()
            ->selectRaw('employee_id, COUNT(*) as sessions, SUM(hours_rendered) as hours')
            ->whereIn('employee_id', $payrolls->pluck('employee_id'))
            ->where('approval_status', 'approved')
            ->whereBetween('class_date', [$period->start_date->toDateString(), $period->end_date->toDateString()])
            ->groupBy('employee_id')
            ->get()
            ->keyBy('employee_id');
        foreach ($payrolls as $payroll) {
            $clearedIds = $payroll->employee->clearances
                ->where('status', 'cleared')
                ->pluck('clearance_id');
            $payroll->employee->setAttribute(
                'clearance_status',
                $requiredClearanceIds->diff($clearedIds)->isEmpty() ? 'Approved' : 'Pending'
            );
            $summary = $makeUpSummaries->get($payroll->employee_id);
            $payroll->setAttribute('make_up_sessions', (int) ($summary?->sessions ?? 0));
            $payroll->setAttribute('make_up_hours', round((float) ($summary?->hours ?? 0), 2));
        }

        $totals = [
            'gross' => round($period->payrolls()->sum('gross_pay'), 2),
            'net' => round($period->payrolls()->sum('net_pay'), 2),
            'deductions' => round($period->payrolls()->sum('total_deductions'), 2),
            'released' => $period->payrolls()->where('status', 'released')->count(),
            'held' => $period->payrolls()->where('status', 'on_hold')->count(),
        ];

        $departments = Department::orderBy('name')->get();

        return view('payroll.show', compact('period', 'payrolls', 'totals', 'departments'));
    }

    public function create()
    {
        $settings = [
            'monthly_payroll_days' => Setting::get('monthly_payroll_days', [15, 30]),
        ];

        return view('payroll.create', compact('settings'));
    }

    public function store(Request $request, PayrollService $service)
    {
        $request->validate([
            'type' => 'required|in:monthly,daily,semi_monthly',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'pay_date' => 'required|date',
        ]);

        $period = PayrollPeriod::create([
            'name' => $request->name ?: $this->defaultName($request),
            'type' => $request->type,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'pay_date' => $request->pay_date,
            'status' => 'draft',
        ]);

        $result = $service->generatePeriod($period);

        return redirect()->route('payroll.show', $period)
            ->with('success', "Payroll generated for {$result['created']} employees. {$result['held']} on hold (clearance).");
    }

    public function regenerate(PayrollPeriod $period, PayrollService $service)
    {
        $result = $service->generatePeriod($period);

        return back()->with('success', "Payroll regenerated. {$result['held']} employees on hold.");
    }

    public function release(Payroll $payroll, PayrollService $service)
    {
        try {
            $service->release($payroll);
        } catch (\RuntimeException $e) {
            return back()->with('error', $e->getMessage());
        }

        return back()->with('success', 'Salary released. Payslip and receipt generated.');
    }

    public function showLine(Payroll $payroll, PayrollService $service)
    {
        $payroll->load(['employee.department', 'period', 'payslip', 'receipt']);
        $makeUpClasses = MakeUpClass::with('subject')
            ->where('employee_id', $payroll->employee_id)
            ->where('approval_status', 'approved')
            ->whereBetween('class_date', [$payroll->period->start_date->toDateString(), $payroll->period->end_date->toDateString()])
            ->orderBy('class_date')
            ->orderBy('start_time')
            ->get();
        $audit = $service->audit($payroll);

        return view('payroll.line', compact('payroll', 'audit', 'makeUpClasses'));
    }

    public function updateLine(Request $request, Payroll $payroll)
    {
        if ($payroll->status === Payroll::RELEASED) {
            return back()->with('error', 'Released payroll amounts are approved and cannot be changed.');
        }

        $request->validate([
            'deduction_other' => 'nullable|numeric|min:0',
            'notes' => 'nullable|string|max:500',
        ]);

        $other = (float) $request->deduction_other;
        $total = round((float) $payroll->total_deductions - (float) $payroll->deduction_other + $other, 2);
        $payroll->update([
            'deduction_other' => $other,
            'total_deductions' => $total,
            'net_pay' => round((float) $payroll->gross_pay - $total, 2),
            'notes' => $request->notes,
        ]);

        return back()->with('success', 'Payroll adjusted.');
    }

    public function destroy(PayrollPeriod $period)
    {
        if ($period->payrolls()->where('status', 'released')->exists()) {
            return back()->with('error', 'Cannot delete a period with released salaries.');
        }
        $period->payrolls()->delete();
        $period->delete();

        return redirect()->route('payroll.index')->with('success', 'Payroll period deleted.');
    }

    private function defaultName(Request $request): string
    {
        $start = Carbon::parse($request->start_date);
        $end = Carbon::parse($request->end_date);

        return match ($request->type) {
            'monthly' => $start->format('F Y'),
            'daily' => $start->format('Y-m-d'),
            default => $start->format('M d').' - '.$end->format('M d, Y'),
        };
    }
}
