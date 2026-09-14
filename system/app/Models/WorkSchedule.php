<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $employee_id
 * @property int $day
 * @property Carbon $start_time
 * @property Carbon $end_time
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Employee $employee
 * @property-read string $day_name
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkSchedule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkSchedule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkSchedule query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkSchedule whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkSchedule whereDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkSchedule whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkSchedule whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkSchedule whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkSchedule whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkSchedule whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class WorkSchedule extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id', 'day', 'start_time', 'end_time'];

    protected $casts = [
        'start_time' => 'datetime:H:i',
        'end_time' => 'datetime:H:i',
    ];

    public function getDayNameAttribute(): string
    {
        return TeachingSchedule::$dayNames[$this->day] ?? '';
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
