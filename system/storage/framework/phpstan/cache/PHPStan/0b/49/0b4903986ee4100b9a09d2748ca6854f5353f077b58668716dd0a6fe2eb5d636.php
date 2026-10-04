<?php declare(strict_types = 1);

// odsl-C:\Users\Ryzen\Desktop\hrissystem-20260812T090006Z-1-001\hrissystem\system\app\Services\BiometricService.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Services\BiometricService
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.2.12-2b3768c272d981e6a56bcb129efb85392a681ff95832f7a708eca2b3e60a4bf3',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Services\\BiometricService',
        'filename' => 'C:/Users/Ryzen/Desktop/hrissystem-20260812T090006Z-1-001/hrissystem/system/app/Services/BiometricService.php',
      ),
    ),
    'namespace' => 'App\\Services',
    'name' => 'App\\Services\\BiometricService',
    'shortName' => 'BiometricService',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * Minimal ZKTeco (ZK) fingerprint device client over TCP.
 *
 * Implements the session handshake (CMD_CONNECT) and attendance record
 * download (CMD_ATTLOG_RRQ). If a device is unreachable the methods fail
 * gracefully so the app keeps running — the same data can be received
 * through the local sync agent POSTing to the device API endpoint.
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 19,
    'endLine' => 345,
    'startColumn' => 1,
    'endColumn' => 1,
    'parentClassName' => NULL,
    'implementsClassNames' => 
    array (
    ),
    'traitClassNames' => 
    array (
    ),
    'immediateConstants' => 
    array (
      'CMD_CONNECT' => 
      array (
        'declaringClassName' => 'App\\Services\\BiometricService',
        'implementingClassName' => 'App\\Services\\BiometricService',
        'name' => 'CMD_CONNECT',
        'modifiers' => 1,
        'type' => NULL,
        'value' => 
        array (
          'code' => '1000',
          'attributes' => 
          array (
            'startLine' => 23,
            'endLine' => 23,
            'startTokenPos' => 57,
            'startFilePos' => 617,
            'endTokenPos' => 57,
            'endFilePos' => 620,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 23,
        'endLine' => 23,
        'startColumn' => 5,
        'endColumn' => 36,
      ),
      'CMD_ATTLOG_RRQ' => 
      array (
        'declaringClassName' => 'App\\Services\\BiometricService',
        'implementingClassName' => 'App\\Services\\BiometricService',
        'name' => 'CMD_ATTLOG_RRQ',
        'modifiers' => 1,
        'type' => NULL,
        'value' => 
        array (
          'code' => '13',
          'attributes' => 
          array (
            'startLine' => 25,
            'endLine' => 25,
            'startTokenPos' => 68,
            'startFilePos' => 658,
            'endTokenPos' => 68,
            'endFilePos' => 659,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 25,
        'endLine' => 25,
        'startColumn' => 5,
        'endColumn' => 37,
      ),
      'CMD_ENABLE_DEVICE' => 
      array (
        'declaringClassName' => 'App\\Services\\BiometricService',
        'implementingClassName' => 'App\\Services\\BiometricService',
        'name' => 'CMD_ENABLE_DEVICE',
        'modifiers' => 1,
        'type' => NULL,
        'value' => 
        array (
          'code' => '1001',
          'attributes' => 
          array (
            'startLine' => 27,
            'endLine' => 27,
            'startTokenPos' => 79,
            'startFilePos' => 700,
            'endTokenPos' => 79,
            'endFilePos' => 703,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 27,
        'endLine' => 27,
        'startColumn' => 5,
        'endColumn' => 42,
      ),
      'CMD_DISABLE_DEVICE' => 
      array (
        'declaringClassName' => 'App\\Services\\BiometricService',
        'implementingClassName' => 'App\\Services\\BiometricService',
        'name' => 'CMD_DISABLE_DEVICE',
        'modifiers' => 1,
        'type' => NULL,
        'value' => 
        array (
          'code' => '1002',
          'attributes' => 
          array (
            'startLine' => 29,
            'endLine' => 29,
            'startTokenPos' => 90,
            'startFilePos' => 745,
            'endTokenPos' => 90,
            'endFilePos' => 748,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 29,
        'endLine' => 29,
        'startColumn' => 5,
        'endColumn' => 43,
      ),
      'CMD_DELETE_USER' => 
      array (
        'declaringClassName' => 'App\\Services\\BiometricService',
        'implementingClassName' => 'App\\Services\\BiometricService',
        'name' => 'CMD_DELETE_USER',
        'modifiers' => 1,
        'type' => NULL,
        'value' => 
        array (
          'code' => '18',
          'attributes' => 
          array (
            'startLine' => 31,
            'endLine' => 31,
            'startTokenPos' => 101,
            'startFilePos' => 787,
            'endTokenPos' => 101,
            'endFilePos' => 788,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 31,
        'endLine' => 31,
        'startColumn' => 5,
        'endColumn' => 38,
      ),
      'HEADER' => 
      array (
        'declaringClassName' => 'App\\Services\\BiometricService',
        'implementingClassName' => 'App\\Services\\BiometricService',
        'name' => 'HEADER',
        'modifiers' => 4,
        'type' => NULL,
        'value' => 
        array (
          'code' => '0x504830',
          'attributes' => 
          array (
            'startLine' => 33,
            'endLine' => 33,
            'startTokenPos' => 112,
            'startFilePos' => 819,
            'endTokenPos' => 112,
            'endFilePos' => 826,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 33,
        'endLine' => 33,
        'startColumn' => 5,
        'endColumn' => 36,
      ),
      'COMM_BYTE' => 
      array (
        'declaringClassName' => 'App\\Services\\BiometricService',
        'implementingClassName' => 'App\\Services\\BiometricService',
        'name' => 'COMM_BYTE',
        'modifiers' => 4,
        'type' => NULL,
        'value' => 
        array (
          'code' => '49',
          'attributes' => 
          array (
            'startLine' => 35,
            'endLine' => 35,
            'startTokenPos' => 123,
            'startFilePos' => 860,
            'endTokenPos' => 123,
            'endFilePos' => 861,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 35,
        'endLine' => 35,
        'startColumn' => 5,
        'endColumn' => 33,
      ),
      'READ_TIMEOUT' => 
      array (
        'declaringClassName' => 'App\\Services\\BiometricService',
        'implementingClassName' => 'App\\Services\\BiometricService',
        'name' => 'READ_TIMEOUT',
        'modifiers' => 4,
        'type' => NULL,
        'value' => 
        array (
          'code' => '15',
          'attributes' => 
          array (
            'startLine' => 37,
            'endLine' => 37,
            'startTokenPos' => 134,
            'startFilePos' => 898,
            'endTokenPos' => 134,
            'endFilePos' => 899,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 37,
        'endLine' => 37,
        'startColumn' => 5,
        'endColumn' => 36,
      ),
      'MAX_RECORD_SIZE' => 
      array (
        'declaringClassName' => 'App\\Services\\BiometricService',
        'implementingClassName' => 'App\\Services\\BiometricService',
        'name' => 'MAX_RECORD_SIZE',
        'modifiers' => 4,
        'type' => NULL,
        'value' => 
        array (
          'code' => '4 * 1024 * 1024',
          'attributes' => 
          array (
            'startLine' => 39,
            'endLine' => 39,
            'startTokenPos' => 145,
            'startFilePos' => 939,
            'endTokenPos' => 153,
            'endFilePos' => 953,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 39,
        'endLine' => 39,
        'startColumn' => 5,
        'endColumn' => 52,
      ),
    ),
    'immediateProperties' => 
    array (
      'socket' => 
      array (
        'declaringClassName' => 'App\\Services\\BiometricService',
        'implementingClassName' => 'App\\Services\\BiometricService',
        'name' => 'socket',
        'modifiers' => 4,
        'type' => NULL,
        'default' => 
        array (
          'code' => 'null',
          'attributes' => 
          array (
            'startLine' => 21,
            'endLine' => 21,
            'startTokenPos' => 46,
            'startFilePos' => 579,
            'endTokenPos' => 46,
            'endFilePos' => 582,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 21,
        'endLine' => 21,
        'startColumn' => 5,
        'endColumn' => 27,
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
      'isConnected' => 
      array (
        'name' => 'isConnected',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'bool',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 41,
        'endLine' => 44,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Services',
        'declaringClassName' => 'App\\Services\\BiometricService',
        'implementingClassName' => 'App\\Services\\BiometricService',
        'currentClassName' => 'App\\Services\\BiometricService',
        'aliasName' => NULL,
      ),
      'connect' => 
      array (
        'name' => 'connect',
        'parameters' => 
        array (
          'device' => 
          array (
            'name' => 'device',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionUnionType',
              'data' => 
              array (
                'types' => 
                array (
                  0 => 
                  array (
                    'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
                    'data' => 
                    array (
                      'name' => 'App\\Models\\BiometricDevice',
                      'isIdentifier' => false,
                    ),
                  ),
                  1 => 
                  array (
                    'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
                    'data' => 
                    array (
                      'name' => 'string',
                      'isIdentifier' => true,
                    ),
                  ),
                ),
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 49,
            'endLine' => 49,
            'startColumn' => 29,
            'endColumn' => 58,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'port' => 
          array (
            'name' => 'port',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 49,
                'endLine' => 49,
                'startTokenPos' => 203,
                'startFilePos' => 1186,
                'endTokenPos' => 203,
                'endFilePos' => 1189,
              ),
            ),
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionUnionType',
              'data' => 
              array (
                'types' => 
                array (
                  0 => 
                  array (
                    'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
                    'data' => 
                    array (
                      'name' => 'int',
                      'isIdentifier' => true,
                    ),
                  ),
                  1 => 
                  array (
                    'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
                    'data' => 
                    array (
                      'name' => 'null',
                      'isIdentifier' => true,
                    ),
                  ),
                ),
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 49,
            'endLine' => 49,
            'startColumn' => 61,
            'endColumn' => 77,
            'parameterIndex' => 1,
            'isOptional' => true,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'bool',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Establish a session with the device.
 */',
        'startLine' => 49,
        'endLine' => 80,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Services',
        'declaringClassName' => 'App\\Services\\BiometricService',
        'implementingClassName' => 'App\\Services\\BiometricService',
        'currentClassName' => 'App\\Services\\BiometricService',
        'aliasName' => NULL,
      ),
      'disconnect' => 
      array (
        'name' => 'disconnect',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'void',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 82,
        'endLine' => 88,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Services',
        'declaringClassName' => 'App\\Services\\BiometricService',
        'implementingClassName' => 'App\\Services\\BiometricService',
        'currentClassName' => 'App\\Services\\BiometricService',
        'aliasName' => NULL,
      ),
      'deleteFingerprint' => 
      array (
        'name' => 'deleteFingerprint',
        'parameters' => 
        array (
          'device' => 
          array (
            'name' => 'device',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'App\\Models\\BiometricDevice',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 93,
            'endLine' => 93,
            'startColumn' => 39,
            'endColumn' => 61,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'fingerprintId' => 
          array (
            'name' => 'fingerprintId',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'int',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 93,
            'endLine' => 93,
            'startColumn' => 64,
            'endColumn' => 81,
            'parameterIndex' => 1,
            'isOptional' => false,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'bool',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Remove a user\'s fingerprint record from a ZKTeco device.
 */',
        'startLine' => 93,
        'endLine' => 104,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Services',
        'declaringClassName' => 'App\\Services\\BiometricService',
        'implementingClassName' => 'App\\Services\\BiometricService',
        'currentClassName' => 'App\\Services\\BiometricService',
        'aliasName' => NULL,
      ),
      'buildFrame' => 
      array (
        'name' => 'buildFrame',
        'parameters' => 
        array (
          'command' => 
          array (
            'name' => 'command',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'int',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 109,
            'endLine' => 109,
            'startColumn' => 33,
            'endColumn' => 44,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'payload' => 
          array (
            'name' => 'payload',
            'default' => 
            array (
              'code' => '\'\'',
              'attributes' => 
              array (
                'startLine' => 109,
                'endLine' => 109,
                'startTokenPos' => 618,
                'startFilePos' => 2885,
                'endTokenPos' => 618,
                'endFilePos' => 2886,
              ),
            ),
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'string',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 109,
            'endLine' => 109,
            'startColumn' => 47,
            'endColumn' => 66,
            'parameterIndex' => 1,
            'isOptional' => true,
          ),
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
        'docComment' => '/**
 * ZK protocol command frame: 8-byte header + session id + payload.
 */',
        'startLine' => 109,
        'endLine' => 121,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'App\\Services',
        'declaringClassName' => 'App\\Services\\BiometricService',
        'implementingClassName' => 'App\\Services\\BiometricService',
        'currentClassName' => 'App\\Services\\BiometricService',
        'aliasName' => NULL,
      ),
      'sendCommand' => 
      array (
        'name' => 'sendCommand',
        'parameters' => 
        array (
          'command' => 
          array (
            'name' => 'command',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'int',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 123,
            'endLine' => 123,
            'startColumn' => 34,
            'endColumn' => 45,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'payload' => 
          array (
            'name' => 'payload',
            'default' => 
            array (
              'code' => '\'\'',
              'attributes' => 
              array (
                'startLine' => 123,
                'endLine' => 123,
                'startTokenPos' => 750,
                'startFilePos' => 3308,
                'endTokenPos' => 750,
                'endFilePos' => 3309,
              ),
            ),
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'string',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 123,
            'endLine' => 123,
            'startColumn' => 48,
            'endColumn' => 67,
            'parameterIndex' => 1,
            'isOptional' => true,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'bool',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 123,
        'endLine' => 137,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'App\\Services',
        'declaringClassName' => 'App\\Services\\BiometricService',
        'implementingClassName' => 'App\\Services\\BiometricService',
        'currentClassName' => 'App\\Services\\BiometricService',
        'aliasName' => NULL,
      ),
      'readResponse' => 
      array (
        'name' => 'readResponse',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionUnionType',
          'data' => 
          array (
            'types' => 
            array (
              0 => 
              array (
                'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
                'data' => 
                array (
                  'name' => 'string',
                  'isIdentifier' => true,
                ),
              ),
              1 => 
              array (
                'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
                'data' => 
                array (
                  'name' => 'null',
                  'isIdentifier' => true,
                ),
              ),
            ),
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 139,
        'endLine' => 165,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'App\\Services',
        'declaringClassName' => 'App\\Services\\BiometricService',
        'implementingClassName' => 'App\\Services\\BiometricService',
        'currentClassName' => 'App\\Services\\BiometricService',
        'aliasName' => NULL,
      ),
      'parseRecords' => 
      array (
        'name' => 'parseRecords',
        'parameters' => 
        array (
          'buffer' => 
          array (
            'name' => 'buffer',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'string',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 179,
            'endLine' => 179,
            'startColumn' => 35,
            'endColumn' => 48,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'array',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Parse raw attendance data frames (12-byte records):
 * user_id(4) + state(1) + timestamp(7, YYMMDDhhmmss packed).
 *
 * State values (ZKTeco standard):
 * 0 = Check In (time_in)
 * 1 = Check Out (time_out)
 * 2 = Break Out
 * 3 = Break In
 * 4 = Overtime In
 * 5 = Overtime Out
 */',
        'startLine' => 179,
        'endLine' => 225,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'App\\Services',
        'declaringClassName' => 'App\\Services\\BiometricService',
        'implementingClassName' => 'App\\Services\\BiometricService',
        'currentClassName' => 'App\\Services\\BiometricService',
        'aliasName' => NULL,
      ),
      'pullAttendance' => 
      array (
        'name' => 'pullAttendance',
        'parameters' => 
        array (
          'device' => 
          array (
            'name' => 'device',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'App\\Models\\BiometricDevice',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 230,
            'endLine' => 230,
            'startColumn' => 36,
            'endColumn' => 58,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'array',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Pull all attendance records from the device and persist them.
 */',
        'startLine' => 230,
        'endLine' => 258,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Services',
        'declaringClassName' => 'App\\Services\\BiometricService',
        'implementingClassName' => 'App\\Services\\BiometricService',
        'currentClassName' => 'App\\Services\\BiometricService',
        'aliasName' => NULL,
      ),
      'persistPunch' => 
      array (
        'name' => 'persistPunch',
        'parameters' => 
        array (
          'record' => 
          array (
            'name' => 'record',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'array',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 272,
            'endLine' => 272,
            'startColumn' => 34,
            'endColumn' => 46,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'agentId' => 
          array (
            'name' => 'agentId',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 272,
                'endLine' => 272,
                'startTokenPos' => 1864,
                'startFilePos' => 8201,
                'endTokenPos' => 1864,
                'endFilePos' => 8204,
              ),
            ),
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionUnionType',
              'data' => 
              array (
                'types' => 
                array (
                  0 => 
                  array (
                    'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
                    'data' => 
                    array (
                      'name' => 'string',
                      'isIdentifier' => true,
                    ),
                  ),
                  1 => 
                  array (
                    'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
                    'data' => 
                    array (
                      'name' => 'null',
                      'isIdentifier' => true,
                    ),
                  ),
                ),
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 272,
            'endLine' => 272,
            'startColumn' => 49,
            'endColumn' => 71,
            'parameterIndex' => 1,
            'isOptional' => true,
          ),
          'deviceId' => 
          array (
            'name' => 'deviceId',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 272,
                'endLine' => 272,
                'startTokenPos' => 1874,
                'startFilePos' => 8224,
                'endTokenPos' => 1874,
                'endFilePos' => 8227,
              ),
            ),
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionUnionType',
              'data' => 
              array (
                'types' => 
                array (
                  0 => 
                  array (
                    'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
                    'data' => 
                    array (
                      'name' => 'int',
                      'isIdentifier' => true,
                    ),
                  ),
                  1 => 
                  array (
                    'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
                    'data' => 
                    array (
                      'name' => 'null',
                      'isIdentifier' => true,
                    ),
                  ),
                ),
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 272,
            'endLine' => 272,
            'startColumn' => 74,
            'endColumn' => 94,
            'parameterIndex' => 2,
            'isOptional' => true,
          ),
          'source' => 
          array (
            'name' => 'source',
            'default' => 
            array (
              'code' => '\'device\'',
              'attributes' => 
              array (
                'startLine' => 272,
                'endLine' => 272,
                'startTokenPos' => 1883,
                'startFilePos' => 8247,
                'endTokenPos' => 1883,
                'endFilePos' => 8254,
              ),
            ),
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'string',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 272,
            'endLine' => 272,
            'startColumn' => 97,
            'endColumn' => 121,
            'parameterIndex' => 3,
            'isOptional' => true,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'bool',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Save a punch and reprocess the employee\'s attendance for that day.
 *
 * Dedup: if a source_key is present it is authoritative (a stable id from
 * the SDK/agent log). Otherwise the legacy (employee_id, punch_time) pair
 * is used so re-syncs of the same log never double-insert.
 *
 * @param  array{fingerprint_id: int, punch_time: mixed, source_key?: string, action?: string|null, score?: int|null}  $record
 * @param  int|null  $deviceId  Must reference a biometric_devices row. Agent
 *                              pushes (USB readers) don\'t own a network device,
 *                              so they pass null — never an agent id.
 */',
        'startLine' => 272,
        'endLine' => 344,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => true,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Services',
        'declaringClassName' => 'App\\Services\\BiometricService',
        'implementingClassName' => 'App\\Services\\BiometricService',
        'currentClassName' => 'App\\Services\\BiometricService',
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