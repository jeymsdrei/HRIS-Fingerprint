<?php declare(strict_types = 1);

// odsl-C:\Users\Ryzen\Desktop\hrissystem-20260812T090006Z-1-001\hrissystem\system\app\Models\Employee.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Models\Employee
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.2.12-7d54bfd0000a3597e6c5817a215548b7b69b7c3f9ed4966a3f25a0a49867e00c',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Models\\Employee',
        'filename' => 'C:/Users/Ryzen/Desktop/hrissystem-20260812T090006Z-1-001/hrissystem/system/app/Models/Employee.php',
      ),
    ),
    'namespace' => 'App\\Models',
    'name' => 'App\\Models\\Employee',
    'shortName' => 'Employee',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
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
 * @property-read Collection<int, EmployeeRequirement> $requirements
 * @property-read int|null $requirements_count
 * @property-read Collection<int, TeachingSchedule> $teachingSchedules
 * @property-read int|null $teaching_schedules_count
 * @property-read User|null $user
 * @property-read Collection<int, WorkSchedule> $workSchedules
 * @property-read int|null $work_schedules_count
 *
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee newModelQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee newQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee query()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereAddress($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereBankAccountNo($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereBankName($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereBirthDate($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereClassification($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereCourseId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereCreatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereDailyRate($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereDateHired($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereDateResigned($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereDepartmentId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereEmail($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereEmployeeId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereEmploymentStatus($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereFingerprintId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereFingerprintTemplate($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereFirstName($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereGender($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereHourlyRate($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereIsActive($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereLastName($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereMiddleName($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereMonthlySalary($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee wherePagibigNo($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee wherePaymentMethod($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee wherePhilhealthNo($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee wherePhone($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee wherePhotoPath($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee wherePositionId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereSalaryType($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereSssNo($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereSuffix($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereTaxStatus($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereTeachingLoad($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereTin($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereUpdatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereUserId($value)
 *
 * @mixin \\Eloquent
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 125,
    'endLine' => 282,
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
    ),
    'immediateProperties' => 
    array (
      'fillable' => 
      array (
        'declaringClassName' => 'App\\Models\\Employee',
        'implementingClassName' => 'App\\Models\\Employee',
        'name' => 'fillable',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'employee_id\', \'user_id\', \'department_id\', \'position_id\', \'course_id\', \'first_name\', \'middle_name\', \'last_name\', \'suffix\', \'birth_date\', \'gender\', \'email\', \'phone\', \'address\', \'photo_path\', \'classification\', \'employment_status\', \'salary_type\', \'monthly_salary\', \'daily_rate\', \'hourly_rate\', \'teaching_load\', \'fingerprint_id\', \'fingerprint_template\', \'sss_no\', \'philhealth_no\', \'pagibig_no\', \'tin\', \'tax_status\', \'bank_name\', \'bank_account_no\', \'payment_method\', \'date_hired\', \'date_resigned\', \'is_active\']',
          'attributes' => 
          array (
            'startLine' => 129,
            'endLine' => 139,
            'startTokenPos' => 60,
            'startFilePos' => 7114,
            'endTokenPos' => 167,
            'endFilePos' => 7698,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 129,
        'endLine' => 139,
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
        'declaringClassName' => 'App\\Models\\Employee',
        'implementingClassName' => 'App\\Models\\Employee',
        'name' => 'casts',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'birth_date\' => \'date\', \'date_hired\' => \'date\', \'date_resigned\' => \'date\', \'monthly_salary\' => \'decimal:2\', \'daily_rate\' => \'decimal:2\', \'hourly_rate\' => \'decimal:2\', \'teaching_load\' => \'decimal:2\', \'is_active\' => \'boolean\']',
          'attributes' => 
          array (
            'startLine' => 141,
            'endLine' => 150,
            'startTokenPos' => 176,
            'startFilePos' => 7725,
            'endTokenPos' => 234,
            'endFilePos' => 8020,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 141,
        'endLine' => 150,
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
      'getFullNameAttribute' => 
      array (
        'name' => 'getFullNameAttribute',
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
        'startLine' => 152,
        'endLine' => 155,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Employee',
        'implementingClassName' => 'App\\Models\\Employee',
        'currentClassName' => 'App\\Models\\Employee',
        'aliasName' => NULL,
      ),
      'getIsTeachingAttribute' => 
      array (
        'name' => 'getIsTeachingAttribute',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'bool',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 157,
        'endLine' => 160,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Employee',
        'implementingClassName' => 'App\\Models\\Employee',
        'currentClassName' => 'App\\Models\\Employee',
        'aliasName' => NULL,
      ),
      'getIsPermanentAttribute' => 
      array (
        'name' => 'getIsPermanentAttribute',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'bool',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 162,
        'endLine' => 165,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Employee',
        'implementingClassName' => 'App\\Models\\Employee',
        'currentClassName' => 'App\\Models\\Employee',
        'aliasName' => NULL,
      ),
      'user' => 
      array (
        'name' => 'user',
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
        'startLine' => 167,
        'endLine' => 170,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Employee',
        'implementingClassName' => 'App\\Models\\Employee',
        'currentClassName' => 'App\\Models\\Employee',
        'aliasName' => NULL,
      ),
      'department' => 
      array (
        'name' => 'department',
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
        'startLine' => 172,
        'endLine' => 175,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Employee',
        'implementingClassName' => 'App\\Models\\Employee',
        'currentClassName' => 'App\\Models\\Employee',
        'aliasName' => NULL,
      ),
      'position' => 
      array (
        'name' => 'position',
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
        'startLine' => 177,
        'endLine' => 180,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Employee',
        'implementingClassName' => 'App\\Models\\Employee',
        'currentClassName' => 'App\\Models\\Employee',
        'aliasName' => NULL,
      ),
      'course' => 
      array (
        'name' => 'course',
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
        'startLine' => 182,
        'endLine' => 185,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Employee',
        'implementingClassName' => 'App\\Models\\Employee',
        'currentClassName' => 'App\\Models\\Employee',
        'aliasName' => NULL,
      ),
      'teachingSchedules' => 
      array (
        'name' => 'teachingSchedules',
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
        'docComment' => '/**
 * @return HasMany<TeachingSchedule, $this>
 */',
        'startLine' => 190,
        'endLine' => 193,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Employee',
        'implementingClassName' => 'App\\Models\\Employee',
        'currentClassName' => 'App\\Models\\Employee',
        'aliasName' => NULL,
      ),
      'workSchedules' => 
      array (
        'name' => 'workSchedules',
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
        'docComment' => '/**
 * @return HasMany<WorkSchedule, $this>
 */',
        'startLine' => 198,
        'endLine' => 201,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Employee',
        'implementingClassName' => 'App\\Models\\Employee',
        'currentClassName' => 'App\\Models\\Employee',
        'aliasName' => NULL,
      ),
      'attendances' => 
      array (
        'name' => 'attendances',
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
        'startLine' => 203,
        'endLine' => 206,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Employee',
        'implementingClassName' => 'App\\Models\\Employee',
        'currentClassName' => 'App\\Models\\Employee',
        'aliasName' => NULL,
      ),
      'makeUpClasses' => 
      array (
        'name' => 'makeUpClasses',
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
        'docComment' => '/**
 * @return HasMany<MakeUpClass, $this>
 */',
        'startLine' => 211,
        'endLine' => 214,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Employee',
        'implementingClassName' => 'App\\Models\\Employee',
        'currentClassName' => 'App\\Models\\Employee',
        'aliasName' => NULL,
      ),
      'clearances' => 
      array (
        'name' => 'clearances',
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
        'startLine' => 216,
        'endLine' => 219,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Employee',
        'implementingClassName' => 'App\\Models\\Employee',
        'currentClassName' => 'App\\Models\\Employee',
        'aliasName' => NULL,
      ),
      'requirements' => 
      array (
        'name' => 'requirements',
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
        'startLine' => 221,
        'endLine' => 224,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Employee',
        'implementingClassName' => 'App\\Models\\Employee',
        'currentClassName' => 'App\\Models\\Employee',
        'aliasName' => NULL,
      ),
      'benefits' => 
      array (
        'name' => 'benefits',
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
        'docComment' => '/**
 * @return HasMany<EmployeeBenefit, $this>
 */',
        'startLine' => 229,
        'endLine' => 232,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Employee',
        'implementingClassName' => 'App\\Models\\Employee',
        'currentClassName' => 'App\\Models\\Employee',
        'aliasName' => NULL,
      ),
      'loans' => 
      array (
        'name' => 'loans',
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
        'docComment' => '/**
 * @return HasMany<Loan, $this>
 */',
        'startLine' => 237,
        'endLine' => 240,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Employee',
        'implementingClassName' => 'App\\Models\\Employee',
        'currentClassName' => 'App\\Models\\Employee',
        'aliasName' => NULL,
      ),
      'payrolls' => 
      array (
        'name' => 'payrolls',
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
        'startLine' => 242,
        'endLine' => 245,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Employee',
        'implementingClassName' => 'App\\Models\\Employee',
        'currentClassName' => 'App\\Models\\Employee',
        'aliasName' => NULL,
      ),
      'payslips' => 
      array (
        'name' => 'payslips',
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
        'startLine' => 247,
        'endLine' => 250,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Employee',
        'implementingClassName' => 'App\\Models\\Employee',
        'currentClassName' => 'App\\Models\\Employee',
        'aliasName' => NULL,
      ),
      'payrollReceipts' => 
      array (
        'name' => 'payrollReceipts',
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
        'startLine' => 252,
        'endLine' => 255,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Employee',
        'implementingClassName' => 'App\\Models\\Employee',
        'currentClassName' => 'App\\Models\\Employee',
        'aliasName' => NULL,
      ),
      'hasCompleteClearance' => 
      array (
        'name' => 'hasCompleteClearance',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'bool',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 257,
        'endLine' => 266,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Employee',
        'implementingClassName' => 'App\\Models\\Employee',
        'currentClassName' => 'App\\Models\\Employee',
        'aliasName' => NULL,
      ),
      'hasCompleteRequirements' => 
      array (
        'name' => 'hasCompleteRequirements',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'bool',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 268,
        'endLine' => 281,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Employee',
        'implementingClassName' => 'App\\Models\\Employee',
        'currentClassName' => 'App\\Models\\Employee',
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