<?php declare(strict_types = 1);

// odsl-C:\Users\Ryzen\Desktop\hrissystem-20260812T090006Z-1-001\hrissystem\system\app\Models\Semester.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Models\Semester
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.2.12-e2027b9d528a968567bffbe202976bffcc47da9f9b9ea35e64e0938fb4dbd6fe',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Models\\Semester',
        'filename' => 'C:/Users/Ryzen/Desktop/hrissystem-20260812T090006Z-1-001/hrissystem/system/app/Models/Semester.php',
      ),
    ),
    'namespace' => 'App\\Models',
    'name' => 'App\\Models\\Semester',
    'shortName' => 'Semester',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * @property int $id
 * @property int $school_year_id
 * @property string $name
 * @property Carbon $start_date
 * @property Carbon $end_date
 * @property bool $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read SchoolYear $schoolYear
 *
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Semester newModelQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Semester newQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Semester query()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Semester whereCreatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Semester whereEndDate($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Semester whereId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Semester whereIsActive($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Semester whereName($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Semester whereSchoolYearId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Semester whereStartDate($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Semester whereUpdatedAt($value)
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
        'declaringClassName' => 'App\\Models\\Semester',
        'implementingClassName' => 'App\\Models\\Semester',
        'name' => 'fillable',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'school_year_id\', \'name\', \'start_date\', \'end_date\', \'is_active\']',
          'attributes' => 
          array (
            'startLine' => 39,
            'endLine' => 39,
            'startTokenPos' => 50,
            'startFilePos' => 1619,
            'endTokenPos' => 64,
            'endFilePos' => 1683,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 39,
        'endLine' => 39,
        'startColumn' => 5,
        'endColumn' => 92,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'casts' => 
      array (
        'declaringClassName' => 'App\\Models\\Semester',
        'implementingClassName' => 'App\\Models\\Semester',
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
            'startTokenPos' => 73,
            'startFilePos' => 1710,
            'endTokenPos' => 93,
            'endFilePos' => 1781,
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
      'schoolYear' => 
      array (
        'name' => 'schoolYear',
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
        'declaringClassName' => 'App\\Models\\Semester',
        'implementingClassName' => 'App\\Models\\Semester',
        'currentClassName' => 'App\\Models\\Semester',
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