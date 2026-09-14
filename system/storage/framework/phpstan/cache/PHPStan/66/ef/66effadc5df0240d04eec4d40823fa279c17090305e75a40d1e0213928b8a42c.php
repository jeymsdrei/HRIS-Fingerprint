<?php declare(strict_types = 1);

// odsl-C:\Users\Ryzen\Desktop\hrissystem-20260812T090006Z-1-001\hrissystem\system\app\Models\PayrollReceipt.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Models\PayrollReceipt
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.2.12-e19dedda4f62373d5521504fbfd63cf1700ae49e5987447113e6907ef22542f1',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Models\\PayrollReceipt',
        'filename' => 'C:/Users/Ryzen/Desktop/hrissystem-20260812T090006Z-1-001/hrissystem/system/app/Models/PayrollReceipt.php',
      ),
    ),
    'namespace' => 'App\\Models',
    'name' => 'App\\Models\\PayrollReceipt',
    'shortName' => 'PayrollReceipt',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
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
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollReceipt newModelQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollReceipt newQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollReceipt query()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollReceipt whereAmountReceived($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollReceipt whereCreatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollReceipt whereEmployeeId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollReceipt whereEmployeeSignature($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollReceipt whereHrSignature($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollReceipt whereId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollReceipt wherePaymentMethod($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollReceipt wherePayrollId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollReceipt whereReceiptNo($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollReceipt whereSignedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollReceipt whereUpdatedAt($value)
 *
 * @mixin \\Eloquent
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 42,
    'endLine' => 62,
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
        'declaringClassName' => 'App\\Models\\PayrollReceipt',
        'implementingClassName' => 'App\\Models\\PayrollReceipt',
        'name' => 'fillable',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'receipt_no\', \'payroll_id\', \'employee_id\', \'amount_received\', \'payment_method\', \'employee_signature\', \'hr_signature\', \'signed_at\']',
          'attributes' => 
          array (
            'startLine' => 46,
            'endLine' => 49,
            'startTokenPos' => 50,
            'startFilePos' => 2187,
            'endTokenPos' => 76,
            'endFilePos' => 2340,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 46,
        'endLine' => 49,
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
        'declaringClassName' => 'App\\Models\\PayrollReceipt',
        'implementingClassName' => 'App\\Models\\PayrollReceipt',
        'name' => 'casts',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'signed_at\' => \'datetime\']',
          'attributes' => 
          array (
            'startLine' => 51,
            'endLine' => 51,
            'startTokenPos' => 85,
            'startFilePos' => 2367,
            'endTokenPos' => 91,
            'endFilePos' => 2393,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 51,
        'endLine' => 51,
        'startColumn' => 5,
        'endColumn' => 51,
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
        'startLine' => 53,
        'endLine' => 56,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\PayrollReceipt',
        'implementingClassName' => 'App\\Models\\PayrollReceipt',
        'currentClassName' => 'App\\Models\\PayrollReceipt',
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
        'startLine' => 58,
        'endLine' => 61,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\PayrollReceipt',
        'implementingClassName' => 'App\\Models\\PayrollReceipt',
        'currentClassName' => 'App\\Models\\PayrollReceipt',
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