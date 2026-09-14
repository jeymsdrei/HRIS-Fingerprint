<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $employee_id
 * @property int $benefit_id
 * @property numeric|null $amount
 * @property Carbon|null $effective_date
 * @property Carbon|null $expiration_date
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Benefit $benefit
 * @property-read Employee $employee
 * @property-read float $effective_amount
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeBenefit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeBenefit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeBenefit query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeBenefit whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeBenefit whereBenefitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeBenefit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeBenefit whereEffectiveDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeBenefit whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeBenefit whereExpirationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeBenefit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeBenefit whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class EmployeeBenefit extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id', 'benefit_id', 'amount', 'effective_date', 'expiration_date'];

    protected $casts = ['effective_date' => 'date', 'expiration_date' => 'date'];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function benefit(): BelongsTo
    {
        return $this->belongsTo(Benefit::class);
    }

    public function getEffectiveAmountAttribute(): float
    {
        return round($this->amount ?? $this->benefit->amount ?? 0, 2);
    }
}
