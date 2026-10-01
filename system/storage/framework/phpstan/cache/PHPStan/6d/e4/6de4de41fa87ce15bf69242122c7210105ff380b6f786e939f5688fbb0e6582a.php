<?php declare(strict_types = 1);

// odsl-C:\Users\Ryzen\Desktop\hrissystem-20260812T090006Z-1-001\hrissystem\system\app\Models\Archive.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Models\Archive
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.2.12-ac3c2bab36b657acf99caf42d162d374f249373040b42ee97149bfd95615cc4b',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Models\\Archive',
        'filename' => 'C:/Users/Ryzen/Desktop/hrissystem-20260812T090006Z-1-001/hrissystem/system/app/Models/Archive.php',
      ),
    ),
    'namespace' => 'App\\Models',
    'name' => 'App\\Models\\Archive',
    'shortName' => 'Archive',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * @property int $id
 * @property string $archive_type
 * @property string|null $ref_type
 * @property int|null $ref_id
 * @property string $period_type
 * @property string $period_label
 * @property array<array-key, mixed>|null $data
 * @property int|null $archived_by
 * @property Carbon $archived_at
 * @property-read User|null $archiver
 *
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Archive newModelQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Archive newQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Archive query()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Archive whereArchiveType($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Archive whereArchivedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Archive whereArchivedBy($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Archive whereData($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Archive whereId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Archive wherePeriodLabel($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Archive wherePeriodType($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Archive whereRefId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Archive whereRefType($value)
 *
 * @mixin \\Eloquent
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 37,
    'endLine' => 54,
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
        'declaringClassName' => 'App\\Models\\Archive',
        'implementingClassName' => 'App\\Models\\Archive',
        'name' => 'fillable',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'archive_type\', \'record_type\', \'ref_id\', \'period_type\', \'period_label\', \'data\', \'archived_by\', \'archived_at\']',
          'attributes' => 
          array (
            'startLine' => 41,
            'endLine' => 44,
            'startTokenPos' => 50,
            'startFilePos' => 1758,
            'endTokenPos' => 76,
            'endFilePos' => 1890,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 41,
        'endLine' => 44,
        'startColumn' => 5,
        'endColumn' => 6,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'timestamps' => 
      array (
        'declaringClassName' => 'App\\Models\\Archive',
        'implementingClassName' => 'App\\Models\\Archive',
        'name' => 'timestamps',
        'modifiers' => 1,
        'type' => NULL,
        'default' => 
        array (
          'code' => 'false',
          'attributes' => 
          array (
            'startLine' => 46,
            'endLine' => 46,
            'startTokenPos' => 85,
            'startFilePos' => 1919,
            'endTokenPos' => 85,
            'endFilePos' => 1923,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 46,
        'endLine' => 46,
        'startColumn' => 5,
        'endColumn' => 31,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'casts' => 
      array (
        'declaringClassName' => 'App\\Models\\Archive',
        'implementingClassName' => 'App\\Models\\Archive',
        'name' => 'casts',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'data\' => \'array\', \'archived_at\' => \'datetime\']',
          'attributes' => 
          array (
            'startLine' => 48,
            'endLine' => 48,
            'startTokenPos' => 94,
            'startFilePos' => 1950,
            'endTokenPos' => 107,
            'endFilePos' => 1997,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 48,
        'endLine' => 48,
        'startColumn' => 5,
        'endColumn' => 72,
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
      'archiver' => 
      array (
        'name' => 'archiver',
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
        'startLine' => 50,
        'endLine' => 53,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Archive',
        'implementingClassName' => 'App\\Models\\Archive',
        'currentClassName' => 'App\\Models\\Archive',
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