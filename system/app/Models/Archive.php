<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $archive_type
 * @property string|null $ref_type
 * @property int|null $ref_id
 * @property string $period_type
 * @property string $period_label
 * @property array<array-key, mixed>|null $data
 * @property int|null $archived_by
 * @property Carbon $archived_at
 * @property-read User|null $archiver
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Archive newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Archive newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Archive query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Archive whereArchiveType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Archive whereArchivedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Archive whereArchivedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Archive whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Archive whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Archive wherePeriodLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Archive wherePeriodType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Archive whereRefId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Archive whereRefType($value)
 *
 * @mixin \Eloquent
 */
class Archive extends Model
{
    use HasFactory;

    protected $fillable = [
        'archive_type', 'record_type', 'ref_id', 'period_type',
        'period_label', 'data', 'archived_by', 'archived_at',
    ];

    public $timestamps = false;

    protected $casts = ['data' => 'array', 'archived_at' => 'datetime'];

    public function archiver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'archived_by');
    }
}
