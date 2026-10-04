<?php declare(strict_types = 1);

// odsl-C:\Users\Ryzen\Desktop\hrissystem-20260812T090006Z-1-001\hrissystem\system\app\Models\BiometricAgent.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Models\BiometricAgent
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.2.12-ce359e24d6e7706fe5fd5d8e7d997af1506e513985b67538bc105f02855d78c8',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Models\\BiometricAgent',
        'filename' => 'C:/Users/Ryzen/Desktop/hrissystem-20260812T090006Z-1-001/hrissystem/system/app/Models/BiometricAgent.php',
      ),
    ),
    'namespace' => 'App\\Models',
    'name' => 'App\\Models\\BiometricAgent',
    'shortName' => 'BiometricAgent',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * @property int $id
 * @property string $agent_id
 * @property int|null $device_id
 * @property string|null $name
 * @property string|null $computer_name
 * @property string|null $api_base_url
 * @property string $status
 * @property Carbon|null $last_seen_at
 * @property bool $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|BiometricAgent newModelQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|BiometricAgent newQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|BiometricAgent query()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|BiometricAgent whereAgentId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|BiometricAgent whereApiBaseUrl($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|BiometricAgent whereComputerName($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|BiometricAgent whereCreatedAt($value)
 *
 * @param  int  $value
 *
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|BiometricAgent whereDeviceId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|BiometricAgent whereId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|BiometricAgent whereIsActive($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|BiometricAgent whereLastSeenAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|BiometricAgent whereName($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|BiometricAgent whereStatus($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|BiometricAgent whereUpdatedAt($value)
 *
 * @mixin \\Eloquent
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 43,
    'endLine' => 61,
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
        'declaringClassName' => 'App\\Models\\BiometricAgent',
        'implementingClassName' => 'App\\Models\\BiometricAgent',
        'name' => 'fillable',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'agent_id\', \'device_id\', \'name\', \'computer_name\', \'api_base_url\', \'status\', \'last_seen_at\', \'is_active\']',
          'attributes' => 
          array (
            'startLine' => 47,
            'endLine' => 50,
            'startTokenPos' => 50,
            'startFilePos' => 2102,
            'endTokenPos' => 76,
            'endFilePos' => 2229,
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
        'declaringClassName' => 'App\\Models\\BiometricAgent',
        'implementingClassName' => 'App\\Models\\BiometricAgent',
        'name' => 'casts',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'last_seen_at\' => \'datetime\', \'is_active\' => \'boolean\']',
          'attributes' => 
          array (
            'startLine' => 52,
            'endLine' => 55,
            'startTokenPos' => 85,
            'startFilePos' => 2256,
            'endTokenPos' => 101,
            'endFilePos' => 2334,
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
        'declaringClassName' => 'App\\Models\\BiometricAgent',
        'implementingClassName' => 'App\\Models\\BiometricAgent',
        'currentClassName' => 'App\\Models\\BiometricAgent',
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