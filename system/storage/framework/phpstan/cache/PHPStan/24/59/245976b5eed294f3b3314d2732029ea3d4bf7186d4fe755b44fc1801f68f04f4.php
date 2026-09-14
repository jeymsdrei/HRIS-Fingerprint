<?php declare(strict_types = 1);

// odsl-C:\Users\Ryzen\Desktop\hrissystem-20260812T090006Z-1-001\hrissystem\system\app\Models\EmployeeRequirement.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Models\EmployeeRequirement
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.2.12-2e64cd5a1483303e1080fd69a4171296e9e1ab9ea4dd3e4eed288ec88d625fa3',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Models\\EmployeeRequirement',
        'filename' => 'C:/Users/Ryzen/Desktop/hrissystem-20260812T090006Z-1-001/hrissystem/system/app/Models/EmployeeRequirement.php',
      ),
    ),
    'namespace' => 'App\\Models',
    'name' => 'App\\Models\\EmployeeRequirement',
    'shortName' => 'EmployeeRequirement',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * @property int $id
 * @property int $employee_id
 * @property int $requirement_id
 * @property string $status
 * @property Carbon|null $date_submitted
 * @property Carbon|null $expiration_date
 * @property string|null $file_path
 * @property int|null $verified_by
 * @property Carbon|null $verified_at
 * @property string|null $remarks
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Employee $employee
 * @property-read string $status_color
 * @property-read Requirement $requirement
 * @property-read User|null $verifier
 *
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeRequirement newModelQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeRequirement newQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeRequirement query()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeRequirement whereCreatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeRequirement whereDateSubmitted($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeRequirement whereEmployeeId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeRequirement whereExpirationDate($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeRequirement whereFilePath($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeRequirement whereId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeRequirement whereRemarks($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeRequirement whereRequirementId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeRequirement whereStatus($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeRequirement whereUpdatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeRequirement whereVerifiedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeRequirement whereVerifiedBy($value)
 *
 * @mixin \\Eloquent
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 46,
    'endLine' => 85,
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
        'declaringClassName' => 'App\\Models\\EmployeeRequirement',
        'implementingClassName' => 'App\\Models\\EmployeeRequirement',
        'name' => 'fillable',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'employee_id\', \'requirement_id\', \'status\', \'date_submitted\', \'expiration_date\', \'file_path\', \'verified_by\', \'verified_at\', \'remarks\']',
          'attributes' => 
          array (
            'startLine' => 50,
            'endLine' => 53,
            'startTokenPos' => 50,
            'startFilePos' => 2477,
            'endTokenPos' => 79,
            'endFilePos' => 2633,
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
        'declaringClassName' => 'App\\Models\\EmployeeRequirement',
        'implementingClassName' => 'App\\Models\\EmployeeRequirement',
        'name' => 'casts',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'date_submitted\' => \'date\', \'expiration_date\' => \'date\', \'verified_at\' => \'datetime\']',
          'attributes' => 
          array (
            'startLine' => 55,
            'endLine' => 59,
            'startTokenPos' => 88,
            'startFilePos' => 2660,
            'endTokenPos' => 111,
            'endFilePos' => 2776,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 55,
        'endLine' => 59,
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
        'startLine' => 61,
        'endLine' => 64,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\EmployeeRequirement',
        'implementingClassName' => 'App\\Models\\EmployeeRequirement',
        'currentClassName' => 'App\\Models\\EmployeeRequirement',
        'aliasName' => NULL,
      ),
      'requirement' => 
      array (
        'name' => 'requirement',
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
        'startLine' => 66,
        'endLine' => 69,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\EmployeeRequirement',
        'implementingClassName' => 'App\\Models\\EmployeeRequirement',
        'currentClassName' => 'App\\Models\\EmployeeRequirement',
        'aliasName' => NULL,
      ),
      'verifier' => 
      array (
        'name' => 'verifier',
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
        'startLine' => 71,
        'endLine' => 74,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\EmployeeRequirement',
        'implementingClassName' => 'App\\Models\\EmployeeRequirement',
        'currentClassName' => 'App\\Models\\EmployeeRequirement',
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
        'startLine' => 76,
        'endLine' => 84,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\EmployeeRequirement',
        'implementingClassName' => 'App\\Models\\EmployeeRequirement',
        'currentClassName' => 'App\\Models\\EmployeeRequirement',
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