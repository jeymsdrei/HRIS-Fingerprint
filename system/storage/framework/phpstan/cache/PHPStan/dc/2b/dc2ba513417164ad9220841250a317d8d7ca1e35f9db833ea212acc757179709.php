<?php declare(strict_types = 1);

// odsl-C:\Users\Ryzen\Desktop\hrissystem-20260812T090006Z-1-001\hrissystem\system\app\Models\MakeUpClass.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Models\MakeUpClass
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.2.12-dff5d4eef4c18a42491fd6271236d8d2646408c4b34731d5459617952f87a01f',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Models\\MakeUpClass',
        'filename' => 'C:/Users/Ryzen/Desktop/hrissystem-20260812T090006Z-1-001/hrissystem/system/app/Models/MakeUpClass.php',
      ),
    ),
    'namespace' => 'App\\Models',
    'name' => 'App\\Models\\MakeUpClass',
    'shortName' => 'MakeUpClass',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * @property int $id
 * @property int $employee_id
 * @property int|null $subject_id
 * @property Carbon $class_date
 * @property Carbon $start_time
 * @property Carbon $end_time
 * @property numeric $hours_rendered
 * @property numeric $hourly_rate
 * @property numeric $additional_pay
 * @property string $approval_status
 * @property int|null $approved_by
 * @property Carbon|null $approved_at
 * @property string|null $remarks
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read User|null $approver
 * @property-read Employee $employee
 * @property-read Subject|null $subject
 *
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|MakeUpClass newModelQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|MakeUpClass newQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|MakeUpClass query()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|MakeUpClass whereAdditionalPay($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|MakeUpClass whereApprovalStatus($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|MakeUpClass whereApprovedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|MakeUpClass whereApprovedBy($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|MakeUpClass whereClassDate($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|MakeUpClass whereCreatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|MakeUpClass whereEmployeeId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|MakeUpClass whereEndTime($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|MakeUpClass whereHourlyRate($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|MakeUpClass whereHoursRendered($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|MakeUpClass whereId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|MakeUpClass whereRemarks($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|MakeUpClass whereStartTime($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|MakeUpClass whereSubjectId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|MakeUpClass whereUpdatedAt($value)
 *
 * @mixin \\Eloquent
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 51,
    'endLine' => 90,
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
        'declaringClassName' => 'App\\Models\\MakeUpClass',
        'implementingClassName' => 'App\\Models\\MakeUpClass',
        'name' => 'fillable',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'employee_id\', \'subject_id\', \'class_date\', \'start_time\', \'end_time\', \'hours_rendered\', \'hourly_rate\', \'additional_pay\', \'approval_status\', \'approved_by\', \'approved_at\', \'remarks\']',
          'attributes' => 
          array (
            'startLine' => 55,
            'endLine' => 59,
            'startTokenPos' => 50,
            'startFilePos' => 2700,
            'endTokenPos' => 88,
            'endFilePos' => 2910,
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
      'casts' => 
      array (
        'declaringClassName' => 'App\\Models\\MakeUpClass',
        'implementingClassName' => 'App\\Models\\MakeUpClass',
        'name' => 'casts',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'class_date\' => \'date\', \'start_time\' => \'datetime:H:i\', \'end_time\' => \'datetime:H:i\', \'hours_rendered\' => \'decimal:2\', \'hourly_rate\' => \'decimal:2\', \'additional_pay\' => \'decimal:2\', \'approved_at\' => \'datetime\']',
          'attributes' => 
          array (
            'startLine' => 61,
            'endLine' => 69,
            'startTokenPos' => 97,
            'startFilePos' => 2937,
            'endTokenPos' => 148,
            'endFilePos' => 3210,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 61,
        'endLine' => 69,
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
        'declaringClassName' => 'App\\Models\\MakeUpClass',
        'implementingClassName' => 'App\\Models\\MakeUpClass',
        'currentClassName' => 'App\\Models\\MakeUpClass',
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
        'startLine' => 76,
        'endLine' => 79,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\MakeUpClass',
        'implementingClassName' => 'App\\Models\\MakeUpClass',
        'currentClassName' => 'App\\Models\\MakeUpClass',
        'aliasName' => NULL,
      ),
      'approver' => 
      array (
        'name' => 'approver',
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
        'startLine' => 81,
        'endLine' => 84,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\MakeUpClass',
        'implementingClassName' => 'App\\Models\\MakeUpClass',
        'currentClassName' => 'App\\Models\\MakeUpClass',
        'aliasName' => NULL,
      ),
      'computeAdditionalPay' => 
      array (
        'name' => 'computeAdditionalPay',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'float',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 86,
        'endLine' => 89,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\MakeUpClass',
        'implementingClassName' => 'App\\Models\\MakeUpClass',
        'currentClassName' => 'App\\Models\\MakeUpClass',
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