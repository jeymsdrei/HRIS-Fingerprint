<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\TeachingSchedule;
use App\Models\WorkSchedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        $employees = collect();
        $schedules = collect();
        $workSchedules = collect();

        if ($request->employee_id) {
            $employee = Employee::with([
                'teachingSchedules.subject',
                'teachingSchedules.room',
                'teachingSchedules.schoolYear',
                'teachingSchedules.semester',
                'workSchedules',
            ])->find($request->employee_id);
            if ($employee) {
                $schedules = $employee->teachingSchedules;
                $workSchedules = $employee->workSchedules;
            }
        }

        $employeeList = Employee::with('department')
            ->where('is_active', true)
            ->when($request->department_id, fn ($q, $id) => $q->where('department_id', $id))
            ->when($request->classification, fn ($q, $c) => $q->where('classification', $c))
            ->when($request->employment_status, fn ($q, $s) => $q->where('employment_status', $s))
            ->orderBy('last_name')
            ->get();

        $departments = Department::orderBy('name')->get();

        return view('schedules.index', compact('employeeList', 'schedules', 'workSchedules', 'departments'))
            ->with('selected', $request->employee_id);
    }

    public function storeTeaching(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'subject_id' => 'nullable|array',
            'subject_id.*' => 'nullable|exists:subjects,id',
            'room_id' => 'nullable|array',
            'room_id.*' => 'nullable|exists:rooms,id',
            'day' => 'required|array',
            'day.*' => 'nullable|integer|between:0,6',
            'start_time' => 'required|array',
            'start_time.*' => 'nullable|date_format:H:i',
            'end_time' => 'required|array',
            'end_time.*' => 'nullable|date_format:H:i',
            'semester_id' => 'nullable|array',
            'semester_id.*' => 'nullable|exists:semesters,id',
            'school_year_id' => 'nullable|array',
            'school_year_id.*' => 'nullable|exists:school_years,id',
        ]);

        $created = 0;
        foreach ($request->input('day', []) as $i => $day) {
            if ($day === null || $day === '') {
                continue;
            }
            $start = $request->input("start_time.$i");
            $end = $request->input("end_time.$i");
            if (! $start || ! $end || $end <= $start) {
                continue;
            }

            TeachingSchedule::create([
                'employee_id' => $request->employee_id,
                'subject_id' => $request->input("subject_id.$i") ?: null,
                'room_id' => $request->input("room_id.$i") ?: null,
                'day' => $day,
                'start_time' => $start,
                'end_time' => $end,
                'semester_id' => $request->input("semester_id.$i") ?: null,
                'school_year_id' => $request->input("school_year_id.$i") ?: null,
            ]);
            $created++;
        }

        if ($created > 0) {
            return back()->with('success', "{$created} teaching schedule(s) added.");
        }

        return back()->with('error', 'No valid teaching schedules provided.');
    }

    public function destroyTeaching(TeachingSchedule $schedule)
    {
        $schedule->delete();

        return back()->with('success', 'Teaching schedule removed.');
    }

    public function storeWork(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'day' => 'required|integer|between:0,6',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);
        WorkSchedule::create([
            'employee_id' => $request->employee_id,
            'day' => $request->day,
            'start_time' => $request->start_time.':00',
            'end_time' => $request->end_time.':00',
        ]);

        return back()->with('success', 'Work schedule added.');
    }

    public function destroyWork(WorkSchedule $schedule)
    {
        $schedule->delete();

        return back()->with('success', 'Work schedule removed.');
    }
}
