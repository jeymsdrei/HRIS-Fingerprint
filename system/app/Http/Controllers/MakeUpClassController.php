<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\MakeUpClass;
use App\Models\Notification;
use App\Models\Subject;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MakeUpClassController extends Controller
{
    public function index(Request $request)
    {
        $makeUps = MakeUpClass::with(['employee.department', 'subject', 'approver'])
            ->when($request->approval_status, fn ($q, $s) => $q->where('approval_status', $s))
            ->when($request->employee_id, fn ($q, $id) => $q->where('employee_id', $id))
            ->when($request->department_id, fn ($q, $id) => $q->whereHas('employee', fn ($w) => $w->where('department_id', $id)))
            ->when($request->classification, fn ($q, $c) => $q->whereHas('employee', fn ($w) => $w->where('classification', $c)))
            ->when($request->employment_status, fn ($q, $s) => $q->whereHas('employee', fn ($w) => $w->where('employment_status', $s)))
            ->when($request->from, fn ($q, $d) => $q->whereDate('class_date', '>=', $d))
            ->when($request->to, fn ($q, $d) => $q->whereDate('class_date', '<=', $d))
            ->orderByDesc('class_date')
            ->paginate(15)
            ->withQueryString();

        $employees = Employee::where('is_active', true)->orderBy('last_name')->get();
        $subjects = Subject::orderBy('name')->get();
        $departments = Department::orderBy('name')->get();

        return view('makeup.index', compact('makeUps', 'employees', 'subjects', 'departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'subject_id' => 'nullable|exists:subjects,id',
            'class_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'hourly_rate' => 'nullable|numeric|min:0',
            'remarks' => 'nullable|string|max:500',
        ]);

        $employee = Employee::findOrFail($request->employee_id);
        $start = Carbon::parse($request->class_date.' '.$request->start_time);
        $end = Carbon::parse($request->class_date.' '.$request->end_time);
        $hours = round($start->diffInMinutes($end) / 60, 2);
        $rate = $request->hourly_rate ?: (float) $employee->hourly_rate;

        MakeUpClass::create([
            'employee_id' => $employee->id,
            'subject_id' => $request->subject_id,
            'class_date' => $request->class_date,
            'start_time' => $request->start_time.':00',
            'end_time' => $request->end_time.':00',
            'hours_rendered' => $hours,
            'hourly_rate' => $rate,
            'additional_pay' => round($hours * $rate, 2),
            'approval_status' => 'pending',
            'remarks' => $request->remarks,
        ]);

        return back()->with('success', 'Make-up class recorded (pending approval).');
    }

    public function approve(MakeUpClass $makeUpClass)
    {
        $makeUpClass->update([
            'approval_status' => 'approved',
            'approved_by' => auth()->id(),
            'approved_at' => now(),
        ]);

        Notification::notify(
            $makeUpClass->employee->user,
            'Make-Up Class Approved',
            "Your make-up class on {$makeUpClass->class_date->format('M d, Y')} was approved. Additional pay will be added to your next payroll.",
            route('employee.payslips')
        );

        return back()->with('success', 'Make-up class approved. Payment will be added to payroll.');
    }

    public function reject(Request $request, MakeUpClass $makeUpClass)
    {
        $request->validate(['remarks' => 'nullable|string|max:500']);
        $makeUpClass->update([
            'approval_status' => 'rejected',
            'approved_by' => auth()->id(),
            'approved_at' => now(),
            'remarks' => $request->remarks ?: $makeUpClass->remarks,
        ]);

        return back()->with('success', 'Make-up class rejected.');
    }
}
