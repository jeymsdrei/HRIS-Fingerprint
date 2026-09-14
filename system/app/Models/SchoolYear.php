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
 * @property Carbon $start_date
 * @property Carbon $end_date
 * @property bool $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, Semester> $semesters
 * @property-read int|null $semesters_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SchoolYear newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SchoolYear newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SchoolYear query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SchoolYear whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SchoolYear whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SchoolYear whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SchoolYear whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SchoolYear whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SchoolYear whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SchoolYear whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class SchoolYear extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'start_date', 'end_date', 'is_active'];

    protected $casts = ['start_date' => 'date', 'end_date' => 'date', 'is_active' => 'boolean'];

    public function semesters(): HasMany
    {
        return $this->hasMany(Semester::class);
    }
}
