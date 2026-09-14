<?php declare(strict_types = 1);

// odsl-C:\Users\Ryzen\Desktop\hrissystem-20260812T090006Z-1-001\hrissystem\system\app\Models\AttendanceLog.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Models\AttendanceLog
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.2.12-70a18d38b2fd8ae2943e07216c037bc69c8ca1ba3646fa3e3ea1ed3f65b06bf8',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Models\\AttendanceLog',
        'filename' => 'C:/Users/Ryzen/Desktop/hrissystem-20260812T090006Z-1-001/hrissystem/system/app/Models/AttendanceLog.php',
      ),
    ),
    'namespace' => 'App\\Models',
    'name' => 'App\\Models\\AttendanceLog',
    'shortName' => 'AttendanceLog',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * @property int $id
 * @property int|null $employee_id
 * @property int|null $fingerprint_id
 * @property int|null $device_id
 * @property Carbon $punch_time
 * @property string $source
 * @property string|null $source_key
 * @property string|null $action
 * @property bool $processed
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read BiometricDevice|null $device
 * @property-read Employee|null $employee
 *
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|AttendanceLog newModelQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|AttendanceLog newQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|AttendanceLog query()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|AttendanceLog whereCreatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|AttendanceLog whereDeviceId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|AttendanceLog whereEmployeeId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|AttendanceLog whereFingerprintId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|AttendanceLog whereId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|AttendanceLog whereProcessed($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|AttendanceLog wherePunchTime($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|AttendanceLog whereSource($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|AttendanceLog whereUpdatedAt($value)
 *
 * @mixin \\Eloquent
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 40,
    'endLine' => 62,
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
        'declaringClassName' => 'App\\Models\\AttendanceLog',
        'implementingClassName' => 'App\\Models\\AttendanceLog',
        'name' => 'fillable',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'employee_id\', \'fingerprint_id\', \'device_id\', \'punch_time\', \'source_key\', \'action\', \'source\', \'processed\']',
          'attributes' => 
          array (
            'startLine' => 44,
            'endLine' => 46,
            'startTokenPos' => 50,
            'startFilePos' => 1949,
            'endTokenPos' => 76,
            'endFilePos' => 2070,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 44,
        'endLine' => 46,
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
        'declaringClassName' => 'App\\Models\\AttendanceLog',
        'implementingClassName' => 'App\\Models\\AttendanceLog',
        'name' => 'casts',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'punch_time\' => \'datetime\', \'processed\' => \'boolean\']',
          'attributes' => 
          array (
            'startLine' => 48,
            'endLine' => 51,
            'startTokenPos' => 85,
            'startFilePos' => 2097,
            'endTokenPos' => 101,
            'endFilePos' => 2173,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 48,
        'endLine' => 51,
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
        'startLine' => 53,
        'endLine' => 56,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\AttendanceLog',
        'implementingClassName' => 'App\\Models\\AttendanceLog',
        'currentClassName' => 'App\\Models\\AttendanceLog',
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
        'startLine' => 58,
        'endLine' => 61,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\AttendanceLog',
        'implementingClassName' => 'App\\Models\\AttendanceLog',
        'currentClassName' => 'App\\Models\\AttendanceLog',
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