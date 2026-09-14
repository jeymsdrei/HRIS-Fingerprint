<?php declare(strict_types = 1);

// odsl-C:\Users\Ryzen\Desktop\hrissystem-20260812T090006Z-1-001\hrissystem\system\app\Models\Subject.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Models\Subject
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.2.12-e67e7e09338319400e5ba498cf774585e9d71c79c8924ee38d588d19b99a537f',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Models\\Subject',
        'filename' => 'C:/Users/Ryzen/Desktop/hrissystem-20260812T090006Z-1-001/hrissystem/system/app/Models/Subject.php',
      ),
    ),
    'namespace' => 'App\\Models',
    'name' => 'App\\Models\\Subject',
    'shortName' => 'Subject',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * @property int $id
 * @property string $code
 * @property string $name
 * @property numeric $units
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, TeachingSchedule> $schedules
 * @property-read int|null $schedules_count
 *
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Subject newModelQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Subject newQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Subject query()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Subject whereCode($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Subject whereCreatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Subject whereId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Subject whereName($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Subject whereUnits($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Subject whereUpdatedAt($value)
 *
 * @mixin \\Eloquent
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 33,
    'endLine' => 43,
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
        'declaringClassName' => 'App\\Models\\Subject',
        'implementingClassName' => 'App\\Models\\Subject',
        'name' => 'fillable',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'code\', \'name\', \'units\']',
          'attributes' => 
          array (
            'startLine' => 37,
            'endLine' => 37,
            'startTokenPos' => 55,
            'startFilePos' => 1447,
            'endTokenPos' => 63,
            'endFilePos' => 1471,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 37,
        'endLine' => 37,
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
      'schedules' => 
      array (
        'name' => 'schedules',
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
        'startLine' => 39,
        'endLine' => 42,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Subject',
        'implementingClassName' => 'App\\Models\\Subject',
        'currentClassName' => 'App\\Models\\Subject',
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