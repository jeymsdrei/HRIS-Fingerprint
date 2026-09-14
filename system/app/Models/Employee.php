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
 * @property string $employee_id
 * @property int|null $user_id
 * @property int|null $department_id
 * @property int|null $position_id
 * @property int|null $course_id
 * @property string $first_name
 * @property string|null $middle_name
 * @property string $last_name
 * @property string|null $suffix
 * @property Carbon|null $birth_date
 * @property string|null $gender
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $photo_path
 * @property string $classification
 * @property string $employment_status
 * @property string $salary_type
 * @property numeric $monthly_salary
 * @property numeric $semi_monthly_salary
 * @property numeric $daily_rate
 * @property numeric $hourly_rate
 * @property numeric $teaching_load
 * @property int|null $fingerprint_id
 * @property string|null $fingerprint_template
 * @property string|null $sss_no
 * @property string|null $philhealth_no
 * @property string|null $pagibig_no
 * @property string|null $tin
 * @property string $tax_status
 * @property string|null $bank_name
 * @property string|null $bank_account_no
 * @property string $payment_method
 * @property Carbon|null $date_hired
 * @property Carbon|null $date_resigned
 * @property bool $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, Attendance> $attendances
 * @property-read int|null $attendances_count
 * @property-read Collection<int, EmployeeBenefit> $benefits
 * @property-read int|null $benefits_count
 * @property-read Course|null $course
 * @property-read Collection<int, EmployeeClearance> $clearances
 * @property-read int|null $clearances_count
 * @property-read Department|null $department
 * @property-read string $full_name
 * @property-read bool $is_permanent
 * @property-read bool $is_teaching
 * @property-read Collection<int, Loan> $loans
 * @property-read int|null $loans_count
 * @property-read Collection<int, MakeUpClass> $makeUpClasses
 * @property-read int|null $make_up_classes_count
 * @property-read Collection<int, PayrollReceipt> $payrollReceipts
 * @property-read int|null $payroll_receipts_count
 * @property-read Collection<int, Payroll> $payrolls
 * @property-read int|null $payrolls_count
 * @property-read Collection<int, Payslip> $payslips
 * @property-read int|null $payslips_count
 * @property-read Position|null $position
 * @property-read Collection<int, TeachingSchedule> $teachingSchedules
 * @property-read int|null $teaching_schedules_count
 * @property-read User|null $user
 * @property-read Collection<int, WorkSchedule> $workSchedules
 * @property-read int|null $work_schedules_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereBankAccountNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereBankName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereClassification($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereDailyRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereDateHired($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereDateResigned($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereEmploymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereFingerprintId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereFingerprintTemplate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereHourlyRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereMiddleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereMonthlySalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee wherePagibigNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee wherePhilhealthNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee wherePhotoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee wherePositionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereSalaryType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereSssNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereSuffix($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereTaxStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereTeachingLoad($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereTin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereUserId($value)
 *
 * @mixin \Eloquent
 */
class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id', 'user_id', 'department_id', 'position_id', 'course_id',
        'first_name', 'middle_name', 'last_name', 'suffix', 'birth_date',
        'gender', 'email', 'phone', 'address', 'photo_path',
        'classification', 'employment_status', 'salary_type',
        'monthly_salary', 'semi_monthly_salary', 'daily_rate', 'hourly_rate', 'teaching_load',
        'fingerprint_id', 'fingerprint_template',
        'sss_no', 'philhealth_no', 'pagibig_no', 'tin', 'tax_status',
        'bank_name', 'bank_account_no', 'payment_method',
        'date_hired', 'date_resigned', 'is_active',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'date_hired' => 'date',
        'date_resigned' => 'date',
        'monthly_salary' => 'decimal:2',
        'semi_monthly_salary' => 'decimal:2',
        'daily_rate' => 'decimal:2',
        'hourly_rate' => 'decimal:2',
        'teaching_load' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function getFullNameAttribute(): string
    {
        return trim($this->first_name.' '.($this->middle_name ? mb_substr($this->middle_name, 0, 1).'. ' : '').$this->last_name.($this->suffix ? ' '.$this->suffix : ''));
    }

    public function getIsTeachingAttribute(): bool
    {
        return $this->classification === 'teaching';
    }

    public function getIsPermanentAttribute(): bool
    {
        return $this->employment_status === 'permanent';
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * @return HasMany<TeachingSchedule, $this>
     */
    public function teachingSchedules(): HasMany
    {
        return $this->hasMany(TeachingSchedule::class);
    }

    /**
     * @return HasMany<WorkSchedule, $this>
     */
    public function workSchedules(): HasMany
    {
        return $this->hasMany(WorkSchedule::class);
    }

    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }

    /**
     * @return HasMany<MakeUpClass, $this>
     */
    public function makeUpClasses(): HasMany
    {
        return $this->hasMany(MakeUpClass::class);
    }

    public function clearances(): HasMany
    {
        return $this->hasMany(EmployeeClearance::class);
    }

    /**
     * @return HasMany<EmployeeBenefit, $this>
     */
    public function benefits(): HasMany
    {
        return $this->hasMany(EmployeeBenefit::class);
    }

    /**
     * @return HasMany<Loan, $this>
     */
    public function loans(): HasMany
    {
        return $this->hasMany(Loan::class);
    }

    public function payrolls(): HasMany
    {
        return $this->hasMany(Payroll::class);
    }

    public function payslips(): HasMany
    {
        return $this->hasMany(Payslip::class);
    }

    public function payrollReceipts(): HasMany
    {
        return $this->hasMany(PayrollReceipt::class);
    }

    public function hasCompleteClearance(): bool
    {
        $required = Clearance::where('is_required', true)->pluck('id');
        if ($required->isEmpty()) {
            return true;
        }
        $cleared = $this->clearances()->where('status', 'cleared')->pluck('clearance_id');

        return $required->diff($cleared)->isEmpty();
    }
}
