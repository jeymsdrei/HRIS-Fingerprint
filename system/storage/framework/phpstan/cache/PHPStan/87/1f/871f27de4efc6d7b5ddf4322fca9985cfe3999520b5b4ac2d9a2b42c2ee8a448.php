<?php declare(strict_types = 1);

// odsl-C:\Users\Ryzen\Desktop\hrissystem-20260812T090006Z-1-001\hrissystem\system\app\Models\TeachingSchedule.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Models\TeachingSchedule
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.2.12-8dac10ac221d8df242c6d6b6a16bb4db055af848d3602a16682f7ecb6879f344',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Models\\TeachingSchedule',
        'filename' => 'C:/Users/Ryzen/Desktop/hrissystem-20260812T090006Z-1-001/hrissystem/system/app/Models/TeachingSchedule.php',
      ),
    ),
    'namespace' => 'App\\Models',
    'name' => 'App\\Models\\TeachingSchedule',
    'shortName' => 'TeachingSchedule',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * @property int $id
 * @property int $employee_id
 * @property int|null $subject_id
 * @property int|null $room_id
 * @property int $day
 * @property Carbon $start_time
 * @property Carbon $end_time
 * @property int|null $semester_id
 * @property int|null $school_year_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Employee $employee
 * @property-read string $day_name
 * @property-read Room|null $room
 * @property-read SchoolYear|null $schoolYear
 * @property-read Semester|null $semester
 * @property-read Subject|null $subject
 *
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|TeachingSchedule newModelQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|TeachingSchedule newQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|TeachingSchedule query()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|TeachingSchedule whereCreatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|TeachingSchedule whereDay($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|TeachingSchedule whereEmployeeId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|TeachingSchedule whereEndTime($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|TeachingSchedule whereId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|TeachingSchedule whereRoomId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|TeachingSchedule whereSchoolYearId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|TeachingSchedule whereSemesterId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|TeachingSchedule whereStartTime($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|TeachingSchedule whereSubjectId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|TeachingSchedule whereUpdatedAt($value)
 *
 * @mixin \\Eloquent
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 46,
    'endLine' => 91,
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
        'declaringClassName' => 'App\\Models\\TeachingSchedule',
        'implementingClassName' => 'App\\Models\\TeachingSchedule',
        'name' => 'fillable',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'employee_id\', \'subject_id\', \'room_id\', \'day\', \'start_time\', \'end_time\', \'semester_id\', \'school_year_id\']',
          'attributes' => 
          array (
            'startLine' => 50,
            'endLine' => 53,
            'startTokenPos' => 50,
            'startFilePos' => 2321,
            'endTokenPos' => 76,
            'endFilePos' => 2449,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 50,
        'endLine' => 53,
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
        'declaringClassName' => 'App\\Models\\TeachingSchedule',
        'implementingClassName' => 'App\\Models\\TeachingSchedule',
        'name' => 'casts',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'start_time\' => \'datetime:H:i\', \'end_time\' => \'datetime:H:i\']',
          'attributes' => 
          array (
            'startLine' => 55,
            'endLine' => 58,
            'startTokenPos' => 85,
            'startFilePos' => 2476,
            'endTokenPos' => 101,
            'endFilePos' => 2560,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 55,
        'endLine' => 58,
        'startColumn' => 5,
        'endColumn' => 6,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'dayNames' => 
      array (
        'declaringClassName' => 'App\\Models\\TeachingSchedule',
        'implementingClassName' => 'App\\Models\\TeachingSchedule',
        'name' => 'dayNames',
        'modifiers' => 17,
        'type' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'array',
            'isIdentifier' => true,
          ),
        ),
        'default' => 
        array (
          'code' => '[\'Sunday\', \'Monday\', \'Tuesday\', \'Wednesday\', \'Thursday\', \'Friday\', \'Saturday\']',
          'attributes' => 
          array (
            'startLine' => 60,
            'endLine' => 60,
            'startTokenPos' => 114,
            'startFilePos' => 2600,
            'endTokenPos' => 134,
            'endFilePos' => 2677,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 60,
        'endLine' => 60,
        'startColumn' => 5,
        'endColumn' => 115,
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
        'startLine' => 62,
        'endLine' => 65,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\TeachingSchedule',
        'implementingClassName' => 'App\\Models\\TeachingSchedule',
        'currentClassName' => 'App\\Models\\TeachingSchedule',
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
        'startLine' => 67,
        'endLine' => 70,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\TeachingSchedule',
        'implementingClassName' => 'App\\Models\\TeachingSchedule',
        'currentClassName' => 'App\\Models\\TeachingSchedule',
        'aliasName' => NULL,
      ),
      'subject' => 
      array (
        'name' => 'subject',
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
        'startLine' => 72,
        'endLine' => 75,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\TeachingSchedule',
        'implementingClassName' => 'App\\Models\\TeachingSchedule',
        'currentClassName' => 'App\\Models\\TeachingSchedule',
        'aliasName' => NULL,
      ),
      'room' => 
      array (
        'name' => 'room',
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
        'startLine' => 77,
        'endLine' => 80,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\TeachingSchedule',
        'implementingClassName' => 'App\\Models\\TeachingSchedule',
        'currentClassName' => 'App\\Models\\TeachingSchedule',
        'aliasName' => NULL,
      ),
      'semester' => 
      array (
        'name' => 'semester',
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
        'startLine' => 82,
        'endLine' => 85,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\TeachingSchedule',
        'implementingClassName' => 'App\\Models\\TeachingSchedule',
        'currentClassName' => 'App\\Models\\TeachingSchedule',
        'aliasName' => NULL,
      ),
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
        'startLine' => 87,
        'endLine' => 90,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\TeachingSchedule',
        'implementingClassName' => 'App\\Models\\TeachingSchedule',
        'currentClassName' => 'App\\Models\\TeachingSchedule',
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