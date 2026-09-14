<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $employee_id
 * @property Carbon $date
 * @property int $day
 * @property int|null $department_id
 * @property int|null $device_id
 * @property Carbon|null $schedule_start
 * @property Carbon|null $schedule_end
 * @property Carbon|null $time_in
 * @property Carbon|null $time_out
 * @property numeric $working_hours
 * @property int $late_minutes
 * @property int $undertime_minutes
 * @property int $overtime_minutes
 * @property bool $is_half_day
 * @property string $status
 * @property string $source
 * @property string|null $remarks
 * @property int|null $processed_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Department|null $department
 * @property-read BiometricDevice|null $device
 * @property-read Employee $employee
 * @property-read string $status_color
 * @property-read string $status_label
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attendance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attendance newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attendance query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attendance whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attendance whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attendance whereDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attendance whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attendance whereDeviceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attendance whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attendance whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attendance whereIsHalfDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attendance whereLateMinutes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attendance whereOvertimeMinutes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attendance whereProcessedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attendance whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attendance whereScheduleEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attendance whereScheduleStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attendance whereSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attendance whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attendance whereTimeIn($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attendance whereTimeOut($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attendance whereUndertimeMinutes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attendance whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Attendance whereWorkingHours($value)
 *
 * @mixin \Eloquent
 */
class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id', 'date', 'day', 'department_id', 'device_id',
        'schedule_start', 'schedule_end', 'time_in', 'time_out',
        'working_hours', 'late_minutes', 'undertime_minutes', 'overtime_minutes',
        'is_half_day', 'status', 'source', 'remarks', 'processed_by',
    ];

    protected $casts = [
        'date' => 'date:Y-m-d',
        'time_in' => 'datetime:H:i',
        'time_out' => 'datetime:H:i',
        'schedule_start' => 'datetime:H:i',
        'schedule_end' => 'datetime:H:i',
        'working_hours' => 'decimal:2',
        'is_half_day' => 'boolean',
    ];

    public const PRESENT = 'present';

    public const LATE = 'late';

    public const HALF_DAY = 'half_day';

    public const ABSENT = 'absent';

    public const REST_DAY = 'rest_day';

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function device(): BelongsTo
    {
        return $this->belongsTo(BiometricDevice::class, 'device_id');
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'present' => 'Present',
            'late' => 'Late',
            'half_day' => 'Half Day',
            'absent' => 'Absent',
            'rest_day' => 'Rest Day',
            default => ucfirst($this->status),
        };
    }

    public function getStatusColorAttribute(): string
    {
        return match ($this->status) {
            'present' => 'green',
            'late' => 'amber',
            'half_day' => 'yellow',
            'absent' => 'red',
            'rest_day' => 'gray',
            default => 'gray',
        };
    }
}
