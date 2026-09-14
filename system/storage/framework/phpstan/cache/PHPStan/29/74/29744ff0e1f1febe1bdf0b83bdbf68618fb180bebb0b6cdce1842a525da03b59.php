<?php declare(strict_types = 1);

// odsl-C:\Users\Ryzen\Desktop\hrissystem-20260812T090006Z-1-001\hrissystem\system\app\Models\Benefit.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Models\Benefit
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.2.12-9c58baca79abf41df4cdde0645fe1a35b19d8966a1eecbc7d7f3cd9c7341dfa6',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Models\\Benefit',
        'filename' => 'C:/Users/Ryzen/Desktop/hrissystem-20260812T090006Z-1-001/hrissystem/system/app/Models/Benefit.php',
      ),
    ),
    'namespace' => 'App\\Models',
    'name' => 'App\\Models\\Benefit',
    'shortName' => 'Benefit',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * @property int $id
 * @property string $name
 * @property string $type
 * @property numeric $amount
 * @property string $frequency
 * @property bool $is_taxable
 * @property bool $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, EmployeeBenefit> $employeeBenefits
 * @property-read int|null $employee_benefits_count
 *
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Benefit newModelQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Benefit newQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Benefit query()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Benefit whereAmount($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Benefit whereCreatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Benefit whereFrequency($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Benefit whereId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Benefit whereIsActive($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Benefit whereIsTaxable($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Benefit whereName($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Benefit whereType($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Benefit whereUpdatedAt($value)
 *
 * @mixin \\Eloquent
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 39,
    'endLine' => 51,
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
        'declaringClassName' => 'App\\Models\\Benefit',
        'implementingClassName' => 'App\\Models\\Benefit',
        'name' => 'fillable',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'name\', \'type\', \'amount\', \'frequency\', \'is_taxable\', \'is_active\']',
          'attributes' => 
          array (
            'startLine' => 43,
            'endLine' => 43,
            'startTokenPos' => 55,
            'startFilePos' => 1837,
            'endTokenPos' => 72,
            'endFilePos' => 1902,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 43,
        'endLine' => 43,
        'startColumn' => 5,
        'endColumn' => 93,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'casts' => 
      array (
        'declaringClassName' => 'App\\Models\\Benefit',
        'implementingClassName' => 'App\\Models\\Benefit',
        'name' => 'casts',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'is_taxable\' => \'boolean\', \'is_active\' => \'boolean\']',
          'attributes' => 
          array (
            'startLine' => 45,
            'endLine' => 45,
            'startTokenPos' => 81,
            'startFilePos' => 1929,
            'endTokenPos' => 94,
            'endFilePos' => 1981,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 45,
        'endLine' => 45,
        'startColumn' => 5,
        'endColumn' => 77,
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
      'employeeBenefits' => 
      array (
        'name' => 'employeeBenefits',
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
        'startLine' => 47,
        'endLine' => 50,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Benefit',
        'implementingClassName' => 'App\\Models\\Benefit',
        'currentClassName' => 'App\\Models\\Benefit',
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