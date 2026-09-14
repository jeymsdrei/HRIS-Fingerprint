<?php declare(strict_types = 1);

// odsl-C:\Users\Ryzen\Desktop\hrissystem-20260812T090006Z-1-001\hrissystem\system\app\Models\WorkSchedule.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Models\WorkSchedule
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.2.12-26832de9df0a7db429e9b16e94a253610d2bd8e2069d4f31f9d0b6798ddb03fc',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Models\\WorkSchedule',
        'filename' => 'C:/Users/Ryzen/Desktop/hrissystem-20260812T090006Z-1-001/hrissystem/system/app/Models/WorkSchedule.php',
      ),
    ),
    'namespace' => 'App\\Models',
    'name' => 'App\\Models\\WorkSchedule',
    'shortName' => 'WorkSchedule',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * @property int $id
 * @property int $employee_id
 * @property int $day
 * @property Carbon $start_time
 * @property Carbon $end_time
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Employee $employee
 * @property-read string $day_name
 *
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|WorkSchedule newModelQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|WorkSchedule newQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|WorkSchedule query()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|WorkSchedule whereCreatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|WorkSchedule whereDay($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|WorkSchedule whereEmployeeId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|WorkSchedule whereEndTime($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|WorkSchedule whereId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|WorkSchedule whereStartTime($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|WorkSchedule whereUpdatedAt($value)
 *
 * @mixin \\Eloquent
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 34,
    'endLine' => 54,
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
        'declaringClassName' => 'App\\Models\\WorkSchedule',
        'implementingClassName' => 'App\\Models\\WorkSchedule',
        'name' => 'fillable',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'employee_id\', \'day\', \'start_time\', \'end_time\']',
          'attributes' => 
          array (
            'startLine' => 38,
            'endLine' => 38,
            'startTokenPos' => 50,
            'startFilePos' => 1560,
            'endTokenPos' => 61,
            'endFilePos' => 1607,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 38,
        'endLine' => 38,
        'startColumn' => 5,
        'endColumn' => 75,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'casts' => 
      array (
        'declaringClassName' => 'App\\Models\\WorkSchedule',
        'implementingClassName' => 'App\\Models\\WorkSchedule',
        'name' => 'casts',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'start_time\' => \'datetime:H:i\', \'end_time\' => \'datetime:H:i\']',
          'attributes' => 
          array (
            'startLine' => 40,
            'endLine' => 43,
            'startTokenPos' => 70,
            'startFilePos' => 1634,
            'endTokenPos' => 86,
            'endFilePos' => 1718,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 40,
        'endLine' => 43,
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
      'getDayNameAttribute' => 
      array (
        'name' => 'getDayNameAttribute',
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
        'declaringClassName' => 'App\\Models\\WorkSchedule',
        'implementingClassName' => 'App\\Models\\WorkSchedule',
        'currentClassName' => 'App\\Models\\WorkSchedule',
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
        'declaringClassName' => 'App\\Models\\WorkSchedule',
        'implementingClassName' => 'App\\Models\\WorkSchedule',
        'currentClassName' => 'App\\Models\\WorkSchedule',
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