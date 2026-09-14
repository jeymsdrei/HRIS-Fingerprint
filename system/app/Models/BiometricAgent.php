<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $agent_id
 * @property int|null $device_id
 * @property string|null $name
 * @property string|null $computer_name
 * @property string|null $api_base_url
 * @property string $status
 * @property Carbon|null $last_seen_at
 * @property bool $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BiometricAgent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BiometricAgent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BiometricAgent query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BiometricAgent whereAgentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BiometricAgent whereApiBaseUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BiometricAgent whereComputerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BiometricAgent whereCreatedAt($value)
 * @param  int  $value
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BiometricAgent whereDeviceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BiometricAgent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BiometricAgent whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BiometricAgent whereLastSeenAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BiometricAgent whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BiometricAgent whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BiometricAgent whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class BiometricAgent extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_id', 'device_id', 'name', 'computer_name', 'api_base_url',
        'status', 'last_seen_at', 'is_active',
    ];

    protected $casts = [
        'last_seen_at' => 'datetime',
        'is_active' => 'boolean',
    ];

    public function device(): BelongsTo
    {
        return $this->belongsTo(BiometricDevice::class, 'device_id');
    }
}