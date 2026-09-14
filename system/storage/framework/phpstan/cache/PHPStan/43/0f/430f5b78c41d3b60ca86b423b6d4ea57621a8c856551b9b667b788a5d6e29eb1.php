<?php declare(strict_types = 1);

// odsl-C:\Users\Ryzen\Desktop\hrissystem-20260812T090006Z-1-001\hrissystem\system\app\Models\LoanPayment.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Models\LoanPayment
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.2.12-6dfdfeb0934112477667655ed7079c5bdef6595dcb780e19e93ba56b4a1babbe',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Models\\LoanPayment',
        'filename' => 'C:/Users/Ryzen/Desktop/hrissystem-20260812T090006Z-1-001/hrissystem/system/app/Models/LoanPayment.php',
      ),
    ),
    'namespace' => 'App\\Models',
    'name' => 'App\\Models\\LoanPayment',
    'shortName' => 'LoanPayment',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
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
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|LoanPayment newModelQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|LoanPayment newQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|LoanPayment query()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|LoanPayment whereAmount($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|LoanPayment whereCreatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|LoanPayment whereId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|LoanPayment whereLoanId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|LoanPayment wherePaymentDate($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|LoanPayment wherePayrollId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|LoanPayment whereUpdatedAt($value)
 *
 * @mixin \\Eloquent
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 34,
    'endLine' => 51,
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
        'declaringClassName' => 'App\\Models\\LoanPayment',
        'implementingClassName' => 'App\\Models\\LoanPayment',
        'name' => 'fillable',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'loan_id\', \'payroll_id\', \'amount\', \'payment_date\']',
          'attributes' => 
          array (
            'startLine' => 38,
            'endLine' => 38,
            'startTokenPos' => 50,
            'startFilePos' => 1558,
            'endTokenPos' => 61,
            'endFilePos' => 1608,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 38,
        'endLine' => 38,
        'startColumn' => 5,
        'endColumn' => 78,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'casts' => 
      array (
        'declaringClassName' => 'App\\Models\\LoanPayment',
        'implementingClassName' => 'App\\Models\\LoanPayment',
        'name' => 'casts',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'payment_date\' => \'date\']',
          'attributes' => 
          array (
            'startLine' => 40,
            'endLine' => 40,
            'startTokenPos' => 70,
            'startFilePos' => 1635,
            'endTokenPos' => 76,
            'endFilePos' => 1660,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 40,
        'endLine' => 40,
        'startColumn' => 5,
        'endColumn' => 50,
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
      'loan' => 
      array (
        'name' => 'loan',
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
        'startLine' => 42,
        'endLine' => 45,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\LoanPayment',
        'implementingClassName' => 'App\\Models\\LoanPayment',
        'currentClassName' => 'App\\Models\\LoanPayment',
        'aliasName' => NULL,
      ),
      'payroll' => 
      array (
        'name' => 'payroll',
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
        'startLine' => 47,
        'endLine' => 50,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\LoanPayment',
        'implementingClassName' => 'App\\Models\\LoanPayment',
        'currentClassName' => 'App\\Models\\LoanPayment',
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