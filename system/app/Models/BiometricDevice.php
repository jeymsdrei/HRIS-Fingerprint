<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $name
 * @property string $ip_address
 * @property int $port
 * @property string|null $serial_number
 * @property string|null $location
 * @property string $status
 * @property Carbon|null $last_sync_at
 * @property bool $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, AttendanceLog> $logs
 * @property-read int|null $logs_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BiometricDevice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BiometricDevice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BiometricDevice query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BiometricDevice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BiometricDevice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BiometricDevice whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BiometricDevice whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BiometricDevice whereLastSyncAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BiometricDevice whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BiometricDevice whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BiometricDevice wherePort($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BiometricDevice whereSerialNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BiometricDevice whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BiometricDevice whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class BiometricDevice extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'ip_address', 'port', 'serial_number',
        'location', 'status', 'last_sync_at', 'is_active',
    ];

    protected $casts = [
        'last_sync_at' => 'datetime',
        'is_active' => 'boolean',
    ];

    public function logs(): HasMany
    {
        return $this->hasMany(AttendanceLog::class, 'device_id');
    }

    public function agents(): HasMany
    {
        return $this->hasMany(BiometricAgent::class, 'device_id');
    }
}
