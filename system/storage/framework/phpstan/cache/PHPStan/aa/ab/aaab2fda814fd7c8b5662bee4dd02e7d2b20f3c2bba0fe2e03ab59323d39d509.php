<?php declare(strict_types = 1);

// odsl-C:\Users\Ryzen\Desktop\hrissystem-20260812T090006Z-1-001\hrissystem\system\app\Models\EmployeeClearance.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Models\EmployeeClearance
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.2.12-44ed2fb44096b8ebcc0eb5db5d35d21d77dba1b9379c92c2781071d51e9ccb97',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Models\\EmployeeClearance',
        'filename' => 'C:/Users/Ryzen/Desktop/hrissystem-20260812T090006Z-1-001/hrissystem/system/app/Models/EmployeeClearance.php',
      ),
    ),
    'namespace' => 'App\\Models',
    'name' => 'App\\Models\\EmployeeClearance',
    'shortName' => 'EmployeeClearance',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * @property int $id
 * @property int $employee_id
 * @property int $clearance_id
 * @property string $status
 * @property int|null $cleared_by
 * @property Carbon|null $cleared_at
 * @property string|null $remarks
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Clearance $clearance
 * @property-read User|null $clearedBy
 * @property-read Employee $employee
 *
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeClearance newModelQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeClearance newQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeClearance query()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeClearance whereClearanceId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeClearance whereClearedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeClearance whereClearedBy($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeClearance whereCreatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeClearance whereEmployeeId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeClearance whereId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeClearance whereRemarks($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeClearance whereStatus($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeClearance whereUpdatedAt($value)
 *
 * @mixin \\Eloquent
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 39,
    'endLine' => 63,
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
        'declaringClassName' => 'App\\Models\\EmployeeClearance',
        'implementingClassName' => 'App\\Models\\EmployeeClearance',
        'name' => 'fillable',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'employee_id\', \'clearance_id\', \'status\', \'cleared_by\', \'cleared_at\', \'remarks\']',
          'attributes' => 
          array (
            'startLine' => 43,
            'endLine' => 45,
            'startTokenPos' => 50,
            'startFilePos' => 1953,
            'endTokenPos' => 70,
            'endFilePos' => 2047,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 43,
        'endLine' => 45,
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
        'declaringClassName' => 'App\\Models\\EmployeeClearance',
        'implementingClassName' => 'App\\Models\\EmployeeClearance',
        'name' => 'casts',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'cleared_at\' => \'datetime\']',
          'attributes' => 
          array (
            'startLine' => 47,
            'endLine' => 47,
            'startTokenPos' => 79,
            'startFilePos' => 2074,
            'endTokenPos' => 85,
            'endFilePos' => 2101,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 47,
        'endLine' => 47,
        'startColumn' => 5,
        'endColumn' => 52,
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
        'declaringClassName' => 'App\\Models\\EmployeeClearance',
        'implementingClassName' => 'App\\Models\\EmployeeClearance',
        'currentClassName' => 'App\\Models\\EmployeeClearance',
        'aliasName' => NULL,
      ),
      'clearance' => 
      array (
        'name' => 'clearance',
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
        'startLine' => 54,
        'endLine' => 57,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\EmployeeClearance',
        'implementingClassName' => 'App\\Models\\EmployeeClearance',
        'currentClassName' => 'App\\Models\\EmployeeClearance',
        'aliasName' => NULL,
      ),
      'clearedBy' => 
      array (
        'name' => 'clearedBy',
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
        'startLine' => 59,
        'endLine' => 62,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\EmployeeClearance',
        'implementingClassName' => 'App\\Models\\EmployeeClearance',
        'currentClassName' => 'App\\Models\\EmployeeClearance',
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