<?php declare(strict_types = 1);

// odsl-C:\Users\Ryzen\Desktop\hrissystem-20260812T090006Z-1-001\hrissystem\system\app\Models\Requirement.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Models\Requirement
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.2.12-5dccb016c1093ffb5dc70e83a0b0b2a34a2c0019bf3d18345ca2f4873ac96ea5',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Models\\Requirement',
        'filename' => 'C:/Users/Ryzen/Desktop/hrissystem-20260812T090006Z-1-001/hrissystem/system/app/Models/Requirement.php',
      ),
    ),
    'namespace' => 'App\\Models',
    'name' => 'App\\Models\\Requirement',
    'shortName' => 'Requirement',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string $applies_to
 * @property bool $needs_expiration
 * @property bool $is_required
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, EmployeeRequirement> $employeeRequirements
 * @property-read int|null $employee_requirements_count
 *
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Requirement newModelQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Requirement newQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Requirement query()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Requirement whereAppliesTo($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Requirement whereCreatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Requirement whereDescription($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Requirement whereId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Requirement whereIsRequired($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Requirement whereName($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Requirement whereNeedsExpiration($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Requirement whereUpdatedAt($value)
 *
 * @mixin \\Eloquent
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 37,
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
        'declaringClassName' => 'App\\Models\\Requirement',
        'implementingClassName' => 'App\\Models\\Requirement',
        'name' => 'fillable',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'name\', \'description\', \'applies_to\', \'needs_expiration\', \'is_required\']',
          'attributes' => 
          array (
            'startLine' => 41,
            'endLine' => 41,
            'startTokenPos' => 55,
            'startFilePos' => 1812,
            'endTokenPos' => 69,
            'endFilePos' => 1883,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 41,
        'endLine' => 41,
        'startColumn' => 5,
        'endColumn' => 99,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'casts' => 
      array (
        'declaringClassName' => 'App\\Models\\Requirement',
        'implementingClassName' => 'App\\Models\\Requirement',
        'name' => 'casts',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'needs_expiration\' => \'boolean\', \'is_required\' => \'boolean\']',
          'attributes' => 
          array (
            'startLine' => 43,
            'endLine' => 43,
            'startTokenPos' => 78,
            'startFilePos' => 1910,
            'endTokenPos' => 91,
            'endFilePos' => 1970,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 43,
        'endLine' => 43,
        'startColumn' => 5,
        'endColumn' => 85,
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
      'employeeRequirements' => 
      array (
        'name' => 'employeeRequirements',
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
        'declaringClassName' => 'App\\Models\\Requirement',
        'implementingClassName' => 'App\\Models\\Requirement',
        'currentClassName' => 'App\\Models\\Requirement',
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