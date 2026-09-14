<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\BiometricDevice;
use App\Models\Department;
use App\Models\Employee;
use App\Services\AttendanceService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index(Request $request, AttendanceService $service)
    {
        $date = $request->date ? Carbon::parse($request->date) : now();

        // Department heads default to their own department
        $departmentId = $request->department_id;
        if ($request->user()->role === 'department_head' && ! $departmentId) {
            $departmentId = $request->user()->employee?->department_id;
        }

        // ensure today's records exist
        $service->processDate($date, $request->user()->id);

        $attendances = Attendance::with(['employee.department', 'employee.position', 'device'])
            ->whereDate('date', $date->toDateString())
            ->when($departmentId, fn ($q, $id) => $q->where('department_id', $id))
            ->when($request->status, fn ($q, $s) => $q->where('status', $s))
            ->when($request->classification, fn ($q, $c) => $q->whereHas('employee', fn ($w) => $w->where('classification', $c)))
            ->when($request->employment_status, fn ($q, $s) => $q->whereHas('employee', fn ($w) => $w->where('employment_status', $s)))
            ->when($request->search, fn ($q, $s) => $q->whereHas('employee', fn ($w) => $w
                ->where('employee_id', 'like', "%{$s}%")
                ->orWhere('first_name', 'like', "%{$s}%")
                ->orWhere('last_name', 'like', "%{$s}%")))
            ->orderBy('employee_id')
            ->paginate(20)
            ->withQueryString();

        $summary = $service->dailySummary($date);
        $departments = Department::orderBy('name')->get();
        $devices = BiometricDevice::where('is_active', true)->get();

        return view('attendance.index', compact('attendances', 'summary', 'departments', 'devices', 'date'));
    }

    public function edit(Attendance $attendance)
    {
        $attendance->load('employee');

        return view('attendance.edit', compact('attendance'));
    }

    public function update(Request $request, Attendance $attendance)
    {
        $request->validate([
            'time_in' => 'nullable|date_format:H:i',
            'time_out' => 'nullable|date_format:H:i',
            'remarks' => 'required|in:Present,Late,Absent',
        ]);

        $statusByRemark = [
            'Present' => Attendance::PRESENT,
            'Late' => Attendance::LATE,
            'Absent' => Attendance::ABSENT,
        ];

        $attendance->update([
            'time_in' => $request->time_in ? $request->time_in.':00' : null,
            'time_out' => $request->time_out ? $request->time_out.':00' : null,
            'remarks' => $request->remarks,
        ]);

        // recompute
        $service = app(AttendanceService::class);
        $service->processDay($attendance->employee, Carbon::parse($attendance->date), $request->user()->id);

        // Keep the admin's explicit status choice after recomputation.
        $attendance->update(['status' => $statusByRemark[$request->remarks]]);

        return redirect()->route('attendance.index', ['date' => $attendance->date->format('Y-m-d')])
            ->with('success', 'Attendance corrected and recomputed.');
    }

    /**
     * Manual punch registration for a specific employee.
     */
    public function storePunch(Request $request, AttendanceService $service)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'punch_time' => 'required|date',
            'device_id' => 'nullable|exists:biometric_devices,id',
        ]);

        $employee = Employee::findOrFail($request->employee_id);
        $service->registerPunch($employee, Carbon::parse($request->punch_time), $request->device_id, 'manual');

        return back()->with('success', 'Punch registered for '.$employee->full_name.'.');
    }

    /**
     * Process / backfill a range of dates for all employees.
     */
    public function processRange(Request $request, AttendanceService $service)
    {
        $request->validate([
            'from' => 'required|date',
            'to' => 'required|date|after_or_equal:from',
        ]);

        $count = $service->backfill(Carbon::parse($request->from), Carbon::parse($request->to), $request->user()->id);

        return back()->with('success', "Attendance processed for {$count} employee-day records.");
    }
}
