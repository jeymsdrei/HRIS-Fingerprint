<?php

namespace App\Services;

use App\Models\Attendance;
use App\Models\AttendanceLog;
use App\Models\Employee;
use App\Models\MakeUpClass;
use App\Models\Setting;
use App\Models\TeachingSchedule;
use App\Models\WorkSchedule;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class AttendanceService
{
    /**
     * Find the schedule windows for an employee on a given date.
     *
     * Teaching personnel are validated against ALL of their assigned class
     * schedules for the day (per-day, per-semester) so each class gets its
     * own time in / time out. Non-teaching personnel use ALL of their fixed
     * work schedules for the day, falling back to the company default
     * Monday-Friday shift defined in settings when none are assigned.
     *
     * @return array<int, array{start: Carbon, end: Carbon, schedule: TeachingSchedule|WorkSchedule|null, teaching_schedule_id: int|null, work_schedule_id: int|null, type: string}>
     */
    public function getSchedulesFor(Employee $employee, Carbon $date): array
    {
        $day = $date->dayOfWeek;

        if ($employee->isTeaching) {
            $schedules = $employee->teachingSchedules()
                ->where('day', $day)
                ->where(function ($q) {
                    $q->whereHas('schoolYear', fn ($sq) => $sq->where('is_active', true))
                        ->orWhereNull('school_year_id');
                })
                ->where(function ($q) {
                    $q->whereHas('semester', fn ($sq) => $sq->where('is_active', true))
                        ->orWhereNull('semester_id');
                })
                ->orderBy('start_time')
                ->get();

            $regularSchedules = $schedules->map(fn (TeachingSchedule $s) => [
                'start' => Carbon::parse($date->toDateString().' '.$s->start_time->format('H:i:s')),
                'end' => Carbon::parse($date->toDateString().' '.$s->end_time->format('H:i:s')),
                'schedule' => $s,
                'teaching_schedule_id' => $s->id,
                'work_schedule_id' => null,
                'type' => 'teaching',
            ])->all();
        } else {
            $regularSchedules = [];
        }

        // Non-teaching schedules (work schedules)
        if (! $employee->isTeaching) {
            $schedules = $employee->workSchedules()->where('day', $day)->orderBy('start_time')->get();

            if ($schedules->isNotEmpty()) {
                $regularSchedules = $schedules->map(fn (WorkSchedule $s) => [
                    'start' => Carbon::parse($date->toDateString().' '.$s->start_time->format('H:i:s')),
                    'end' => Carbon::parse($date->toDateString().' '.$s->end_time->format('H:i:s')),
                    'schedule' => $s,
                    'teaching_schedule_id' => null,
                    'work_schedule_id' => $s->id,
                    'type' => 'non_teaching',
                ])->all();
            }
        }

        // Default shift for non-teaching (Mon-Sat)
        if (! $employee->isTeaching && empty($regularSchedules) && $day >= 1 && $day <= 6) {
            $defaultStart = Setting::get('default_shift_start', '08:00');
            $defaultEnd = Setting::get('default_shift_end', '17:00');

            $regularSchedules = [[
                'start' => Carbon::parse($date->toDateString().' '.$defaultStart),
                'end' => Carbon::parse($date->toDateString().' '.$defaultEnd),
                'schedule' => null,
                'teaching_schedule_id' => null,
                'work_schedule_id' => null,
                'type' => 'non_teaching',
            ]];
        }

        // Default shift for teaching staff with no classes (Mon-Sat)
        // Allows punches to create attendance records even on unscheduled days
        if ($employee->isTeaching && empty($regularSchedules) && $day >= 1 && $day <= 6) {
            $defaultStart = Setting::get('default_shift_start', '08:00');
            $defaultEnd = Setting::get('default_shift_end', '17:00');

            $regularSchedules = [[
                'start' => Carbon::parse($date->toDateString().' '.$defaultStart),
                'end' => Carbon::parse($date->toDateString().' '.$defaultEnd),
                'schedule' => null,
                'teaching_schedule_id' => null,
                'work_schedule_id' => null,
                'type' => 'teaching_default',
            ]];
        }

        // Approved make-up classes for this date
        $makeUpClasses = $employee->makeUpClasses()
            ->where('approval_status', 'approved')
            ->whereDate('class_date', $date->toDateString())
            ->orderBy('start_time')
            ->get(['class_date', 'start_time', 'end_time', 'id']);

        $makeUpSchedules = $makeUpClasses->map(fn (MakeUpClass $m) => [
            'start' => Carbon::parse($date->toDateString().' '.$m->start_time->format('H:i:s')),
            'end' => Carbon::parse($date->toDateString().' '.$m->end_time->format('H:i:s')),
            'schedule' => $m,
            'teaching_schedule_id' => null,
            'work_schedule_id' => null,
            'make_up_class_id' => $m->id,
            'type' => 'makeup',
        ])->all();

        return array_merge($regularSchedules, $makeUpSchedules);
    }

    /**
     * Register a raw fingerprint punch (from device sync / API / manual).
     * Returns the processed attendance.
     */
    public function registerPunch(Employee $employee, Carbon $punchTime, ?int $deviceId = null, string $source = 'device'): Attendance
    {
        AttendanceLog::create([
            'employee_id' => $employee->id,
            'fingerprint_id' => $employee->fingerprint_id,
            'device_id' => $deviceId,
            'punch_time' => $punchTime,
            'source' => $source,
        ]);

        return $this->processDay($employee, $punchTime->copy());
    }

    /**
     * Process one employee for one date using the punch logs.
     * Recomputes everything from scratch so it is idempotent.
     *
     * Teaching personnel produce one attendance row per class schedule
     * (per-schedule time in/out, per-schedule absent). Non-teaching
     * personnel produce one row per work schedule assigned for the day.
     * Rest days (no schedule) still produce a single daily row.
     */
    public function processDay(Employee $employee, Carbon $date, ?int $processedBy = null): ?Attendance
    {
        $date = $date->copy()->startOfDay();
        $day = $date->dayOfWeek;

        $logs = AttendanceLog::where('employee_id', $employee->id)
            ->whereBetween('punch_time', [$date->copy()->setTime(0, 0), $date->copy()->setTime(23, 59, 59)])
            ->orderBy('punch_time')
            ->get(['punch_time', 'device_id', 'action', 'id']);

        $schedules = $this->getSchedulesFor($employee, $date);

        // No scheduled work → rest day
        if (empty($schedules)) {
            $existing = Attendance::where('employee_id', $employee->id)
                ->whereDate('date', $date->toDateString())
                ->whereNull('teaching_schedule_id')
                ->whereNull('work_schedule_id')
                ->first();
            $remarkStatus = match ($existing?->remarks) {
                'Present' => Attendance::PRESENT,
                'Late' => Attendance::LATE,
                'Absent' => Attendance::ABSENT,
                default => null,
            };

            return Attendance::updateOrCreate(
                ['employee_id' => $employee->id, 'date' => $date->toDateString(), 'teaching_schedule_id' => null, 'work_schedule_id' => null],
                [
                    'day' => $day,
                    'department_id' => $employee->department_id,
                    'schedule_start' => null,
                    'schedule_end' => null,
                    'status' => $remarkStatus ?? Attendance::REST_DAY,
                    'working_hours' => 0,
                    'late_minutes' => 0,
                    'undertime_minutes' => 0,
                    'overtime_minutes' => 0,
                    'processed_by' => $processedBy,
                ]
            );
        }

        $deviceId = AttendanceLog::where('employee_id', $employee->id)
            ->whereDate('punch_time', $date->toDateString())
            ->value('device_id');

        // Teaching previously collapsed the whole day into one null-schedule
        // row. Once real class windows exist, drop those legacy rows so the
        // per-schedule rows become the single source of truth.
        if ($employee->isTeaching) {
            Attendance::where('employee_id', $employee->id)
                ->whereDate('date', $date->toDateString())
                ->whereNull('teaching_schedule_id')
                ->delete();
        }

        $assignments = $this->assignPunchesToSchedules($schedules, $logs);

        $last = null;
        foreach ($schedules as $index => $window) {
            $last = $this->processWindow($employee, $date, $day, $deviceId, $window, $assignments[$index], $processedBy);
        }

        return $last;
    }

    /**
     * Assign punch logs to schedule windows.
     *
     * Rule: a punch belongs to the earliest window whose [start, end]
     * contains it (a punch on a window boundary goes to the window that
     * starts at that time, so a boundary punch reads as the next class's
     * time-in). Any punch left over is attached to the window whose
     * nearest boundary it is closest to (early / make-up punches).
     *
     * @param  array<int, array>  $schedules
     * @return array<int, Collection<int, AttendanceLog>>
     */
    private function assignPunchesToSchedules(array $schedules, $logs): array
    {
        $windows = array_values($schedules);
        $count = count($windows);
        $assigned = [];
        for ($i = 0; $i < $count; $i++) {
            $assigned[$i] = collect();
        }
        $unassigned = collect();

        // Grace period: 5 minutes before start, 10 minutes after end
        $graceBefore = 5;  // minutes
        $graceAfter = 10;  // minutes

        foreach ($logs as $log) {
            $t = Carbon::parse($log->punch_time);
            $placed = false;

            foreach ($windows as $index => $window) {
                $windowStart = $window['start']->copy()->subMinutes($graceBefore);
                $windowEnd = $window['end']->copy()->addMinutes($graceAfter);

                if ($t->equalTo($window['start']) || $t->between($windowStart, $windowEnd, true)) {
                    $assigned[$index]->push($log);
                    $placed = true;
                    break;
                }
            }

            if (! $placed) {
                $unassigned->push($log);
            }
        }

        foreach ($unassigned as $log) {
            $t = Carbon::parse($log->punch_time);
            $best = 0;
            $bestDistance = PHP_INT_MAX;

            foreach ($windows as $index => $window) {
                $distance = min(
                    abs($window['start']->diffInSeconds($t)),
                    abs($window['end']->diffInSeconds($t))
                );
                if ($distance < $bestDistance) {
                    $bestDistance = $distance;
                    $best = $index;
                }
            }

            $assigned[$best]->push($log);
        }

        return $assigned;
    }

    /**
     * Compute and persist one attendance record for a single schedule window.
     */
    private function processWindow(Employee $employee, Carbon $date, int $day, ?int $deviceId, array $window, $windowLogs, ?int $processedBy): Attendance
    {
        $start = $window['start'];
        $end = $window['end'];
        $scheduledMinutes = $start->diffInMinutes($end);
        $teachingScheduleId = $window['teaching_schedule_id'];
        $workScheduleId = $window['work_schedule_id'];
        $makeUpClassId = $window['make_up_class_id'] ?? null;

        $existing = Attendance::where('employee_id', $employee->id)
            ->whereDate('date', $date->toDateString())
            ->where('teaching_schedule_id', $teachingScheduleId)
            ->where('work_schedule_id', $workScheduleId)
            ->where('make_up_class_id', $makeUpClassId)
            ->first();
        $remarkStatus = match ($existing?->remarks) {
            'Present' => Attendance::PRESENT,
            'Late' => Attendance::LATE,
            'Absent' => Attendance::ABSENT,
            default => null,
        };

        if ($windowLogs->isEmpty()) {
            return Attendance::updateOrCreate(
                ['employee_id' => $employee->id, 'date' => $date->toDateString(), 'teaching_schedule_id' => $teachingScheduleId, 'work_schedule_id' => $workScheduleId, 'make_up_class_id' => $makeUpClassId],
                [
                    'day' => $day,
                    'department_id' => $employee->department_id,
                    'device_id' => $deviceId,
                    'schedule_start' => $start->format('H:i:s'),
                    'schedule_end' => $end->format('H:i:s'),
                    'status' => $remarkStatus ?? Attendance::ABSENT,
                    'working_hours' => 0,
                    'late_minutes' => 0,
                    'undertime_minutes' => 0,
                    'overtime_minutes' => 0,
                    'processed_by' => $processedBy,
                ]
            );
        }

        $orders = $windowLogs->sortBy('punch_time')->values();
        $times = $orders->pluck('punch_time');
        $actionedIn = $orders->where('action', 'time_in')->pluck('punch_time')->first();
        $actionedOut = $orders->where('action', 'time_out')->pluck('punch_time')->last();

        $timeIn = $actionedIn !== null ? Carbon::parse($actionedIn) : Carbon::parse($times->first());
        $timeOut = $actionedOut !== null ? Carbon::parse($actionedOut) : ($times->count() > 1 ? Carbon::parse($times->last()) : null);
        if ($timeOut && $timeOut->lt($timeIn)) {
            $timeOut = $timeIn->copy();
        }

        // ---- Computation rules ----
        // late = minutes the employee arrived AFTER schedule start
        $lateMinutes = max(0, $start->diffInMinutes($timeIn, false));

        // undertime/overtime/working_hours require time_out
        if ($timeOut) {
            // undertime = minutes the employee left BEFORE schedule end
            $undertimeMinutes = max(0, $timeOut->diffInMinutes($end, false));
            // overtime = minutes after schedule end, only credited when the
            // employee was actually present during the scheduled window
            $overtimeMinutes = 0;
            if ($lateMinutes === 0 && $undertimeMinutes === 0) {
                $overtimeMinutes = max(0, $end->diffInMinutes($timeOut, false));
            }

            $actualMinutes = $timeIn->diffInMinutes($timeOut);
            // Paid working hours: actual presence capped at the scheduled window
            $workingMinutes = min($actualMinutes, $scheduledMinutes);
        } else {
            // No time_out yet - treat as full undertime, no overtime, no working hours yet
            $undertimeMinutes = $scheduledMinutes;
            $overtimeMinutes = 0;
            $workingMinutes = 0;
        }
        $workingHours = round($workingMinutes / 60, 2);

        $halfDayThreshold = $scheduledMinutes * 0.5;
        $status = $remarkStatus;
        if ($status === null) {
            $status = Attendance::PRESENT;
            if ($workingMinutes < $halfDayThreshold) {
                $status = Attendance::HALF_DAY;
            } elseif ($lateMinutes > 0) {
                $status = Attendance::LATE;
            }
        }

        return Attendance::updateOrCreate(
            ['employee_id' => $employee->id, 'date' => $date->toDateString(), 'teaching_schedule_id' => $teachingScheduleId, 'work_schedule_id' => $workScheduleId, 'make_up_class_id' => $makeUpClassId],
            [
                'day' => $day,
                'department_id' => $employee->department_id,
                'device_id' => $deviceId,
                'schedule_start' => $start->format('H:i:s'),
                'schedule_end' => $end->format('H:i:s'),
                'time_in' => $timeIn->format('H:i:s'),
                'time_out' => $timeOut ? $timeOut->format('H:i:s') : null,
                'working_hours' => $workingHours,
                'late_minutes' => $lateMinutes,
                'undertime_minutes' => $undertimeMinutes,
                'overtime_minutes' => $overtimeMinutes,
                'is_half_day' => $status === Attendance::HALF_DAY,
                'status' => $status,
                'source' => 'device',
                'processed_by' => $processedBy,
            ]
        );
    }

    /**
     * Process all active employees for a given date.
     */
    public function processDate(Carbon $date, ?int $processedBy = null): int
    {
        $count = 0;
        Employee::where('is_active', true)->chunkById(100, function ($employees) use ($date, $processedBy, &$count) {
            foreach ($employees as $employee) {
                $this->processDay($employee, $date, $processedBy);
                $count++;
            }
        });

        return $count;
    }

    /**
     * Process a date range for one employee (used after bulk import).
     */
    public function processRange(Employee $employee, Carbon $from, Carbon $to, ?int $processedBy = null): int
    {
        $count = 0;
        $cursor = $from->copy()->startOfDay();
        while ($cursor->lte($to)) {
            $this->processDay($employee, $cursor, $processedBy);
            $count++;
            $cursor->addDay();
        }

        return $count;
    }

    /**
     * Backfill attendance for all employees in a date range.
     */
    public function backfill(Carbon $from, Carbon $to, ?int $processedBy = null): int
    {
        $count = 0;
        Employee::where('is_active', true)->chunkById(100, function ($employees) use ($from, $to, $processedBy, &$count) {
            foreach ($employees as $employee) {
                $count += $this->processRange($employee, $from, $to, $processedBy);
            }
        });

        return $count;
    }

    /**
     * Day-level attendance summaries for a range, one entry per employee-date.
     *
     * Per-schedule teaching rows are collapsed into a single day status
     * (best status wins) so aggregates stay comparable to the headcount.
     *
     * @return Collection<int, array{date: Carbon, year: string, month: string, department_id: int|null, status: string}>
     */
    public function dayStatusRows(Carbon $from, Carbon $to, ?int $departmentId = null): Collection
    {
        $rows = Attendance::whereBetween('date', [$from->toDateString(), $to->toDateString()])
            ->when($departmentId, fn ($q, $id) => $q->where('department_id', $id))
            ->get(['employee_id', 'date', 'status', 'department_id']);

        return $rows->groupBy(fn ($row) => $row->employee_id.'|'.$row->date->toDateString())
            ->map(fn ($group) => [
                'date' => $group->first()->date,
                'year' => $group->first()->date->format('Y'),
                'month' => $group->first()->date->format('m'),
                'department_id' => $group->first()->department_id,
                'status' => $this->bestDayStatus($group->pluck('status')),
            ])
            ->sortBy('date')
            ->values();
    }

    /**
     * Resolve the day-level status for a set of attendance row statuses.
     * Best status wins: present over late over half_day over absent; all
     * rest-day rows collapse to a single rest day.
     */
    private function bestDayStatus(Collection $statuses): string
    {
        if ($statuses->contains(Attendance::PRESENT)) {
            return Attendance::PRESENT;
        }
        if ($statuses->contains(Attendance::LATE)) {
            return Attendance::LATE;
        }
        if ($statuses->contains(Attendance::HALF_DAY)) {
            return Attendance::HALF_DAY;
        }
        if ($statuses->contains(Attendance::ABSENT)) {
            return Attendance::ABSENT;
        }

        return Attendance::REST_DAY;
    }

    /**
     * Daily attendance summary percentages for dashboards.
     *
     * Rows are grouped per employee so per-schedule attendance rows for
     * teaching personnel collapse into a single day-level status (best
     * status wins), keeping the KPIs comparable to the headcount.
     */
    public function dailySummary(?Carbon $date = null): array
    {
        $date ??= now();
        $dayStatuses = $this->dayStatusRows($date->copy()->startOfDay(), $date->copy()->endOfDay())
            ->pluck('status');

        $counts = $dayStatuses->countBy()->toArray();

        $expected = Employee::where('is_active', true)->count();
        $present = $counts[Attendance::PRESENT] ?? 0;
        $late = $counts[Attendance::LATE] ?? 0;
        $halfDay = $counts[Attendance::HALF_DAY] ?? 0;
        $absent = $counts[Attendance::ABSENT] ?? 0;
        $restDay = $counts[Attendance::REST_DAY] ?? 0;
        $total = array_sum($counts);
        $presentish = $present + $late + $halfDay;

        return [
            'date' => $date->format('Y-m-d'),
            'expected' => $expected,
            'total_logged' => $total,
            'present' => $present,
            'late' => $late,
            'half_day' => $halfDay,
            'absent' => $absent,
            'rest_day' => $restDay,
            'present_pct' => $expected > 0 ? round($presentish / $expected * 100, 1) : 0,
            'late_pct' => $expected > 0 ? round($late / $expected * 100, 1) : 0,
            'absent_pct' => $expected > 0 ? round($absent / $expected * 100, 1) : 0,
        ];
    }
}
