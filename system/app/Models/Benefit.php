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
 * @property string $type
 * @property numeric $amount
 * @property string $frequency
 * @property bool $is_taxable
 * @property bool $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, EmployeeBenefit> $employeeBenefits
 * @property-read int|null $employee_benefits_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Benefit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Benefit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Benefit query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Benefit whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Benefit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Benefit whereFrequency($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Benefit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Benefit whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Benefit whereIsTaxable($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Benefit whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Benefit whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Benefit whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Benefit extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type', 'amount', 'frequency', 'is_taxable', 'is_active'];

    protected $casts = ['is_taxable' => 'boolean', 'is_active' => 'boolean'];

    public function employeeBenefits(): HasMany
    {
        return $this->hasMany(EmployeeBenefit::class);
    }
}
