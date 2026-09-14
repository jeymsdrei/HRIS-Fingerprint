<?php declare(strict_types = 1);

// odsl-C:\Users\Ryzen\Desktop\hrissystem-20260812T090006Z-1-001\hrissystem\system\app\Models\Attendance.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Models\Attendance
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.2.12-cbef35cd6f5491e4a024180cde062cba79044f91c6d99d3f81d01b64ef04bd1f',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Models\\Attendance',
        'filename' => 'C:/Users/Ryzen/Desktop/hrissystem-20260812T090006Z-1-001/hrissystem/system/app/Models/Attendance.php',
      ),
    ),
    'namespace' => 'App\\Models',
    'name' => 'App\\Models\\Attendance',
    'shortName' => 'Attendance',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * @property int $id
 * @property int $employee_id
 * @property Carbon $date
 * @property int $day
 * @property int|null $department_id
 * @property int|null $device_id
 * @property Carbon|null $schedule_start
 * @property Carbon|null $schedule_end
 * @property Carbon|null $time_in
 * @property Carbon|null $time_out
 * @property numeric $working_hours
 * @property int $late_minutes
 * @property int $undertime_minutes
 * @property int $overtime_minutes
 * @property bool $is_half_day
 * @property string $status
 * @property string $source
 * @property string|null $remarks
 * @property int|null $processed_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Department|null $department
 * @property-read BiometricDevice|null $device
 * @property-read Employee $employee
 * @property-read string $status_color
 * @property-read string $status_label
 *
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Attendance newModelQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Attendance newQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Attendance query()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Attendance whereCreatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Attendance whereDate($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Attendance whereDay($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Attendance whereDepartmentId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Attendance whereDeviceId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Attendance whereEmployeeId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Attendance whereId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Attendance whereIsHalfDay($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Attendance whereLateMinutes($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Attendance whereOvertimeMinutes($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Attendance whereProcessedBy($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Attendance whereRemarks($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Attendance whereScheduleEnd($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Attendance whereScheduleStart($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Attendance whereSource($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Attendance whereStatus($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Attendance whereTimeIn($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Attendance whereTimeOut($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Attendance whereUndertimeMinutes($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Attendance whereUpdatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Attendance whereWorkingHours($value)
 *
 * @mixin \\Eloquent
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 65,
    'endLine' => 134,
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
      'PRESENT' => 
      array (
        'declaringClassName' => 'App\\Models\\Attendance',
        'implementingClassName' => 'App\\Models\\Attendance',
        'name' => 'PRESENT',
        'modifiers' => 1,
        'type' => NULL,
        'value' => 
        array (
          'code' => '\'present\'',
          'attributes' => 
          array (
            'startLine' => 86,
            'endLine' => 86,
            'startTokenPos' => 177,
            'startFilePos' => 4160,
            'endTokenPos' => 177,
            'endFilePos' => 4168,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 86,
        'endLine' => 86,
        'startColumn' => 5,
        'endColumn' => 37,
      ),
      'LATE' => 
      array (
        'declaringClassName' => 'App\\Models\\Attendance',
        'implementingClassName' => 'App\\Models\\Attendance',
        'name' => 'LATE',
        'modifiers' => 1,
        'type' => NULL,
        'value' => 
        array (
          'code' => '\'late\'',
          'attributes' => 
          array (
            'startLine' => 88,
            'endLine' => 88,
            'startTokenPos' => 188,
            'startFilePos' => 4196,
            'endTokenPos' => 188,
            'endFilePos' => 4201,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 88,
        'endLine' => 88,
        'startColumn' => 5,
        'endColumn' => 31,
      ),
      'HALF_DAY' => 
      array (
        'declaringClassName' => 'App\\Models\\Attendance',
        'implementingClassName' => 'App\\Models\\Attendance',
        'name' => 'HALF_DAY',
        'modifiers' => 1,
        'type' => NULL,
        'value' => 
        array (
          'code' => '\'half_day\'',
          'attributes' => 
          array (
            'startLine' => 90,
            'endLine' => 90,
            'startTokenPos' => 199,
            'startFilePos' => 4233,
            'endTokenPos' => 199,
            'endFilePos' => 4242,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 90,
        'endLine' => 90,
        'startColumn' => 5,
        'endColumn' => 39,
      ),
      'ABSENT' => 
      array (
        'declaringClassName' => 'App\\Models\\Attendance',
        'implementingClassName' => 'App\\Models\\Attendance',
        'name' => 'ABSENT',
        'modifiers' => 1,
        'type' => NULL,
        'value' => 
        array (
          'code' => '\'absent\'',
          'attributes' => 
          array (
            'startLine' => 92,
            'endLine' => 92,
            'startTokenPos' => 210,
            'startFilePos' => 4272,
            'endTokenPos' => 210,
            'endFilePos' => 4279,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 92,
        'endLine' => 92,
        'startColumn' => 5,
        'endColumn' => 35,
      ),
      'REST_DAY' => 
      array (
        'declaringClassName' => 'App\\Models\\Attendance',
        'implementingClassName' => 'App\\Models\\Attendance',
        'name' => 'REST_DAY',
        'modifiers' => 1,
        'type' => NULL,
        'value' => 
        array (
          'code' => '\'rest_day\'',
          'attributes' => 
          array (
            'startLine' => 94,
            'endLine' => 94,
            'startTokenPos' => 221,
            'startFilePos' => 4311,
            'endTokenPos' => 221,
            'endFilePos' => 4320,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 94,
        'endLine' => 94,
        'startColumn' => 5,
        'endColumn' => 39,
      ),
    ),
    'immediateProperties' => 
    array (
      'fillable' => 
      array (
        'declaringClassName' => 'App\\Models\\Attendance',
        'implementingClassName' => 'App\\Models\\Attendance',
        'name' => 'fillable',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'employee_id\', \'date\', \'day\', \'department_id\', \'device_id\', \'schedule_start\', \'schedule_end\', \'time_in\', \'time_out\', \'working_hours\', \'late_minutes\', \'undertime_minutes\', \'overtime_minutes\', \'is_half_day\', \'status\', \'source\', \'remarks\', \'processed_by\']',
          'attributes' => 
          array (
            'startLine' => 69,
            'endLine' => 74,
            'startTokenPos' => 50,
            'startFilePos' => 3536,
            'endTokenPos' => 106,
            'endFilePos' => 3827,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 69,
        'endLine' => 74,
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
        'declaringClassName' => 'App\\Models\\Attendance',
        'implementingClassName' => 'App\\Models\\Attendance',
        'name' => 'casts',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'date\' => \'date:Y-m-d\', \'time_in\' => \'datetime:H:i\', \'time_out\' => \'datetime:H:i\', \'schedule_start\' => \'datetime:H:i\', \'schedule_end\' => \'datetime:H:i\', \'working_hours\' => \'decimal:2\', \'is_half_day\' => \'boolean\']',
          'attributes' => 
          array (
            'startLine' => 76,
            'endLine' => 84,
            'startTokenPos' => 115,
            'startFilePos' => 3854,
            'endTokenPos' => 166,
            'endFilePos' => 4129,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 76,
        'endLine' => 84,
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
        'startLine' => 96,
        'endLine' => 99,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Attendance',
        'implementingClassName' => 'App\\Models\\Attendance',
        'currentClassName' => 'App\\Models\\Attendance',
        'aliasName' => NULL,
      ),
      'department' => 
      array (
        'name' => 'department',
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
        'startLine' => 101,
        'endLine' => 104,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Attendance',
        'implementingClassName' => 'App\\Models\\Attendance',
        'currentClassName' => 'App\\Models\\Attendance',
        'aliasName' => NULL,
      ),
      'device' => 
      array (
        'name' => 'device',
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
        'startLine' => 106,
        'endLine' => 109,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Attendance',
        'implementingClassName' => 'App\\Models\\Attendance',
        'currentClassName' => 'App\\Models\\Attendance',
        'aliasName' => NULL,
      ),
      'getStatusLabelAttribute' => 
      array (
        'name' => 'getStatusLabelAttribute',
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
        'startLine' => 111,
        'endLine' => 121,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Attendance',
        'implementingClassName' => 'App\\Models\\Attendance',
        'currentClassName' => 'App\\Models\\Attendance',
        'aliasName' => NULL,
      ),
      'getStatusColorAttribute' => 
      array (
        'name' => 'getStatusColorAttribute',
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
        'startLine' => 123,
        'endLine' => 133,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Attendance',
        'implementingClassName' => 'App\\Models\\Attendance',
        'currentClassName' => 'App\\Models\\Attendance',
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