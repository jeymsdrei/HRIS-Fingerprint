<?php

namespace App\Services;

use App\Models\Attendance;
use App\Models\AttendanceLog;
use App\Models\Employee;
use App\Models\Setting;
use App\Models\TeachingSchedule;
use App\Models\WorkSchedule;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AttendanceService
{
    /**
     * Find the schedule window for an employee on a given date.
     *
     * Teaching personnel are validated against their assigned class
     * schedules (per-day, per-semester). Non-teaching personnel use
     * their fixed work schedules, falling back to the company default
     * Monday-Friday shift defined in settings.
     *
     * @return array{start: Carbon|null, end: Carbon|null, schedule: TeachingSchedule|WorkSchedule|null, type: string|null}
     */
    public function getScheduleFor(Employee $employee, Carbon $date): array
    {
        $day = $date->dayOfWeek;

        if ($employee->isTeaching) {
            $activeYear = $employee->teachingSchedules()
                ->whereHas('schoolYear', fn ($q) => $q->where('is_active', true))
                ->orWhereNull('school_year_id');

            $schedule = $employee->teachingSchedules()
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
                ->first();

            if ($schedule) {
                return [
                    'start' => Carbon::parse($date->toDateString().' '.$schedule->start_time->format('H:i:s')),
                    'end' => Carbon::parse($date->toDateString().' '.$schedule->end_time->format('H:i:s')),
                    'schedule' => $schedule,
                    'type' => 'teaching',
                ];
            }

            return ['start' => null, 'end' => null, 'schedule' => null, 'type' => 'teaching'];
        }

        $schedule = $employee->workSchedules()->where('day', $day)->first();

        if (! $schedule && $day >= 1 && $day <= 6) {
            $defaultStart = Setting::get('default_shift_start', '08:00');
            $defaultEnd = Setting::get('default_shift_end', '17:00');

            return [
                'start' => Carbon::parse($date->toDateString().' '.$defaultStart),
                'end' => Carbon::parse($date->toDateString().' '.$defaultEnd),
                'schedule' => null,
                'type' => 'non_teaching',
            ];
        }

        if ($schedule) {
            return [
                'start' => Carbon::parse($date->toDateString().' '.$schedule->start_time->format('H:i:s')),
                'end' => Carbon::parse($date->toDateString().' '.$schedule->end_time->format('H:i:s')),
                'schedule' => $schedule,
                'type' => 'non_teaching',
            ];
        }

        return ['start' => null, 'end' => null, 'schedule' => null, 'type' => 'non_teaching'];
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
     */
    public function processDay(Employee $employee, Carbon $date, ?int $processedBy = null): Attendance
    {
        $date = $date->copy()->startOfDay();
        $day = $date->dayOfWeek;
        $existingAttendance = Attendance::where('employee_id', $employee->id)
            ->whereDate('date', $date->toDateString())
            ->first();
        $remarkStatus = match ($existingAttendance?->remarks) {
            'Present' => Attendance::PRESENT,
            'Late' => Attendance::LATE,
            'Absent' => Attendance::ABSENT,
            default => null,
        };

        $schedule = $this->getScheduleFor($employee, $date);

        $logs = AttendanceLog::where('employee_id', $employee->id)
            ->whereBetween('punch_time', [$date->copy()->setTime(0, 0), $date->copy()->setTime(23, 59, 59)])
            ->orderBy('punch_time')
            ->get(['punch_time', 'device_id', 'action']);

        $punchTimes = $logs->pluck('punch_time');

        // No scheduled work → rest day
        if (! $schedule['start']) {
            $att = Attendance::updateOrCreate(
                ['employee_id' => $employee->id, 'date' => $date->toDateString()],
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

            return $att;
        }

        $start = $schedule['start'];
        $end = $schedule['end'];
        $scheduledMinutes = $start->diffInMinutes($end);

        // No punches → absent
        if ($punchTimes->isEmpty()) {
            $att = Attendance::updateOrCreate(
                ['employee_id' => $employee->id, 'date' => $date->toDateString()],
                [
                    'day' => $day,
                    'department_id' => $employee->department_id,
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

            return $att;
        }

        // When the device/agent provides explicit in/out classification, use it.
        // Otherwise fall back to first punch = time-in, last punch = time-out.
        $outs = $logs->where('action', 'time_out')->pluck('punch_time');
        $actionedIt = $logs->firstWhere('action', 'time_in')?->punch_time;
        $actionedOt = $outs->last();

        $timeIn = $actionedIt !== null
            ? Carbon::parse($actionedIt)
            : Carbon::parse($punchTimes->first());
        $timeOut = $actionedOt !== null
            ? Carbon::parse($actionedOt)
            : Carbon::parse($punchTimes->last());
        if ($timeOut->lt($timeIn)) {
            $timeOut = $timeIn->copy();
        }

        // ---- Computation rules ----
        // late = minutes the employee arrived AFTER schedule start
        $lateMinutes = max(0, $timeIn->diffInMinutes($start, false));
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
            ['employee_id' => $employee->id, 'date' => $date->toDateString()],
            [
                'day' => $day,
                'department_id' => $employee->department_id,
                'device_id' => AttendanceLog::where('employee_id', $employee->id)
                    ->whereDate('punch_time', $date->toDateString())
                    ->value('device_id'),
                'schedule_start' => $start->format('H:i:s'),
                'schedule_end' => $end->format('H:i:s'),
                'time_in' => $timeIn->format('H:i:s'),
                'time_out' => $timeOut->format('H:i:s'),
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
     * Daily attendance summary percentages for dashboards.
     */
    public function dailySummary(?Carbon $date = null): array
    {
        $date ??= now();
        $rows = Attendance::whereDate('date', $date->toDateString())
            ->select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->pluck('total', 'status')
            ->toArray();

        $expected = Employee::where('is_active', true)->count();
        $total = array_sum($rows);
        $presentish = ($rows[Attendance::PRESENT] ?? 0) + ($rows[Attendance::LATE] ?? 0) + ($rows[Attendance::HALF_DAY] ?? 0);

        return [
            'date' => $date->format('Y-m-d'),
            'expected' => $expected,
            'total_logged' => $total,
            'present' => $rows[Attendance::PRESENT] ?? 0,
            'late' => $rows[Attendance::LATE] ?? 0,
            'half_day' => $rows[Attendance::HALF_DAY] ?? 0,
            'absent' => $rows[Attendance::ABSENT] ?? 0,
            'rest_day' => $rows[Attendance::REST_DAY] ?? 0,
            'present_pct' => $expected > 0 ? round($presentish / $expected * 100, 1) : 0,
            'late_pct' => $expected > 0 ? round(($rows[Attendance::LATE] ?? 0) / $expected * 100, 1) : 0,
            'absent_pct' => $expected > 0 ? round(($rows[Attendance::ABSENT] ?? 0) / $expected * 100, 1) : 0,
        ];
    }
}
