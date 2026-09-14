<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $employee_id
 * @property int $clearance_id
 * @property string $status
 * @property int|null $cleared_by
 * @property Carbon|null $cleared_at
 * @property string|null $remarks
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Clearance $clearance
 * @property-read User|null $clearedBy
 * @property-read Employee $employee
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeClearance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeClearance newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeClearance query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeClearance whereClearanceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeClearance whereClearedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeClearance whereClearedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeClearance whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeClearance whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeClearance whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeClearance whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeClearance whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeClearance whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class EmployeeClearance extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id', 'clearance_id', 'status', 'cleared_by', 'cleared_at', 'remarks',
    ];

    protected $casts = ['cleared_at' => 'datetime'];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function clearance(): BelongsTo
    {
        return $this->belongsTo(Clearance::class);
    }

    public function clearedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'cleared_by');
    }
}
