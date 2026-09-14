<?php declare(strict_types = 1);

// odsl-C:\Users\Ryzen\Desktop\hrissystem-20260812T090006Z-1-001\hrissystem\system\app\Models\PayrollPeriod.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Models\PayrollPeriod
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.2.12-fb90c75abaf60dce4a2df304fc0e60e0cc83a0de15d068155ea04db6681b46d1',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Models\\PayrollPeriod',
        'filename' => 'C:/Users/Ryzen/Desktop/hrissystem-20260812T090006Z-1-001/hrissystem/system/app/Models/PayrollPeriod.php',
      ),
    ),
    'namespace' => 'App\\Models',
    'name' => 'App\\Models\\PayrollPeriod',
    'shortName' => 'PayrollPeriod',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * @property int $id
 * @property string $name
 * @property string $type
 * @property Carbon $start_date
 * @property Carbon $end_date
 * @property Carbon $pay_date
 * @property string $status
 * @property int|null $generated_by
 * @property Carbon|null $generated_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read User|null $generator
 * @property-read Collection<int, Payroll> $payrolls
 * @property-read int|null $payrolls_count
 *
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollPeriod newModelQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollPeriod newQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollPeriod query()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollPeriod whereCreatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollPeriod whereEndDate($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollPeriod whereGeneratedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollPeriod whereGeneratedBy($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollPeriod whereId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollPeriod whereName($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollPeriod wherePayDate($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollPeriod whereStartDate($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollPeriod whereStatus($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollPeriod whereType($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollPeriod whereUpdatedAt($value)
 *
 * @mixin \\Eloquent
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 45,
    'endLine' => 70,
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
        'declaringClassName' => 'App\\Models\\PayrollPeriod',
        'implementingClassName' => 'App\\Models\\PayrollPeriod',
        'name' => 'fillable',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'name\', \'type\', \'start_date\', \'end_date\', \'pay_date\', \'status\', \'generated_by\', \'generated_at\']',
          'attributes' => 
          array (
            'startLine' => 49,
            'endLine' => 52,
            'startTokenPos' => 60,
            'startFilePos' => 2262,
            'endTokenPos' => 86,
            'endFilePos' => 2380,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 49,
        'endLine' => 52,
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
        'declaringClassName' => 'App\\Models\\PayrollPeriod',
        'implementingClassName' => 'App\\Models\\PayrollPeriod',
        'name' => 'casts',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'start_date\' => \'date\', \'end_date\' => \'date\', \'pay_date\' => \'date\', \'generated_at\' => \'datetime\']',
          'attributes' => 
          array (
            'startLine' => 54,
            'endLine' => 59,
            'startTokenPos' => 95,
            'startFilePos' => 2407,
            'endTokenPos' => 125,
            'endFilePos' => 2543,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 54,
        'endLine' => 59,
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
        'startLine' => 61,
        'endLine' => 64,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\PayrollPeriod',
        'implementingClassName' => 'App\\Models\\PayrollPeriod',
        'currentClassName' => 'App\\Models\\PayrollPeriod',
        'aliasName' => NULL,
      ),
      'generator' => 
      array (
        'name' => 'generator',
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
        'startLine' => 66,
        'endLine' => 69,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\PayrollPeriod',
        'implementingClassName' => 'App\\Models\\PayrollPeriod',
        'currentClassName' => 'App\\Models\\PayrollPeriod',
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