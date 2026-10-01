<?php declare(strict_types = 1);

// odsl-C:\Users\Ryzen\Desktop\hrissystem-20260812T090006Z-1-001\hrissystem\system\app\Models\Loan.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Models\Loan
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.2.12-1190e3eb8cf8b6221d6a4269e4544e9edd9bbb7e9105ad6cc78d07d2a4157e82',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Models\\Loan',
        'filename' => 'C:/Users/Ryzen/Desktop/hrissystem-20260812T090006Z-1-001/hrissystem/system/app/Models/Loan.php',
      ),
    ),
    'namespace' => 'App\\Models',
    'name' => 'App\\Models\\Loan',
    'shortName' => 'Loan',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
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
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Loan newModelQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Loan newQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Loan query()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Loan whereAmount($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Loan whereBalance($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Loan whereCreatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Loan whereEmployeeId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Loan whereEndDate($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Loan whereId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Loan whereInterestRate($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Loan whereLoanType($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Loan whereMonthlyAmortization($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Loan whereReferenceNo($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Loan whereRemarks($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Loan whereStartDate($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Loan whereStatus($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Loan whereUpdatedAt($value)
 *
 * @mixin \\Eloquent
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 51,
    'endLine' => 91,
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
      'TYPE_SSS' => 
      array (
        'declaringClassName' => 'App\\Models\\Loan',
        'implementingClassName' => 'App\\Models\\Loan',
        'name' => 'TYPE_SSS',
        'modifiers' => 1,
        'type' => NULL,
        'value' => 
        array (
          'code' => '\'sss\'',
          'attributes' => 
          array (
            'startLine' => 55,
            'endLine' => 55,
            'startTokenPos' => 62,
            'startFilePos' => 2548,
            'endTokenPos' => 62,
            'endFilePos' => 2552,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 55,
        'endLine' => 55,
        'startColumn' => 5,
        'endColumn' => 34,
      ),
      'TYPE_PAGIBIG' => 
      array (
        'declaringClassName' => 'App\\Models\\Loan',
        'implementingClassName' => 'App\\Models\\Loan',
        'name' => 'TYPE_PAGIBIG',
        'modifiers' => 1,
        'type' => NULL,
        'value' => 
        array (
          'code' => '\'pagibig\'',
          'attributes' => 
          array (
            'startLine' => 57,
            'endLine' => 57,
            'startTokenPos' => 73,
            'startFilePos' => 2588,
            'endTokenPos' => 73,
            'endFilePos' => 2596,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 57,
        'endLine' => 57,
        'startColumn' => 5,
        'endColumn' => 42,
      ),
      'TYPE_COMPANY' => 
      array (
        'declaringClassName' => 'App\\Models\\Loan',
        'implementingClassName' => 'App\\Models\\Loan',
        'name' => 'TYPE_COMPANY',
        'modifiers' => 1,
        'type' => NULL,
        'value' => 
        array (
          'code' => '\'company\'',
          'attributes' => 
          array (
            'startLine' => 59,
            'endLine' => 59,
            'startTokenPos' => 84,
            'startFilePos' => 2632,
            'endTokenPos' => 84,
            'endFilePos' => 2640,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 59,
        'endLine' => 59,
        'startColumn' => 5,
        'endColumn' => 42,
      ),
      'TYPE_CASH_ADVANCE' => 
      array (
        'declaringClassName' => 'App\\Models\\Loan',
        'implementingClassName' => 'App\\Models\\Loan',
        'name' => 'TYPE_CASH_ADVANCE',
        'modifiers' => 1,
        'type' => NULL,
        'value' => 
        array (
          'code' => '\'cash_advance\'',
          'attributes' => 
          array (
            'startLine' => 61,
            'endLine' => 61,
            'startTokenPos' => 95,
            'startFilePos' => 2681,
            'endTokenPos' => 95,
            'endFilePos' => 2694,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 61,
        'endLine' => 61,
        'startColumn' => 5,
        'endColumn' => 52,
      ),
      'TYPE_OTHER' => 
      array (
        'declaringClassName' => 'App\\Models\\Loan',
        'implementingClassName' => 'App\\Models\\Loan',
        'name' => 'TYPE_OTHER',
        'modifiers' => 1,
        'type' => NULL,
        'value' => 
        array (
          'code' => '\'other\'',
          'attributes' => 
          array (
            'startLine' => 63,
            'endLine' => 63,
            'startTokenPos' => 106,
            'startFilePos' => 2728,
            'endTokenPos' => 106,
            'endFilePos' => 2734,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 63,
        'endLine' => 63,
        'startColumn' => 5,
        'endColumn' => 38,
      ),
    ),
    'immediateProperties' => 
    array (
      'fillable' => 
      array (
        'declaringClassName' => 'App\\Models\\Loan',
        'implementingClassName' => 'App\\Models\\Loan',
        'name' => 'fillable',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'employee_id\', \'loan_type\', \'reference_no\', \'amount\', \'interest_rate\', \'monthly_amortization\', \'balance\', \'start_date\', \'end_date\', \'status\', \'remarks\']',
          'attributes' => 
          array (
            'startLine' => 65,
            'endLine' => 68,
            'startTokenPos' => 115,
            'startFilePos' => 2764,
            'endTokenPos' => 150,
            'endFilePos' => 2939,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 65,
        'endLine' => 68,
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
        'declaringClassName' => 'App\\Models\\Loan',
        'implementingClassName' => 'App\\Models\\Loan',
        'name' => 'casts',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'amount\' => \'decimal:2\', \'interest_rate\' => \'decimal:2\', \'monthly_amortization\' => \'decimal:2\', \'balance\' => \'decimal:2\', \'start_date\' => \'date\', \'end_date\' => \'date\']',
          'attributes' => 
          array (
            'startLine' => 70,
            'endLine' => 77,
            'startTokenPos' => 159,
            'startFilePos' => 2966,
            'endTokenPos' => 203,
            'endFilePos' => 3188,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 70,
        'endLine' => 77,
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
        'startLine' => 79,
        'endLine' => 82,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Loan',
        'implementingClassName' => 'App\\Models\\Loan',
        'currentClassName' => 'App\\Models\\Loan',
        'aliasName' => NULL,
      ),
      'payments' => 
      array (
        'name' => 'payments',
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
 * @return HasMany<LoanPayment, $this>
 */',
        'startLine' => 87,
        'endLine' => 90,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Loan',
        'implementingClassName' => 'App\\Models\\Loan',
        'currentClassName' => 'App\\Models\\Loan',
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