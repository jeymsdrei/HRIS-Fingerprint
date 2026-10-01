<?php declare(strict_types = 1);

// odsl-C:\Users\Ryzen\Desktop\hrissystem-20260812T090006Z-1-001\hrissystem\system\app\Models\PayrollPeriod.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Models\PayrollPeriod
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.2.12-ef0bcc71c9b62aa2ce9e3c29cd39401653a5edb2c90844d08af93ea4dc0b23db',
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
    'endLine' => 75,
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
        'declaringClassName' => 'App\\Models\\PayrollPeriod',
        'implementingClassName' => 'App\\Models\\PayrollPeriod',
        'name' => 'DRAFT',
        'modifiers' => 1,
        'type' => NULL,
        'value' => 
        array (
          'code' => '\'draft\'',
          'attributes' => 
          array (
            'startLine' => 49,
            'endLine' => 49,
            'startTokenPos' => 62,
            'startFilePos' => 2261,
            'endTokenPos' => 62,
            'endFilePos' => 2267,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 49,
        'endLine' => 49,
        'startColumn' => 5,
        'endColumn' => 33,
      ),
      'PROCESSING' => 
      array (
        'declaringClassName' => 'App\\Models\\PayrollPeriod',
        'implementingClassName' => 'App\\Models\\PayrollPeriod',
        'name' => 'PROCESSING',
        'modifiers' => 1,
        'type' => NULL,
        'value' => 
        array (
          'code' => '\'processing\'',
          'attributes' => 
          array (
            'startLine' => 50,
            'endLine' => 50,
            'startTokenPos' => 73,
            'startFilePos' => 2300,
            'endTokenPos' => 73,
            'endFilePos' => 2311,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 50,
        'endLine' => 50,
        'startColumn' => 5,
        'endColumn' => 43,
      ),
      'RELEASED' => 
      array (
        'declaringClassName' => 'App\\Models\\PayrollPeriod',
        'implementingClassName' => 'App\\Models\\PayrollPeriod',
        'name' => 'RELEASED',
        'modifiers' => 1,
        'type' => NULL,
        'value' => 
        array (
          'code' => '\'released\'',
          'attributes' => 
          array (
            'startLine' => 51,
            'endLine' => 51,
            'startTokenPos' => 84,
            'startFilePos' => 2342,
            'endTokenPos' => 84,
            'endFilePos' => 2351,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 51,
        'endLine' => 51,
        'startColumn' => 5,
        'endColumn' => 39,
      ),
      'CLOSED' => 
      array (
        'declaringClassName' => 'App\\Models\\PayrollPeriod',
        'implementingClassName' => 'App\\Models\\PayrollPeriod',
        'name' => 'CLOSED',
        'modifiers' => 1,
        'type' => NULL,
        'value' => 
        array (
          'code' => '\'closed\'',
          'attributes' => 
          array (
            'startLine' => 52,
            'endLine' => 52,
            'startTokenPos' => 95,
            'startFilePos' => 2380,
            'endTokenPos' => 95,
            'endFilePos' => 2387,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 52,
        'endLine' => 52,
        'startColumn' => 5,
        'endColumn' => 35,
      ),
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
            'startLine' => 54,
            'endLine' => 57,
            'startTokenPos' => 104,
            'startFilePos' => 2417,
            'endTokenPos' => 130,
            'endFilePos' => 2535,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 54,
        'endLine' => 57,
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
            'startLine' => 59,
            'endLine' => 64,
            'startTokenPos' => 139,
            'startFilePos' => 2562,
            'endTokenPos' => 169,
            'endFilePos' => 2698,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 59,
        'endLine' => 64,
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
        'startLine' => 71,
        'endLine' => 74,
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