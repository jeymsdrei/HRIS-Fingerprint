<?php declare(strict_types = 1);

// odsl-C:\Users\Ryzen\Desktop\hrissystem-20260812T090006Z-1-001\hrissystem\system\app\Models\BiometricDevice.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Models\BiometricDevice
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.2.12-d85c97a5edeba1a3d412bbcffc79407f06021d4d3c0ce7b43fbcf33f90899377',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Models\\BiometricDevice',
        'filename' => 'C:/Users/Ryzen/Desktop/hrissystem-20260812T090006Z-1-001/hrissystem/system/app/Models/BiometricDevice.php',
      ),
    ),
    'namespace' => 'App\\Models',
    'name' => 'App\\Models\\BiometricDevice',
    'shortName' => 'BiometricDevice',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * @property int $id
 * @property string $name
 * @property string $ip_address
 * @property int $port
 * @property string|null $serial_number
 * @property string|null $location
 * @property string $status
 * @property Carbon|null $last_sync_at
 * @property bool $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, AttendanceLog> $logs
 * @property-read int|null $logs_count
 *
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|BiometricDevice newModelQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|BiometricDevice newQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|BiometricDevice query()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|BiometricDevice whereCreatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|BiometricDevice whereId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|BiometricDevice whereIpAddress($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|BiometricDevice whereIsActive($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|BiometricDevice whereLastSyncAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|BiometricDevice whereLocation($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|BiometricDevice whereName($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|BiometricDevice wherePort($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|BiometricDevice whereSerialNumber($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|BiometricDevice whereStatus($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|BiometricDevice whereUpdatedAt($value)
 *
 * @mixin \\Eloquent
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 43,
    'endLine' => 66,
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
        'declaringClassName' => 'App\\Models\\BiometricDevice',
        'implementingClassName' => 'App\\Models\\BiometricDevice',
        'name' => 'fillable',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'name\', \'ip_address\', \'port\', \'serial_number\', \'location\', \'status\', \'last_sync_at\', \'is_active\']',
          'attributes' => 
          array (
            'startLine' => 47,
            'endLine' => 50,
            'startTokenPos' => 55,
            'startFilePos' => 2204,
            'endTokenPos' => 81,
            'endFilePos' => 2324,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 47,
        'endLine' => 50,
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
        'declaringClassName' => 'App\\Models\\BiometricDevice',
        'implementingClassName' => 'App\\Models\\BiometricDevice',
        'name' => 'casts',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'last_sync_at\' => \'datetime\', \'is_active\' => \'boolean\']',
          'attributes' => 
          array (
            'startLine' => 52,
            'endLine' => 55,
            'startTokenPos' => 90,
            'startFilePos' => 2351,
            'endTokenPos' => 106,
            'endFilePos' => 2429,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 52,
        'endLine' => 55,
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
      'logs' => 
      array (
        'name' => 'logs',
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
        'startLine' => 57,
        'endLine' => 60,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\BiometricDevice',
        'implementingClassName' => 'App\\Models\\BiometricDevice',
        'currentClassName' => 'App\\Models\\BiometricDevice',
        'aliasName' => NULL,
      ),
      'agents' => 
      array (
        'name' => 'agents',
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
        'declaringClassName' => 'App\\Models\\BiometricDevice',
        'implementingClassName' => 'App\\Models\\BiometricDevice',
        'currentClassName' => 'App\\Models\\BiometricDevice',
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