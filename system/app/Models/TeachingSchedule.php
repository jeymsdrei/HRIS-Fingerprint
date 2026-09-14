<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $employee_id
 * @property int|null $subject_id
 * @property int|null $room_id
 * @property int $day
 * @property Carbon $start_time
 * @property Carbon $end_time
 * @property int|null $semester_id
 * @property int|null $school_year_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Employee $employee
 * @property-read string $day_name
 * @property-read Room|null $room
 * @property-read SchoolYear|null $schoolYear
 * @property-read Semester|null $semester
 * @property-read Subject|null $subject
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TeachingSchedule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TeachingSchedule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TeachingSchedule query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TeachingSchedule whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TeachingSchedule whereDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TeachingSchedule whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TeachingSchedule whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TeachingSchedule whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TeachingSchedule whereRoomId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TeachingSchedule whereSchoolYearId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TeachingSchedule whereSemesterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TeachingSchedule whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TeachingSchedule whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TeachingSchedule whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class TeachingSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id', 'subject_id', 'room_id', 'day',
        'start_time', 'end_time', 'semester_id', 'school_year_id',
    ];

    protected $casts = [
        'start_time' => 'datetime:H:i',
        'end_time' => 'datetime:H:i',
    ];

    public static array $dayNames = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

    public function getDayNameAttribute(): string
    {
        return self::$dayNames[$this->day] ?? '';
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    public function semester(): BelongsTo
    {
        return $this->belongsTo(Semester::class);
    }

    public function schoolYear(): BelongsTo
    {
        return $this->belongsTo(SchoolYear::class);
    }
}
