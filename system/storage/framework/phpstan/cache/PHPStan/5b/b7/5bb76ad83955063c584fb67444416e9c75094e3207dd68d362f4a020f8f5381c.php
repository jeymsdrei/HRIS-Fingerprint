<?php declare(strict_types = 1);

// odsl-C:\Users\Ryzen\Desktop\hrissystem-20260812T090006Z-1-001\hrissystem\system\app\Models\SchoolYear.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Models\SchoolYear
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.2.12-25c6c540afecf18b917d3bfebb18a8cae2aadbf411ae190318dada2480bc2e8c',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Models\\SchoolYear',
        'filename' => 'C:/Users/Ryzen/Desktop/hrissystem-20260812T090006Z-1-001/hrissystem/system/app/Models/SchoolYear.php',
      ),
    ),
    'namespace' => 'App\\Models',
    'name' => 'App\\Models\\SchoolYear',
    'shortName' => 'SchoolYear',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * @property int $id
 * @property string $name
 * @property Carbon $start_date
 * @property Carbon $end_date
 * @property bool $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, Semester> $semesters
 * @property-read int|null $semesters_count
 *
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|SchoolYear newModelQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|SchoolYear newQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|SchoolYear query()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|SchoolYear whereCreatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|SchoolYear whereEndDate($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|SchoolYear whereId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|SchoolYear whereIsActive($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|SchoolYear whereName($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|SchoolYear whereStartDate($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|SchoolYear whereUpdatedAt($value)
 *
 * @mixin \\Eloquent
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 35,
    'endLine' => 47,
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
        'declaringClassName' => 'App\\Models\\SchoolYear',
        'implementingClassName' => 'App\\Models\\SchoolYear',
        'name' => 'fillable',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'name\', \'start_date\', \'end_date\', \'is_active\']',
          'attributes' => 
          array (
            'startLine' => 39,
            'endLine' => 39,
            'startTokenPos' => 55,
            'startFilePos' => 1610,
            'endTokenPos' => 66,
            'endFilePos' => 1656,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 39,
        'endLine' => 39,
        'startColumn' => 5,
        'endColumn' => 74,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'casts' => 
      array (
        'declaringClassName' => 'App\\Models\\SchoolYear',
        'implementingClassName' => 'App\\Models\\SchoolYear',
        'name' => 'casts',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'start_date\' => \'date\', \'end_date\' => \'date\', \'is_active\' => \'boolean\']',
          'attributes' => 
          array (
            'startLine' => 41,
            'endLine' => 41,
            'startTokenPos' => 75,
            'startFilePos' => 1683,
            'endTokenPos' => 95,
            'endFilePos' => 1754,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 41,
        'endLine' => 41,
        'startColumn' => 5,
        'endColumn' => 96,
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
      'semesters' => 
      array (
        'name' => 'semesters',
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
        'startLine' => 43,
        'endLine' => 46,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\SchoolYear',
        'implementingClassName' => 'App\\Models\\SchoolYear',
        'currentClassName' => 'App\\Models\\SchoolYear',
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