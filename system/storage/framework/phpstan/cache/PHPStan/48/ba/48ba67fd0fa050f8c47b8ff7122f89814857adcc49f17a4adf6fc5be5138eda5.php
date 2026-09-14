<?php declare(strict_types = 1);

// odsl-C:\Users\Ryzen\Desktop\hrissystem-20260812T090006Z-1-001\hrissystem\system\app\Models\Payroll.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Models\Payroll
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.2.12-a580f756944eb69302c50a4abc177fd5ce99c78b1c728bd7e9c083a0c55f7318',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Models\\Payroll',
        'filename' => 'C:/Users/Ryzen/Desktop/hrissystem-20260812T090006Z-1-001/hrissystem/system/app/Models/Payroll.php',
      ),
    ),
    'namespace' => 'App\\Models',
    'name' => 'App\\Models\\Payroll',
    'shortName' => 'Payroll',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
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
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll newModelQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll newQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll query()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereAllowances($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereBasicPay($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereBenefits($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereCreatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereDaysAbsent($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereDaysLate($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereDaysPresent($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereDeductionAbsent($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereDeductionCashAdvance($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereDeductionLate($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereDeductionLoans($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereDeductionOther($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereDeductionPagibig($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereDeductionPhilhealth($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereDeductionSss($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereDeductionTax($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereDeductionUndertime($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereEmployeeId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereGrossPay($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereHoldReason($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereLateMinutesTotal($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereMakeUpPay($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereNetPay($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereNotes($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereOvertimeHoursTotal($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereOvertimePay($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll wherePayrollPeriodId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereReleasedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereReleasedBy($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereStatus($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereTeachingHours($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereTeachingPay($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereTotalDeductions($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereUndertimeMinutesTotal($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereUpdatedAt($value)
 *
 * @mixin \\Eloquent
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 102,
    'endLine' => 181,
    'startColumn' => 1,
    'endColumn' => 1,
    'parentClassName' => 'Illuminate\\Database\\Eloquent\\Model',
    'implementsClassNames' => 
    array (
    ),
    'traitClassNames' => 
    array (
      0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
    ),
    'immediateConstants' => 
    array (
      'DRAFT' => 
      array (
        'declaringClassName' => 'App\\Models\\Payroll',
        'implementingClassName' => 'App\\Models\\Payroll',
        'name' => 'DRAFT',
        'modifiers' => 1,
        'type' => NULL,
        'value' => 
        array (
          'code' => '\'draft\'',
          'attributes' => 
          array (
            'startLine' => 122,
            'endLine' => 122,
            'startTokenPos' => 195,
            'startFilePos' => 6649,
            'endTokenPos' => 195,
            'endFilePos' => 6655,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 122,
        'endLine' => 122,
        'startColumn' => 5,
        'endColumn' => 33,
      ),
      'ON_HOLD' => 
      array (
        'declaringClassName' => 'App\\Models\\Payroll',
        'implementingClassName' => 'App\\Models\\Payroll',
        'name' => 'ON_HOLD',
        'modifiers' => 1,
        'type' => NULL,
        'value' => 
        array (
          'code' => '\'on_hold\'',
          'attributes' => 
          array (
            'startLine' => 124,
            'endLine' => 124,
            'startTokenPos' => 206,
            'startFilePos' => 6686,
            'endTokenPos' => 206,
            'endFilePos' => 6694,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 124,
        'endLine' => 124,
        'startColumn' => 5,
        'endColumn' => 37,
      ),
      'READY' => 
      array (
        'declaringClassName' => 'App\\Models\\Payroll',
        'implementingClassName' => 'App\\Models\\Payroll',
        'name' => 'READY',
        'modifiers' => 1,
        'type' => NULL,
        'value' => 
        array (
          'code' => '\'ready\'',
          'attributes' => 
          array (
            'startLine' => 126,
            'endLine' => 126,
            'startTokenPos' => 217,
            'startFilePos' => 6723,
            'endTokenPos' => 217,
            'endFilePos' => 6729,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 126,
        'endLine' => 126,
        'startColumn' => 5,
        'endColumn' => 33,
      ),
      'RELEASED' => 
      array (
        'declaringClassName' => 'App\\Models\\Payroll',
        'implementingClassName' => 'App\\Models\\Payroll',
        'name' => 'RELEASED',
        'modifiers' => 1,
        'type' => NULL,
        'value' => 
        array (
          'code' => '\'released\'',
          'attributes' => 
          array (
            'startLine' => 128,
            'endLine' => 128,
            'startTokenPos' => 228,
            'startFilePos' => 6761,
            'endTokenPos' => 228,
            'endFilePos' => 6770,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 128,
        'endLine' => 128,
        'startColumn' => 5,
        'endColumn' => 39,
      ),
    ),
    'immediateProperties' => 
    array (
      'fillable' => 
      array (
        'declaringClassName' => 'App\\Models\\Payroll',
        'implementingClassName' => 'App\\Models\\Payroll',
        'name' => 'fillable',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'payroll_period_id\', \'employee_id\', \'basic_pay\', \'teaching_hours\', \'teaching_pay\', \'make_up_pay\', \'allowances\', \'overtime_pay\', \'benefits\', \'gross_pay\', \'deduction_late\', \'deduction_absent\', \'deduction_undertime\', \'deduction_tax\', \'deduction_sss\', \'deduction_philhealth\', \'deduction_pagibig\', \'deduction_loans\', \'deduction_cash_advance\', \'deduction_other\', \'total_deductions\', \'net_pay\', \'days_present\', \'days_late\', \'days_absent\', \'late_minutes_total\', \'undertime_minutes_total\', \'overtime_hours_total\', \'status\', \'hold_reason\', \'released_by\', \'released_at\', \'notes\']',
          'attributes' => 
          array (
            'startLine' => 106,
            'endLine' => 116,
            'startTokenPos' => 65,
            'startFilePos' => 5903,
            'endTokenPos' => 166,
            'endFilePos' => 6550,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 106,
        'endLine' => 116,
        'startColumn' => 5,
        'endColumn' => 6,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'casts' => 
      array (
        'declaringClassName' => 'App\\Models\\Payroll',
        'implementingClassName' => 'App\\Models\\Payroll',
        'name' => 'casts',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'released_at\' => \'datetime\']',
          'attributes' => 
          array (
            'startLine' => 118,
            'endLine' => 120,
            'startTokenPos' => 175,
            'startFilePos' => 6577,
            'endTokenPos' => 184,
            'endFilePos' => 6620,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 118,
        'endLine' => 120,
        'startColumn' => 5,
        'endColumn' => 6,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
    ),
    'immediateMethods' => 
    array (
      'period' => 
      array (
        'name' => 'period',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 130,
        'endLine' => 133,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Payroll',
        'implementingClassName' => 'App\\Models\\Payroll',
        'currentClassName' => 'App\\Models\\Payroll',
        'aliasName' => NULL,
      ),
      'employee' => 
      array (
        'name' => 'employee',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 135,
        'endLine' => 138,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Payroll',
        'implementingClassName' => 'App\\Models\\Payroll',
        'currentClassName' => 'App\\Models\\Payroll',
        'aliasName' => NULL,
      ),
      'releaser' => 
      array (
        'name' => 'releaser',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 140,
        'endLine' => 143,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Payroll',
        'implementingClassName' => 'App\\Models\\Payroll',
        'currentClassName' => 'App\\Models\\Payroll',
        'aliasName' => NULL,
      ),
      'payslip' => 
      array (
        'name' => 'payslip',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Illuminate\\Database\\Eloquent\\Relations\\HasOne',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 145,
        'endLine' => 148,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Payroll',
        'implementingClassName' => 'App\\Models\\Payroll',
        'currentClassName' => 'App\\Models\\Payroll',
        'aliasName' => NULL,
      ),
      'receipt' => 
      array (
        'name' => 'receipt',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Illuminate\\Database\\Eloquent\\Relations\\HasOne',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 150,
        'endLine' => 153,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Payroll',
        'implementingClassName' => 'App\\Models\\Payroll',
        'currentClassName' => 'App\\Models\\Payroll',
        'aliasName' => NULL,
      ),
      'loanPayments' => 
      array (
        'name' => 'loanPayments',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 155,
        'endLine' => 158,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Payroll',
        'implementingClassName' => 'App\\Models\\Payroll',
        'currentClassName' => 'App\\Models\\Payroll',
        'aliasName' => NULL,
      ),
      'getStatusLabelAttribute' => 
      array (
        'name' => 'getStatusLabelAttribute',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'string',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 160,
        'endLine' => 169,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Payroll',
        'implementingClassName' => 'App\\Models\\Payroll',
        'currentClassName' => 'App\\Models\\Payroll',
        'aliasName' => NULL,
      ),
      'getStatusColorAttribute' => 
      array (
        'name' => 'getStatusColorAttribute',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'string',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 171,
        'endLine' => 180,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Payroll',
        'implementingClassName' => 'App\\Models\\Payroll',
        'currentClassName' => 'App\\Models\\Payroll',
        'aliasName' => NULL,
      ),
    ),
    'traitsData' => 
    array (
      'aliases' => 
      array (
      ),
      'modifiers' => 
      array (
      ),
      'precedences' => 
      array (
      ),
      'hashes' => 
      array (
      ),
    ),
  ),
));