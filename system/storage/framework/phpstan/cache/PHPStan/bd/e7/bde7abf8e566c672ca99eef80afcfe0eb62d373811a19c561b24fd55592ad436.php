<?php declare(strict_types = 1);

// odsl-C:\Users\Ryzen\Desktop\hrissystem-20260812T090006Z-1-001\hrissystem\system\app\Models\Payslip.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Models\Payslip
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.2.12-ef76e70b4445c8cb0f88d2ef4d222ebc74742fe232962c1d74cfd01bcfa82b27',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Models\\Payslip',
        'filename' => 'C:/Users/Ryzen/Desktop/hrissystem-20260812T090006Z-1-001/hrissystem/system/app/Models/Payslip.php',
      ),
    ),
    'namespace' => 'App\\Models',
    'name' => 'App\\Models\\Payslip',
    'shortName' => 'Payslip',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
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
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payslip newModelQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payslip newQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payslip query()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payslip whereCreatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payslip whereDigitalSignature($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payslip whereEmployeeId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payslip whereGeneratedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payslip whereId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payslip wherePayrollId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payslip wherePayslipNo($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payslip whereUpdatedAt($value)
 *
 * @mixin \\Eloquent
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 36,
    'endLine' => 53,
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
        'declaringClassName' => 'App\\Models\\Payslip',
        'implementingClassName' => 'App\\Models\\Payslip',
        'name' => 'fillable',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'payslip_no\', \'payroll_id\', \'employee_id\', \'digital_signature\', \'generated_at\']',
          'attributes' => 
          array (
            'startLine' => 40,
            'endLine' => 40,
            'startTokenPos' => 50,
            'startFilePos' => 1677,
            'endTokenPos' => 64,
            'endFilePos' => 1756,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 40,
        'endLine' => 40,
        'startColumn' => 5,
        'endColumn' => 107,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'casts' => 
      array (
        'declaringClassName' => 'App\\Models\\Payslip',
        'implementingClassName' => 'App\\Models\\Payslip',
        'name' => 'casts',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'generated_at\' => \'datetime\']',
          'attributes' => 
          array (
            'startLine' => 42,
            'endLine' => 42,
            'startTokenPos' => 73,
            'startFilePos' => 1783,
            'endTokenPos' => 79,
            'endFilePos' => 1812,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 42,
        'endLine' => 42,
        'startColumn' => 5,
        'endColumn' => 54,
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
        'startLine' => 44,
        'endLine' => 47,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Payslip',
        'implementingClassName' => 'App\\Models\\Payslip',
        'currentClassName' => 'App\\Models\\Payslip',
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
        'startLine' => 49,
        'endLine' => 52,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Payslip',
        'implementingClassName' => 'App\\Models\\Payslip',
        'currentClassName' => 'App\\Models\\Payslip',
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