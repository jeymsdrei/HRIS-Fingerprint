<?php declare(strict_types = 1);

// odsl-C:\Users\Ryzen\Desktop\hrissystem-20260812T090006Z-1-001\hrissystem\system\app\Models\Course.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Models\Course
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.2.12-9b4d54d39a2a44e6b15ea4c0ab115794d6952c69d560d81a20b3e654e4668233',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Models\\Course',
        'filename' => 'C:/Users/Ryzen/Desktop/hrissystem-20260812T090006Z-1-001/hrissystem/system/app/Models/Course.php',
      ),
    ),
    'namespace' => 'App\\Models',
    'name' => 'App\\Models\\Course',
    'shortName' => 'Course',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string|null $description
 * @property numeric|null $total_units
 * @property bool $is_active
 * @property-read Collection<int, Employee> $employees
 * @property-read int|null $employees_count
 *
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Course newModelQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Course newQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Course query()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Course whereCode($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Course whereCreatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Course whereDescription($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Course whereId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Course whereIsActive($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Course whereName($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Course whereTotalUnits($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Course whereUpdatedAt($value)
 *
 * @mixin \\Eloquent
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 34,
    'endLine' => 49,
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
        'declaringClassName' => 'App\\Models\\Course',
        'implementingClassName' => 'App\\Models\\Course',
        'name' => 'fillable',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'code\', \'name\', \'description\', \'total_units\', \'is_active\']',
          'attributes' => 
          array (
            'startLine' => 38,
            'endLine' => 38,
            'startTokenPos' => 50,
            'startFilePos' => 1596,
            'endTokenPos' => 64,
            'endFilePos' => 1654,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 38,
        'endLine' => 38,
        'startColumn' => 5,
        'endColumn' => 86,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'casts' => 
      array (
        'declaringClassName' => 'App\\Models\\Course',
        'implementingClassName' => 'App\\Models\\Course',
        'name' => 'casts',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'total_units\' => \'decimal:2\', \'is_active\' => \'boolean\']',
          'attributes' => 
          array (
            'startLine' => 40,
            'endLine' => 43,
            'startTokenPos' => 73,
            'startFilePos' => 1681,
            'endTokenPos' => 89,
            'endFilePos' => 1759,
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
      'employees' => 
      array (
        'name' => 'employees',
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
        'declaringClassName' => 'App\\Models\\Course',
        'implementingClassName' => 'App\\Models\\Course',
        'currentClassName' => 'App\\Models\\Course',
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