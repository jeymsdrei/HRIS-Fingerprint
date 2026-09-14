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
 * @property int $employee_id
 * @property string $loan_type
 * @property string|null $reference_no
 * @property numeric $amount
 * @property numeric $interest_rate
 * @property numeric $monthly_amortization
 * @property numeric $balance
 * @property Carbon|null $start_date
 * @property Carbon|null $end_date
 * @property string $status
 * @property string|null $remarks
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Employee $employee
 * @property-read Collection<int, LoanPayment> $payments
 * @property-read int|null $payments_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Loan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Loan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Loan query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Loan whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Loan whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Loan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Loan whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Loan whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Loan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Loan whereInterestRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Loan whereLoanType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Loan whereMonthlyAmortization($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Loan whereReferenceNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Loan whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Loan whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Loan whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Loan whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id', 'loan_type', 'reference_no', 'amount', 'interest_rate',
        'monthly_amortization', 'balance', 'start_date', 'end_date', 'status', 'remarks',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'interest_rate' => 'decimal:2',
        'monthly_amortization' => 'decimal:2',
        'balance' => 'decimal:2',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    /**
     * @return HasMany<LoanPayment, $this>
     */
    public function payments(): HasMany
    {
        return $this->hasMany(LoanPayment::class);
    }
}
