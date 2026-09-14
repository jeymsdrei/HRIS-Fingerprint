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
 * @property Carbon $class_date
 * @property Carbon $start_time
 * @property Carbon $end_time
 * @property numeric $hours_rendered
 * @property numeric $hourly_rate
 * @property numeric $additional_pay
 * @property string $approval_status
 * @property int|null $approved_by
 * @property Carbon|null $approved_at
 * @property string|null $remarks
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read User|null $approver
 * @property-read Employee $employee
 * @property-read Subject|null $subject
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MakeUpClass newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MakeUpClass newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MakeUpClass query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MakeUpClass whereAdditionalPay($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MakeUpClass whereApprovalStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MakeUpClass whereApprovedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MakeUpClass whereApprovedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MakeUpClass whereClassDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MakeUpClass whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MakeUpClass whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MakeUpClass whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MakeUpClass whereHourlyRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MakeUpClass whereHoursRendered($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MakeUpClass whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MakeUpClass whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MakeUpClass whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MakeUpClass whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MakeUpClass whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class MakeUpClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id', 'subject_id', 'class_date', 'start_time', 'end_time',
        'hours_rendered', 'hourly_rate', 'additional_pay',
        'approval_status', 'approved_by', 'approved_at', 'remarks',
    ];

    protected $casts = [
        'class_date' => 'date',
        'start_time' => 'datetime:H:i',
        'end_time' => 'datetime:H:i',
        'hours_rendered' => 'decimal:2',
        'hourly_rate' => 'decimal:2',
        'additional_pay' => 'decimal:2',
        'approved_at' => 'datetime',
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    public function approver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function computeAdditionalPay(): float
    {
        return round($this->hours_rendered * $this->hourly_rate, 2);
    }
}
