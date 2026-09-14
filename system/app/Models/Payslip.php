<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $payslip_no
 * @property int $payroll_id
 * @property int $employee_id
 * @property string|null $digital_signature
 * @property Carbon|null $generated_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Employee $employee
 * @property-read Payroll $payroll
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payslip newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payslip newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payslip query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payslip whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payslip whereDigitalSignature($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payslip whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payslip whereGeneratedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payslip whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payslip wherePayrollId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payslip wherePayslipNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payslip whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Payslip extends Model
{
    use HasFactory;

    protected $fillable = ['payslip_no', 'payroll_id', 'employee_id', 'digital_signature', 'generated_at'];

    protected $casts = ['generated_at' => 'datetime'];

    public function payroll(): BelongsTo
    {
        return $this->belongsTo(Payroll::class);
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
