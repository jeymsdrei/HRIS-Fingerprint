<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $loan_id
 * @property int|null $payroll_id
 * @property numeric $amount
 * @property Carbon $payment_date
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Loan $loan
 * @property-read Payroll|null $payroll
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LoanPayment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LoanPayment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LoanPayment query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LoanPayment whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LoanPayment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LoanPayment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LoanPayment whereLoanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LoanPayment wherePaymentDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LoanPayment wherePayrollId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LoanPayment whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class LoanPayment extends Model
{
    use HasFactory;

    protected $fillable = ['loan_id', 'payroll_id', 'amount', 'payment_date'];

    protected $casts = ['payment_date' => 'date'];

    public function loan(): BelongsTo
    {
        return $this->belongsTo(Loan::class);
    }

    public function payroll(): BelongsTo
    {
        return $this->belongsTo(Payroll::class);
    }
}
