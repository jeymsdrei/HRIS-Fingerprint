<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int|null $employee_id
 * @property int|null $fingerprint_id
 * @property int|null $device_id
 * @property Carbon $punch_time
 * @property string $source
 * @property string|null $source_key
 * @property string|null $action
 * @property bool $processed
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read BiometricDevice|null $device
 * @property-read Employee|null $employee
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AttendanceLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AttendanceLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AttendanceLog query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AttendanceLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AttendanceLog whereDeviceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AttendanceLog whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AttendanceLog whereFingerprintId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AttendanceLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AttendanceLog whereProcessed($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AttendanceLog wherePunchTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AttendanceLog whereSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AttendanceLog whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class AttendanceLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id', 'fingerprint_id', 'device_id', 'punch_time', 'source_key', 'action', 'source', 'processed',
    ];

    protected $casts = [
        'punch_time' => 'datetime',
        'processed' => 'boolean',
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function device(): BelongsTo
    {
        return $this->belongsTo(BiometricDevice::class, 'device_id');
    }
}
