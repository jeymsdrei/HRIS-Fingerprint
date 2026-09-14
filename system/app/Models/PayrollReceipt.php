<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $receipt_no
 * @property int $payroll_id
 * @property int $employee_id
 * @property numeric $amount_received
 * @property string $payment_method
 * @property string|null $employee_signature
 * @property string|null $hr_signature
 * @property Carbon|null $signed_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Employee $employee
 * @property-read Payroll $payroll
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PayrollReceipt newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PayrollReceipt newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PayrollReceipt query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PayrollReceipt whereAmountReceived($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PayrollReceipt whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PayrollReceipt whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PayrollReceipt whereEmployeeSignature($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PayrollReceipt whereHrSignature($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PayrollReceipt whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PayrollReceipt wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PayrollReceipt wherePayrollId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PayrollReceipt whereReceiptNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PayrollReceipt whereSignedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PayrollReceipt whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class PayrollReceipt extends Model
{
    use HasFactory;

    protected $fillable = [
        'receipt_no', 'payroll_id', 'employee_id', 'amount_received',
        'payment_method', 'employee_signature', 'hr_signature', 'signed_at',
    ];

    protected $casts = ['signed_at' => 'datetime'];

    public function payroll(): BelongsTo
    {
        return $this->belongsTo(Payroll::class);
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
