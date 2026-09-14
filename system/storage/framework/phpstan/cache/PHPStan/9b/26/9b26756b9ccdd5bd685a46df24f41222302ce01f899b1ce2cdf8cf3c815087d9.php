<?php declare(strict_types = 1);

// odsl-C:\Users\Ryzen\Desktop\hrissystem-20260812T090006Z-1-001\hrissystem\system\app\Models\Clearance.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Models\Clearance
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.2.12-8a809b1634df793af4ba913f0c0d266b7883ba86a1ea5c617278babaa48a5086',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Models\\Clearance',
        'filename' => 'C:/Users/Ryzen/Desktop/hrissystem-20260812T090006Z-1-001/hrissystem/system/app/Models/Clearance.php',
      ),
    ),
    'namespace' => 'App\\Models',
    'name' => 'App\\Models\\Clearance',
    'shortName' => 'Clearance',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property bool $is_required
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, EmployeeClearance> $employeeClearances
 * @property-read int|null $employee_clearances_count
 *
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Clearance newModelQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Clearance newQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Clearance query()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Clearance whereCreatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Clearance whereDescription($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Clearance whereId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Clearance whereIsRequired($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Clearance whereName($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Clearance whereUpdatedAt($value)
 *
 * @mixin \\Eloquent
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 33,
    'endLine' => 45,
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
        'declaringClassName' => 'App\\Models\\Clearance',
        'implementingClassName' => 'App\\Models\\Clearance',
        'name' => 'fillable',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'name\', \'description\', \'is_required\']',
          'attributes' => 
          array (
            'startLine' => 37,
            'endLine' => 37,
            'startTokenPos' => 55,
            'startFilePos' => 1514,
            'endTokenPos' => 63,
            'endFilePos' => 1551,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 37,
        'endLine' => 37,
        'startColumn' => 5,
        'endColumn' => 65,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'casts' => 
      array (
        'declaringClassName' => 'App\\Models\\Clearance',
        'implementingClassName' => 'App\\Models\\Clearance',
        'name' => 'casts',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'is_required\' => \'boolean\']',
          'attributes' => 
          array (
            'startLine' => 39,
            'endLine' => 39,
            'startTokenPos' => 72,
            'startFilePos' => 1578,
            'endTokenPos' => 78,
            'endFilePos' => 1605,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 39,
        'endLine' => 39,
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
      'employeeClearances' => 
      array (
        'name' => 'employeeClearances',
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
        'startLine' => 41,
        'endLine' => 44,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Clearance',
        'implementingClassName' => 'App\\Models\\Clearance',
        'currentClassName' => 'App\\Models\\Clearance',
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