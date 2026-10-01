<?php declare(strict_types = 1);

// osfsl-C:\Users\Ryzen\Desktop\hrissystem-20260812T090006Z-1-001\hrissystem\system\app\Models\Attendance.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Models\Attendance
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-d59e24300b6adf5046d8ddb00a28ffe294b1aba9c9f70c3763560fcefdf45f30-8.2.12-6.70.0.3',
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
 * @property int|null $teaching_schedule_id
 * @property int|null $work_schedule_id
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
 * @property-read TeachingSchedule|null $teachingSchedule
 * @property-read WorkSchedule|null $workSchedule
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
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Attendance whereTeachingScheduleId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Attendance whereWorkScheduleId($value)
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
    'startLine' => 71,
    'endLine' => 155,
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
            'startLine' => 92,
            'endLine' => 92,
            'startTokenPos' => 186,
            'startFilePos' => 4626,
            'endTokenPos' => 186,
            'endFilePos' => 4634,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 92,
        'endLine' => 92,
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
            'startLine' => 94,
            'endLine' => 94,
            'startTokenPos' => 197,
            'startFilePos' => 4662,
            'endTokenPos' => 197,
            'endFilePos' => 4667,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 94,
        'endLine' => 94,
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
            'startLine' => 96,
            'endLine' => 96,
            'startTokenPos' => 208,
            'startFilePos' => 4699,
            'endTokenPos' => 208,
            'endFilePos' => 4708,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 96,
        'endLine' => 96,
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
            'startLine' => 98,
            'endLine' => 98,
            'startTokenPos' => 219,
            'startFilePos' => 4738,
            'endTokenPos' => 219,
            'endFilePos' => 4745,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 98,
        'endLine' => 98,
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
            'startLine' => 100,
            'endLine' => 100,
            'startTokenPos' => 230,
            'startFilePos' => 4777,
            'endTokenPos' => 230,
            'endFilePos' => 4786,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 100,
        'endLine' => 100,
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
          'code' => '[\'employee_id\', \'date\', \'day\', \'department_id\', \'device_id\', \'teaching_schedule_id\', \'work_schedule_id\', \'make_up_class_id\', \'schedule_start\', \'schedule_end\', \'time_in\', \'time_out\', \'working_hours\', \'late_minutes\', \'undertime_minutes\', \'overtime_minutes\', \'is_half_day\', \'status\', \'source\', \'remarks\', \'processed_by\']',
          'attributes' => 
          array (
            'startLine' => 75,
            'endLine' => 80,
            'startTokenPos' => 50,
            'startFilePos' => 3938,
            'endTokenPos' => 115,
            'endFilePos' => 4293,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 75,
        'endLine' => 80,
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
            'startLine' => 82,
            'endLine' => 90,
            'startTokenPos' => 124,
            'startFilePos' => 4320,
            'endTokenPos' => 175,
            'endFilePos' => 4595,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 82,
        'endLine' => 90,
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
        'startLine' => 102,
        'endLine' => 105,
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
        'startLine' => 107,
        'endLine' => 110,
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
        'startLine' => 112,
        'endLine' => 115,
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
      'teachingSchedule' => 
      array (
        'name' => 'teachingSchedule',
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
        'startLine' => 117,
        'endLine' => 120,
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
      'workSchedule' => 
      array (
        'name' => 'workSchedule',
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
        'startLine' => 122,
        'endLine' => 125,
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
      'makeUpClass' => 
      array (
        'name' => 'makeUpClass',
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
        'startLine' => 127,
        'endLine' => 130,
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
        'startLine' => 132,
        'endLine' => 142,
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
        'startLine' => 144,
        'endLine' => 154,
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