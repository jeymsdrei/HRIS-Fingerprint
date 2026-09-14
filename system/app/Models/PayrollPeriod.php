<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $name
 * @property string $type
 * @property Carbon $start_date
 * @property Carbon $end_date
 * @property Carbon $pay_date
 * @property string $status
 * @property int|null $generated_by
 * @property Carbon|null $generated_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read User|null $generator
 * @property-read Collection<int, Payroll> $payrolls
 * @property-read int|null $payrolls_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PayrollPeriod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PayrollPeriod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PayrollPeriod query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PayrollPeriod whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PayrollPeriod whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PayrollPeriod whereGeneratedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PayrollPeriod whereGeneratedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PayrollPeriod whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PayrollPeriod whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PayrollPeriod wherePayDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PayrollPeriod whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PayrollPeriod whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PayrollPeriod whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PayrollPeriod whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class PayrollPeriod extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'type', 'start_date', 'end_date', 'pay_date',
        'status', 'generated_by', 'generated_at',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'pay_date' => 'date',
        'generated_at' => 'datetime',
    ];

    public function payrolls(): HasMany
    {
        return $this->hasMany(Payroll::class);
    }

    public function generator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'generated_by');
    }
}
