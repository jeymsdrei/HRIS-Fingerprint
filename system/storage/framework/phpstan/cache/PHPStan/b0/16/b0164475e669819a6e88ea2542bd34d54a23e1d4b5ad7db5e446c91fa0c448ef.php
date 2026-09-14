<?php declare(strict_types = 1);

// odsl-C:\Users\Ryzen\Desktop\hrissystem-20260812T090006Z-1-001\hrissystem\system\app\Models\EmployeeBenefit.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Models\EmployeeBenefit
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.2.12-8bd0f28179ca5a63d5f787bb20d872426c6a84743645300b293b2a94a3ecaa41',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Models\\EmployeeBenefit',
        'filename' => 'C:/Users/Ryzen/Desktop/hrissystem-20260812T090006Z-1-001/hrissystem/system/app/Models/EmployeeBenefit.php',
      ),
    ),
    'namespace' => 'App\\Models',
    'name' => 'App\\Models\\EmployeeBenefit',
    'shortName' => 'EmployeeBenefit',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * @property int $id
 * @property int $employee_id
 * @property int $benefit_id
 * @property numeric|null $amount
 * @property Carbon|null $effective_date
 * @property Carbon|null $expiration_date
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Benefit $benefit
 * @property-read Employee $employee
 * @property-read float $effective_amount
 *
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeBenefit newModelQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeBenefit newQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeBenefit query()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeBenefit whereAmount($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeBenefit whereBenefitId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeBenefit whereCreatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeBenefit whereEffectiveDate($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeBenefit whereEmployeeId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeBenefit whereExpirationDate($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeBenefit whereId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeBenefit whereUpdatedAt($value)
 *
 * @mixin \\Eloquent
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 37,
    'endLine' => 59,
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
        'declaringClassName' => 'App\\Models\\EmployeeBenefit',
        'implementingClassName' => 'App\\Models\\EmployeeBenefit',
        'name' => 'fillable',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'employee_id\', \'benefit_id\', \'amount\', \'effective_date\', \'expiration_date\']',
          'attributes' => 
          array (
            'startLine' => 41,
            'endLine' => 41,
            'startTokenPos' => 50,
            'startFilePos' => 1814,
            'endTokenPos' => 64,
            'endFilePos' => 1889,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 41,
        'endLine' => 41,
        'startColumn' => 5,
        'endColumn' => 103,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'casts' => 
      array (
        'declaringClassName' => 'App\\Models\\EmployeeBenefit',
        'implementingClassName' => 'App\\Models\\EmployeeBenefit',
        'name' => 'casts',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'effective_date\' => \'date\', \'expiration_date\' => \'date\']',
          'attributes' => 
          array (
            'startLine' => 43,
            'endLine' => 43,
            'startTokenPos' => 73,
            'startFilePos' => 1916,
            'endTokenPos' => 86,
            'endFilePos' => 1972,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 43,
        'endLine' => 43,
        'startColumn' => 5,
        'endColumn' => 81,
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
        'startLine' => 45,
        'endLine' => 48,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\EmployeeBenefit',
        'implementingClassName' => 'App\\Models\\EmployeeBenefit',
        'currentClassName' => 'App\\Models\\EmployeeBenefit',
        'aliasName' => NULL,
      ),
      'benefit' => 
      array (
        'name' => 'benefit',
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
        'startLine' => 50,
        'endLine' => 53,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\EmployeeBenefit',
        'implementingClassName' => 'App\\Models\\EmployeeBenefit',
        'currentClassName' => 'App\\Models\\EmployeeBenefit',
        'aliasName' => NULL,
      ),
      'getEffectiveAmountAttribute' => 
      array (
        'name' => 'getEffectiveAmountAttribute',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'float',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 55,
        'endLine' => 58,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\EmployeeBenefit',
        'implementingClassName' => 'App\\Models\\EmployeeBenefit',
        'currentClassName' => 'App\\Models\\EmployeeBenefit',
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