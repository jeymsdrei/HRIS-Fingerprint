<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $payroll_period_id
 * @property int $employee_id
 * @property numeric $basic_pay
 * @property numeric $teaching_hours
 * @property numeric $teaching_pay
 * @property numeric $make_up_pay
 * @property numeric $allowances
 * @property numeric $overtime_pay
 * @property numeric $benefits
 * @property numeric $gross_pay
 * @property numeric $deduction_late
 * @property numeric $deduction_absent
 * @property numeric $deduction_undertime
 * @property numeric $deduction_tax
 * @property numeric $deduction_sss
 * @property numeric $deduction_philhealth
 * @property numeric $deduction_pagibig
 * @property numeric $deduction_loans
 * @property numeric $deduction_cash_advance
 * @property numeric $deduction_other
 * @property numeric $total_deductions
 * @property numeric $net_pay
 * @property int $days_present
 * @property int $days_late
 * @property int $days_absent
 * @property int $late_minutes_total
 * @property int $undertime_minutes_total
 * @property numeric $overtime_hours_total
 * @property string $status
 * @property string|null $hold_reason
 * @property int|null $released_by
 * @property Carbon|null $released_at
 * @property string|null $notes
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Employee $employee
 * @property-read string $status_color
 * @property-read string $status_label
 * @property-read Collection<int, LoanPayment> $loanPayments
 * @property-read int|null $loan_payments_count
 * @property-read Payslip|null $payslip
 * @property-read PayrollPeriod $period
 * @property-read PayrollReceipt|null $receipt
 * @property-read User|null $releaser
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll whereAllowances($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll whereBasicPay($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll whereBenefits($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll whereDaysAbsent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll whereDaysLate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll whereDaysPresent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll whereDeductionAbsent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll whereDeductionCashAdvance($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll whereDeductionLate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll whereDeductionLoans($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll whereDeductionOther($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll whereDeductionPagibig($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll whereDeductionPhilhealth($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll whereDeductionSss($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll whereDeductionTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll whereDeductionUndertime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll whereGrossPay($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll whereHoldReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll whereLateMinutesTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll whereMakeUpPay($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll whereNetPay($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll whereOvertimeHoursTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll whereOvertimePay($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll wherePayrollPeriodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll whereReleasedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll whereReleasedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll whereTeachingHours($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll whereTeachingPay($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll whereTotalDeductions($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll whereUndertimeMinutesTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Payroll extends Model
{
    use HasFactory;

    protected $fillable = [
        'payroll_period_id', 'employee_id',
        'basic_pay', 'teaching_hours', 'teaching_pay', 'make_up_pay',
        'allowances', 'overtime_pay', 'benefits', 'gross_pay',
        'deduction_late', 'deduction_absent', 'deduction_undertime',
        'deduction_tax', 'deduction_sss', 'deduction_philhealth', 'deduction_pagibig',
        'deduction_loans', 'deduction_cash_advance', 'deduction_other', 'total_deductions',
        'net_pay', 'days_present', 'days_late', 'days_absent',
        'late_minutes_total', 'undertime_minutes_total', 'overtime_hours_total',
        'status', 'hold_reason', 'released_by', 'released_at', 'notes',
    ];

    protected $casts = [
        'released_at' => 'datetime',
    ];

    public const DRAFT = 'draft';

    public const ON_HOLD = 'on_hold';

    public const READY = 'ready';

    public const RELEASED = 'released';

    public function period(): BelongsTo
    {
        return $this->belongsTo(PayrollPeriod::class, 'payroll_period_id');
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function releaser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'released_by');
    }

    public function payslip(): HasOne
    {
        return $this->hasOne(Payslip::class);
    }

    public function receipt(): HasOne
    {
        return $this->hasOne(PayrollReceipt::class);
    }

    public function loanPayments(): HasMany
    {
        return $this->hasMany(LoanPayment::class);
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'draft' => 'Draft',
            'on_hold' => 'On Hold',
            'ready' => 'Ready',
            'released' => 'Released',
            default => ucfirst($this->status),
        };
    }

    public function getStatusColorAttribute(): string
    {
        return match ($this->status) {
            'draft' => 'gray',
            'on_hold' => 'red',
            'ready' => 'blue',
            'released' => 'green',
            default => 'gray',
        };
    }
}
