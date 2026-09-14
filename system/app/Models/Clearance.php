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
 * @property string|null $description
 * @property bool $is_required
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, EmployeeClearance> $employeeClearances
 * @property-read int|null $employee_clearances_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Clearance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Clearance newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Clearance query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Clearance whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Clearance whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Clearance whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Clearance whereIsRequired($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Clearance whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Clearance whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Clearance extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'is_required'];

    protected $casts = ['is_required' => 'boolean'];

    public function employeeClearances(): HasMany
    {
        return $this->hasMany(EmployeeClearance::class);
    }
}
