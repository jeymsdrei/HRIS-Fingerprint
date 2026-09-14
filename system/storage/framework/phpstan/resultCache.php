<?php declare(strict_types = 1);

return [
	'lastFullAnalysisTime' => 1786088271,
	'meta' => array (
  'cacheVersion' => 'v13-packageDependencies',
  'phpstanVersion' => '2.2.8',
  'fnsr' => false,
  'metaExtensions' => 
  array (
  ),
  'phpVersion' => 80212,
  'projectConfig' => '{conditionalTags: {Larastan\\Larastan\\Rules\\NoEnvCallsOutsideOfConfigRule: {phpstan.rules.rule: %noEnvCallsOutsideOfConfig%}, Larastan\\Larastan\\Rules\\NoModelMakeRule: {phpstan.rules.rule: %noModelMake%}, Larastan\\Larastan\\Rules\\NoUnnecessaryCollectionCallRule: {phpstan.rules.rule: %noUnnecessaryCollectionCall%}, Larastan\\Larastan\\Rules\\NoUnnecessaryEnumerableToArrayCallsRule: {phpstan.rules.rule: %noUnnecessaryEnumerableToArrayCalls%}, Larastan\\Larastan\\Rules\\OctaneCompatibilityRule: {phpstan.rules.rule: %checkOctaneCompatibility%}, Larastan\\Larastan\\Rules\\UnusedViewsRule: {phpstan.rules.rule: %checkUnusedViews%}, Larastan\\Larastan\\Rules\\NoMissingTranslationsRule: {phpstan.rules.rule: %checkMissingTranslations%}, Larastan\\Larastan\\Rules\\ModelAppendsRule: {phpstan.rules.rule: %checkModelAppends%}, Larastan\\Larastan\\Rules\\NoPublicModelScopeAndAccessorRule: {phpstan.rules.rule: %checkModelMethodVisibility%}, Larastan\\Larastan\\Rules\\NoAuthFacadeInRequestScopeRule: {phpstan.rules.rule: %checkAuthCallsWhenInRequestScope%}, Larastan\\Larastan\\Rules\\NoAuthHelperInRequestScopeRule: {phpstan.rules.rule: %checkAuthCallsWhenInRequestScope%}, Larastan\\Larastan\\ReturnTypes\\Helpers\\EnvFunctionDynamicFunctionReturnTypeExtension: {phpstan.broker.dynamicFunctionReturnTypeExtension: %generalizeEnvReturnType%}, Larastan\\Larastan\\ReturnTypes\\Helpers\\ConfigFunctionDynamicFunctionReturnTypeExtension: {phpstan.broker.dynamicFunctionReturnTypeExtension: %checkConfigTypes%}, Larastan\\Larastan\\ReturnTypes\\ConfigRepositoryDynamicMethodReturnTypeExtension: {phpstan.broker.dynamicMethodReturnTypeExtension: %checkConfigTypes%}, Larastan\\Larastan\\ReturnTypes\\ConfigFacadeCollectionDynamicStaticMethodReturnTypeExtension: {phpstan.broker.dynamicStaticMethodReturnTypeExtension: %checkConfigTypes%}, Larastan\\Larastan\\Rules\\ConfigCollectionRule: {phpstan.rules.rule: %checkConfigTypes%}}, parameters: {universalObjectCratesClasses: [Illuminate\\Http\\Request, Illuminate\\Support\\Optional], earlyTerminatingFunctionCalls: [abort, dd], mixinExcludeClasses: [Eloquent], bootstrapFiles: [bootstrap.php, phpstan-bootstrap.php], checkOctaneCompatibility: false, noEnvCallsOutsideOfConfig: true, noModelMake: true, noUnnecessaryCollectionCall: true, noUnnecessaryCollectionCallOnly: [], noUnnecessaryCollectionCallExcept: [], noUnnecessaryEnumerableToArrayCalls: false, squashedMigrationsPath: [], databaseMigrationsPath: [], disableMigrationScan: false, disableSchemaScan: false, configDirectories: [], viewDirectories: [], translationDirectories: [], checkModelProperties: false, checkUnusedViews: false, checkMissingTranslations: false, checkModelAppends: true, checkModelMethodVisibility: false, generalizeEnvReturnType: false, checkConfigTypes: false, checkAuthCallsWhenInRequestScope: false, parseModelCastsMethod: false, enableMigrationCache: false, paths: [C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app], level: 5, tmpDir: C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\storage\\framework\\phpstan}, rules: [Larastan\\Larastan\\Rules\\UselessConstructs\\NoUselessWithFunctionCallsRule, Larastan\\Larastan\\Rules\\UselessConstructs\\NoUselessValueFunctionCallsRule, Larastan\\Larastan\\Rules\\DeferrableServiceProviderMissingProvidesRule, Larastan\\Larastan\\Rules\\ConsoleCommand\\UndefinedArgumentOrOptionRule], services: {{class: Larastan\\Larastan\\Methods\\RelationForwardsCallsExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\ModelForwardsCallsExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\EloquentBuilderForwardsCallsExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\HigherOrderTapProxyExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\HigherOrderCollectionProxyExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\StorageMethodsClassReflectionExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\ContractsMethodsExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\FacadesMethodsExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\ManagersMethodsExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\AuthsMethodsExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\ModelFactoryMethodsClassReflectionExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\RedirectResponseMethodsClassReflectionExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\MacroMethodsClassReflectionExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\ViewWithMethodsClassReflectionExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Properties\\ModelAccessorExtension, tags: [phpstan.broker.propertiesClassReflectionExtension]}, {class: Larastan\\Larastan\\Properties\\ModelPropertyExtension, tags: [phpstan.broker.propertiesClassReflectionExtension]}, {class: Larastan\\Larastan\\Properties\\HigherOrderCollectionProxyPropertyExtension, tags: [phpstan.broker.propertiesClassReflectionExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\HigherOrderTapProxyExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ContainerArrayAccessDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension], arguments: {className: Illuminate\\Contracts\\Container\\Container}}, {class: Larastan\\Larastan\\ReturnTypes\\ContainerArrayAccessDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension], arguments: {className: Illuminate\\Container\\Container}}, {class: Larastan\\Larastan\\ReturnTypes\\ContainerArrayAccessDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension], arguments: {className: Illuminate\\Foundation\\Application}}, {class: Larastan\\Larastan\\ReturnTypes\\ContainerArrayAccessDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension], arguments: {className: Illuminate\\Contracts\\Foundation\\Application}}, {class: Larastan\\Larastan\\Properties\\ModelRelationsExtension, tags: [phpstan.broker.propertiesClassReflectionExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ModelOnlyDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ModelFactoryDynamicStaticMethodReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ModelDynamicStaticMethodReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\AppMakeDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\AuthExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\GuardDynamicStaticMethodReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\AuthManagerExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\DateExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\GuardExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\RequestFileExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\RequestRouteExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\RequestUserExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\EloquentBuilderExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\RelationCollectionExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\TestCaseExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\Support\\CollectionHelper}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\AuthExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\CollectExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\NowAndTodayExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\ResponseExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\ValidatorExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\LiteralExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\CollectionFilterRejectDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\CollectionWhereNotNullDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\NewModelQueryDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\FactoryDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\Types\\AbortIfFunctionTypeSpecifyingExtension, tags: [phpstan.typeSpecifier.functionTypeSpecifyingExtension], arguments: {methodName: abort, negate: false}}, {class: Larastan\\Larastan\\Types\\AbortIfFunctionTypeSpecifyingExtension, tags: [phpstan.typeSpecifier.functionTypeSpecifyingExtension], arguments: {methodName: abort, negate: true}}, {class: Larastan\\Larastan\\Types\\AbortIfFunctionTypeSpecifyingExtension, tags: [phpstan.typeSpecifier.functionTypeSpecifyingExtension], arguments: {methodName: throw, negate: false}}, {class: Larastan\\Larastan\\Types\\AbortIfFunctionTypeSpecifyingExtension, tags: [phpstan.typeSpecifier.functionTypeSpecifyingExtension], arguments: {methodName: throw, negate: true}}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\AppExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\ValueExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\StrExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\TapExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\StorageDynamicStaticMethodReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\Types\\GenericEloquentCollectionTypeNodeResolverExtension, tags: [phpstan.phpDoc.typeNodeResolverExtension]}, {class: Larastan\\Larastan\\Types\\ViewStringTypeNodeResolverExtension, tags: [phpstan.phpDoc.typeNodeResolverExtension]}, {class: Larastan\\Larastan\\Rules\\OctaneCompatibilityRule}, {class: Larastan\\Larastan\\Rules\\NoEnvCallsOutsideOfConfigRule, arguments: {configDirectories: %configDirectories%}}, {class: Larastan\\Larastan\\Rules\\NoModelMakeRule}, {class: Larastan\\Larastan\\Rules\\NoUnnecessaryCollectionCallRule, arguments: {onlyMethods: %noUnnecessaryCollectionCallOnly%, excludeMethods: %noUnnecessaryCollectionCallExcept%}}, {class: Larastan\\Larastan\\Rules\\NoUnnecessaryEnumerableToArrayCallsRule}, {class: Larastan\\Larastan\\Rules\\ModelAppendsRule}, {class: Larastan\\Larastan\\Rules\\NoPublicModelScopeAndAccessorRule}, {class: Larastan\\Larastan\\Types\\GenericEloquentBuilderTypeNodeResolverExtension, tags: [phpstan.phpDoc.typeNodeResolverExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\AppEnvironmentReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension], arguments: {class: Illuminate\\Foundation\\Application}}, {class: Larastan\\Larastan\\ReturnTypes\\AppEnvironmentReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension], arguments: {class: Illuminate\\Contracts\\Foundation\\Application}}, {class: Larastan\\Larastan\\ReturnTypes\\AppFacadeEnvironmentReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\Types\\ModelProperty\\ModelPropertyTypeNodeResolverExtension, tags: [phpstan.phpDoc.typeNodeResolverExtension], arguments: {active: %checkModelProperties%}}, {class: Larastan\\Larastan\\Types\\CollectionOf\\CollectionOfTypeNodeResolverExtension, tags: [phpstan.phpDoc.typeNodeResolverExtension]}, {class: Larastan\\Larastan\\Properties\\MigrationHelper, arguments: {databaseMigrationPath: %databaseMigrationsPath%, disableMigrationScan: %disableMigrationScan%, parser: @migrationsParser, reflectionProvider: @reflectionProvider}}, iamcalSqlParser: {class: Larastan\\Larastan\\SQL\\IamcalSqlParser, autowired: false}, sqlParserFactory: {class: Larastan\\Larastan\\SQL\\SqlParserFactory, arguments: {iamcalSqlParser: @iamcalSqlParser}}, sqlParser: {type: Larastan\\Larastan\\SQL\\SqlParser, factory: [@sqlParserFactory, create]}, {class: Larastan\\Larastan\\Properties\\SquashedMigrationHelper, arguments: {schemaPaths: %squashedMigrationsPath%, disableSchemaScan: %disableSchemaScan%}}, {class: Larastan\\Larastan\\Properties\\ModelCastHelper, arguments: {parser: @currentPhpVersionSimpleDirectParser, parseModelCastsMethod: %parseModelCastsMethod%}}, {class: Larastan\\Larastan\\Properties\\MigrationCache, arguments: {cacheDirectory: %tmpDir%, enabled: %enableMigrationCache%}}, {class: Larastan\\Larastan\\Properties\\ModelPropertyHelper}, {class: Larastan\\Larastan\\Rules\\ModelRuleHelper}, {class: Larastan\\Larastan\\Methods\\BuilderHelper, arguments: {checkProperties: %checkModelProperties%}}, {class: Larastan\\Larastan\\Rules\\RelationExistenceRule, tags: [phpstan.rules.rule]}, {class: Larastan\\Larastan\\Rules\\CheckDispatchArgumentTypesCompatibleWithClassConstructorRule, arguments: {dispatchableClass: Illuminate\\Foundation\\Bus\\Dispatchable}, tags: [phpstan.rules.rule]}, {class: Larastan\\Larastan\\Rules\\CheckDispatchArgumentTypesCompatibleWithClassConstructorRule, arguments: {dispatchableClass: Illuminate\\Foundation\\Events\\Dispatchable}, tags: [phpstan.rules.rule]}, {class: Larastan\\Larastan\\Properties\\Schema\\MySqlDataTypeToPhpTypeConverter}, {class: Larastan\\Larastan\\LarastanStubFilesExtension, tags: [phpstan.stubFilesExtension]}, {class: Larastan\\Larastan\\Rules\\UnusedViewsRule}, {class: Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedEmailViewCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedViewMakeCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedViewFacadeMakeCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedRouteFacadeViewCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedViewInAnotherViewCollector}, {class: Larastan\\Larastan\\Support\\ViewFileHelper, arguments: {viewDirectories: %viewDirectories%}}, {class: Larastan\\Larastan\\Support\\ViewParser, arguments: {parser: @currentPhpVersionSimpleDirectParser}}, {class: Larastan\\Larastan\\Rules\\NoMissingTranslationsRule, arguments: {translationDirectories: %translationDirectories%}}, {class: Larastan\\Larastan\\Collectors\\UsedTranslationFunctionCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedTranslationTranslatorCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedTranslationFacadeCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedTranslationViewCollector}, {class: Larastan\\Larastan\\ReturnTypes\\ApplicationMakeDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ContainerMakeDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ConsoleCommand\\ArgumentDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ConsoleCommand\\HasArgumentDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ConsoleCommand\\OptionDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ConsoleCommand\\HasOptionDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\TranslatorGetReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\LangGetReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\TransHelperReturnTypeExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\DoubleUnderscoreHelperReturnTypeExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\AppMakeHelper}, {class: Larastan\\Larastan\\Internal\\ConsoleApplicationResolver}, {class: Larastan\\Larastan\\Internal\\ConsoleApplicationHelper}, {class: Larastan\\Larastan\\Support\\HigherOrderCollectionProxyHelper}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\ConfigFunctionDynamicFunctionReturnTypeExtension}, {class: Larastan\\Larastan\\ReturnTypes\\ConfigRepositoryDynamicMethodReturnTypeExtension}, {class: Larastan\\Larastan\\ReturnTypes\\ConfigFacadeCollectionDynamicStaticMethodReturnTypeExtension}, {class: Larastan\\Larastan\\Support\\ConfigParser, arguments: {parser: @currentPhpVersionSimpleDirectParser, configPaths: %configDirectories%, treatPhpDocTypesAsCertain: %treatPhpDocTypesAsCertain%}}, {class: Larastan\\Larastan\\Internal\\ConfigHelper}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\EnvFunctionDynamicFunctionReturnTypeExtension}, {class: Larastan\\Larastan\\ReturnTypes\\FormRequestSafeDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\EloquentCollectionMapDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\Rules\\NoAuthFacadeInRequestScopeRule}, {class: Larastan\\Larastan\\Rules\\NoAuthHelperInRequestScopeRule}, {class: Larastan\\Larastan\\Rules\\ConfigCollectionRule}, {class: Illuminate\\Filesystem\\Filesystem, autowired: self}, migrationsParser: {class: PHPStan\\Parser\\CachedParser, arguments: {originalParser: @currentPhpVersionSimpleDirectParser, cachedNodesByStringCountMax: %cache.nodesByStringCountMax%}, autowired: false}}}',
  'analysedPaths' => 
  array (
    0 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app',
  ),
  'scannedFiles' => 
  array (
  ),
  'composerLocks' => 
  array (
    'C:/Users/Ryzen/Desktop/hrissystem/system/composer.lock' => '6fda49494223cfc3695ae2a46f9758bdfaeacc70ec237fdb90b0fda881524dff',
  ),
  'composerInstalled' => 
  array (
    'C:/Users/Ryzen/Desktop/hrissystem/system/vendor/composer/installed.php' => 
    array (
      'versions' => 
      array (
        'barryvdh/laravel-dompdf' => 
        array (
          'pretty_version' => 'v3.1.2',
          'version' => '3.1.2.0',
          'reference' => 'ee3b72b19ccdf57d0243116ecb2b90261344dedc',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../barryvdh/laravel-dompdf',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'barryvdh/laravel-ide-helper' => 
        array (
          'pretty_version' => 'v3.7.0',
          'version' => '3.7.0.0',
          'reference' => 'ad7e37676f1ff985d55ef1b6b96a0c0a40f2609a',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../barryvdh/laravel-ide-helper',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'barryvdh/reflection-docblock' => 
        array (
          'pretty_version' => 'v2.4.1',
          'version' => '2.4.1.0',
          'reference' => '4f5ba70c30c81f2ce03a16a9965832cfcc31ed3b',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../barryvdh/reflection-docblock',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'brick/math' => 
        array (
          'pretty_version' => '0.14.8',
          'version' => '0.14.8.0',
          'reference' => '63422359a44b7f06cae63c3b429b59e8efcc0629',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../brick/math',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'carbonphp/carbon-doctrine-types' => 
        array (
          'pretty_version' => '3.2.0',
          'version' => '3.2.0.0',
          'reference' => '18ba5ddfec8976260ead6e866180bd5d2f71aa1d',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../carbonphp/carbon-doctrine-types',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'composer/class-map-generator' => 
        array (
          'pretty_version' => '1.7.3',
          'version' => '1.7.3.0',
          'reference' => '86d8208fc3c649a3a999daf1a63c25201be2990f',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/./class-map-generator',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'composer/pcre' => 
        array (
          'pretty_version' => '3.4.0',
          'version' => '3.4.0.0',
          'reference' => 'd5a341b3fb61f3001970940afb1d332968a183ed',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/./pcre',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'composer/semver' => 
        array (
          'pretty_version' => '3.4.4',
          'version' => '3.4.4.0',
          'reference' => '198166618906cb2de69b95d7d47e5fa8aa1b2b95',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/./semver',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'cordoval/hamcrest-php' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => '*',
          ),
        ),
        'davedevelopment/hamcrest-php' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => '*',
          ),
        ),
        'dflydev/dot-access-data' => 
        array (
          'pretty_version' => 'v3.0.3',
          'version' => '3.0.3.0',
          'reference' => 'a23a2bf4f31d3518f3ecb38660c95715dfead60f',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../dflydev/dot-access-data',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'doctrine/inflector' => 
        array (
          'pretty_version' => '2.1.0',
          'version' => '2.1.0.0',
          'reference' => '6d6c96277ea252fc1304627204c3d5e6e15faa3b',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../doctrine/inflector',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'doctrine/lexer' => 
        array (
          'pretty_version' => '3.0.1',
          'version' => '3.0.1.0',
          'reference' => '31ad66abc0fc9e1a1f2d9bc6a42668d2fbbcd6dd',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../doctrine/lexer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'dompdf/dompdf' => 
        array (
          'pretty_version' => 'v3.1.6',
          'version' => '3.1.6.0',
          'reference' => '6d4b4eb8500f7a786da8868ba463a71b725a4005',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../dompdf/dompdf',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'dompdf/php-font-lib' => 
        array (
          'pretty_version' => '1.0.2',
          'version' => '1.0.2.0',
          'reference' => 'a6e9a688a2a80016ac080b97be73d3e10c444c9a',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../dompdf/php-font-lib',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'dompdf/php-svg-lib' => 
        array (
          'pretty_version' => '1.0.2',
          'version' => '1.0.2.0',
          'reference' => '8259ffb930817e72b1ff1caef5d226501f3dfeb1',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../dompdf/php-svg-lib',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'dragonmantank/cron-expression' => 
        array (
          'pretty_version' => 'v3.6.0',
          'version' => '3.6.0.0',
          'reference' => 'd61a8a9604ec1f8c3d150d09db6ce98b32675013',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../dragonmantank/cron-expression',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'egulias/email-validator' => 
        array (
          'pretty_version' => '4.0.4',
          'version' => '4.0.4.0',
          'reference' => 'd42c8731f0624ad6bdc8d3e5e9a4524f68801cfa',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../egulias/email-validator',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'ezyang/htmlpurifier' => 
        array (
          'pretty_version' => 'v4.19.0',
          'version' => '4.19.0.0',
          'reference' => 'b287d2a16aceffbf6e0295559b39662612b77fcf',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../ezyang/htmlpurifier',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'fakerphp/faker' => 
        array (
          'pretty_version' => 'v1.24.1',
          'version' => '1.24.1.0',
          'reference' => 'e0ee18eb1e6dc3cda3ce9fd97e5a0689a88a64b5',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../fakerphp/faker',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'filp/whoops' => 
        array (
          'pretty_version' => '2.18.4',
          'version' => '2.18.4.0',
          'reference' => 'd2102955e48b9fd9ab24280a7ad12ed552752c4d',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../filp/whoops',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'fruitcake/php-cors' => 
        array (
          'pretty_version' => 'v1.4.0',
          'version' => '1.4.0.0',
          'reference' => '38aaa6c3fd4c157ffe2a4d10aa8b9b16ba8de379',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../fruitcake/php-cors',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'graham-campbell/result-type' => 
        array (
          'pretty_version' => 'v1.1.4',
          'version' => '1.1.4.0',
          'reference' => 'e01f4a821471308ba86aa202fed6698b6b695e3b',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../graham-campbell/result-type',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'guzzlehttp/guzzle' => 
        array (
          'pretty_version' => '7.15.2',
          'version' => '7.15.2.0',
          'reference' => '744101956d78b7c1384d0cbf379db13e859167bf',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../guzzlehttp/guzzle',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'guzzlehttp/promises' => 
        array (
          'pretty_version' => '2.5.1',
          'version' => '2.5.1.0',
          'reference' => '9ad1e4fc607446a055b95870c7f668e93b5cff29',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../guzzlehttp/promises',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'guzzlehttp/psr7' => 
        array (
          'pretty_version' => '2.13.0',
          'version' => '2.13.0.0',
          'reference' => 'dad89620b7a6edb60c15858442eb2e408b45d8f4',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../guzzlehttp/psr7',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'guzzlehttp/uri-template' => 
        array (
          'pretty_version' => 'v1.0.10',
          'version' => '1.0.10.0',
          'reference' => 'f6c24c21f42b990e9a58912b332d0874df6ba839',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../guzzlehttp/uri-template',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'hamcrest/hamcrest-php' => 
        array (
          'pretty_version' => 'v2.1.1',
          'version' => '2.1.1.0',
          'reference' => 'f8b1c0173b22fa6ec77a81fe63e5b01eba7e6487',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../hamcrest/hamcrest-php',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'iamcal/sql-parser' => 
        array (
          'pretty_version' => 'v0.7',
          'version' => '0.7.0.0',
          'reference' => '610392f38de49a44dab08dc1659960a29874c4b8',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../iamcal/sql-parser',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'illuminate/auth' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/broadcasting' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/bus' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/cache' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/collections' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/concurrency' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/conditionable' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/config' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/console' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/container' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/contracts' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/cookie' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/database' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/encryption' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/events' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/filesystem' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/hashing' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/http' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/json-schema' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/log' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/macroable' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/mail' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/notifications' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/pagination' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/pipeline' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/process' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/queue' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/redis' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/reflection' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/routing' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/session' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/support' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/testing' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/translation' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/validation' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/view' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'kodova/hamcrest-php' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => '*',
          ),
        ),
        'larastan/larastan' => 
        array (
          'pretty_version' => 'v3.10.0',
          'version' => '3.10.0.0',
          'reference' => '2970f83398154178a739609c244577267c7ee8eb',
          'type' => 'phpstan-extension',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../larastan/larastan',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'laravel/breeze' => 
        array (
          'pretty_version' => 'v2.4.2',
          'version' => '2.4.2.0',
          'reference' => '4f20e7b2cc8d25daa85d8647241a89c8e0930305',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../laravel/breeze',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'laravel/framework' => 
        array (
          'pretty_version' => 'v12.64.0',
          'version' => '12.64.0.0',
          'reference' => '727a8ea2949c23ca8b5316b86a00984b6017b7a0',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../laravel/framework',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'laravel/pail' => 
        array (
          'pretty_version' => 'v1.2.7',
          'version' => '1.2.7.0',
          'reference' => '2f7d27dada8effc48b8c424445a69cca7007daaa',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../laravel/pail',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'laravel/pint' => 
        array (
          'pretty_version' => 'v1.30.3',
          'version' => '1.30.3.0',
          'reference' => '19ca6de4ce07869f61f09863e37e81562ebc0a9b',
          'type' => 'project',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../laravel/pint',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'laravel/prompts' => 
        array (
          'pretty_version' => 'v0.3.21',
          'version' => '0.3.21.0',
          'reference' => '7753c65c281c2550c7c183f14e18062073b7d821',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../laravel/prompts',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'laravel/sail' => 
        array (
          'pretty_version' => 'v1.64.0',
          'version' => '1.64.0.0',
          'reference' => '08cacd3e72d6798df3fa8bd4b5d55d0f7f920625',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../laravel/sail',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'laravel/serializable-closure' => 
        array (
          'pretty_version' => 'v2.0.15',
          'version' => '2.0.15.0',
          'reference' => 'dccd8bcb851bb03fcc005df650b708b57cc52661',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../laravel/serializable-closure',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'laravel/tinker' => 
        array (
          'pretty_version' => 'v2.11.1',
          'version' => '2.11.1.0',
          'reference' => 'c9f80cc835649b5c1842898fb043f8cc098dd741',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../laravel/tinker',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'league/commonmark' => 
        array (
          'pretty_version' => '2.8.3',
          'version' => '2.8.3.0',
          'reference' => '1902f60f984235023acbe03db6ad614a37b3c3e7',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../league/commonmark',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'league/config' => 
        array (
          'pretty_version' => 'v1.2.0',
          'version' => '1.2.0.0',
          'reference' => '754b3604fb2984c71f4af4a9cbe7b57f346ec1f3',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../league/config',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'league/flysystem' => 
        array (
          'pretty_version' => '3.35.2',
          'version' => '3.35.2.0',
          'reference' => 'b277b5dc3d56650b68904117124e79c851e12376',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../league/flysystem',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'league/flysystem-local' => 
        array (
          'pretty_version' => '3.31.0',
          'version' => '3.31.0.0',
          'reference' => '2f669db18a4c20c755c2bb7d3a7b0b2340488079',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../league/flysystem-local',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'league/mime-type-detection' => 
        array (
          'pretty_version' => '1.17.0',
          'version' => '1.17.0.0',
          'reference' => 'f5f47eff7c48ed1003069a2ca67f316fb4021c76',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../league/mime-type-detection',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'league/uri' => 
        array (
          'pretty_version' => '7.8.1',
          'version' => '7.8.1.0',
          'reference' => '08cf38e3924d4f56238125547b5720496fac8fd4',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../league/uri',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'league/uri-interfaces' => 
        array (
          'pretty_version' => '7.8.1',
          'version' => '7.8.1.0',
          'reference' => '85d5c77c5d6d3af6c54db4a78246364908f3c928',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../league/uri-interfaces',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'maatwebsite/excel' => 
        array (
          'pretty_version' => '3.1.69',
          'version' => '3.1.69.0',
          'reference' => 'ae5d65b7c9a2fac43bff4d44f796ac95d7a8e760',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../maatwebsite/excel',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'maennchen/zipstream-php' => 
        array (
          'pretty_version' => '3.1.2',
          'version' => '3.1.2.0',
          'reference' => 'aeadcf5c412332eb426c0f9b4485f6accba2a99f',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../maennchen/zipstream-php',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'markbaker/complex' => 
        array (
          'pretty_version' => '3.0.2',
          'version' => '3.0.2.0',
          'reference' => '95c56caa1cf5c766ad6d65b6344b807c1e8405b9',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../markbaker/complex',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'markbaker/matrix' => 
        array (
          'pretty_version' => '3.0.1',
          'version' => '3.0.1.0',
          'reference' => '728434227fe21be27ff6d86621a1b13107a2562c',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../markbaker/matrix',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'masterminds/html5' => 
        array (
          'pretty_version' => '2.10.1',
          'version' => '2.10.1.0',
          'reference' => 'fd5018f6815fff903946d0564977b44ce8010e29',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../masterminds/html5',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'mockery/mockery' => 
        array (
          'pretty_version' => '1.6.12',
          'version' => '1.6.12.0',
          'reference' => '1f4efdd7d3beafe9807b08156dfcb176d18f1699',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../mockery/mockery',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'monolog/monolog' => 
        array (
          'pretty_version' => '3.10.0',
          'version' => '3.10.0.0',
          'reference' => 'b321dd6749f0bf7189444158a3ce785cc16d69b0',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../monolog/monolog',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'mtdowling/cron-expression' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => '^1.0',
          ),
        ),
        'myclabs/deep-copy' => 
        array (
          'pretty_version' => '1.13.4',
          'version' => '1.13.4.0',
          'reference' => '07d290f0c47959fd5eed98c95ee5602db07e0b6a',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../myclabs/deep-copy',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'nesbot/carbon' => 
        array (
          'pretty_version' => '3.13.1',
          'version' => '3.13.1.0',
          'reference' => '2937ad3d1d2c506fd2bc97d571438a95641f44e2',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../nesbot/carbon',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'nette/schema' => 
        array (
          'pretty_version' => 'v1.3.5',
          'version' => '1.3.5.0',
          'reference' => 'f0ab1a3cda782dbc5da270d28545236aa80c4002',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../nette/schema',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'nette/utils' => 
        array (
          'pretty_version' => 'v4.1.5',
          'version' => '4.1.5.0',
          'reference' => 'b043439dbdf954e6c28b5ea7e34b0100f83165e0',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../nette/utils',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'nikic/php-parser' => 
        array (
          'pretty_version' => 'v5.8.0',
          'version' => '5.8.0.0',
          'reference' => '044a6a392ff8ad0d61f14370a5fbbd0a0107152f',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../nikic/php-parser',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'nunomaduro/collision' => 
        array (
          'pretty_version' => 'v8.9.5',
          'version' => '8.9.5.0',
          'reference' => 'fb53eacd509a1d303858e2d20cfebf2d630254ec',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../nunomaduro/collision',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'nunomaduro/termwind' => 
        array (
          'pretty_version' => 'v2.4.0',
          'version' => '2.4.0.0',
          'reference' => '712a31b768f5daea284c2169a7d227031001b9a8',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../nunomaduro/termwind',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'phar-io/manifest' => 
        array (
          'pretty_version' => '2.0.4',
          'version' => '2.0.4.0',
          'reference' => '54750ef60c58e43759730615a392c31c80e23176',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../phar-io/manifest',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phar-io/version' => 
        array (
          'pretty_version' => '3.2.1',
          'version' => '3.2.1.0',
          'reference' => '4f7fd7836c6f332bb2933569e566a0d6c4cbed74',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../phar-io/version',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpoffice/phpspreadsheet' => 
        array (
          'pretty_version' => '1.30.6',
          'version' => '1.30.6.0',
          'reference' => 'a416375ffc8bf5b661c1bb4e6c60d8f3fddbe5ce',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../phpoffice/phpspreadsheet',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'phpoption/phpoption' => 
        array (
          'pretty_version' => '1.9.5',
          'version' => '1.9.5.0',
          'reference' => '75365b91986c2405cf5e1e012c5595cd487a98be',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../phpoption/phpoption',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'phpstan/phpstan' => 
        array (
          'pretty_version' => '2.2.8',
          'version' => '2.2.8.0',
          'reference' => 'e285254e60f33c21902efef4a926ca0987c06804',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../phpstan/phpstan',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/php-code-coverage' => 
        array (
          'pretty_version' => '11.0.12',
          'version' => '11.0.12.0',
          'reference' => '2c1ed04922802c15e1de5d7447b4856de949cf56',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../phpunit/php-code-coverage',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/php-file-iterator' => 
        array (
          'pretty_version' => '5.1.1',
          'version' => '5.1.1.0',
          'reference' => '2f3a64888c814fc235386b7387dd5b5ed92ad903',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../phpunit/php-file-iterator',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/php-invoker' => 
        array (
          'pretty_version' => '5.0.1',
          'version' => '5.0.1.0',
          'reference' => 'c1ca3814734c07492b3d4c5f794f4b0995333da2',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../phpunit/php-invoker',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/php-text-template' => 
        array (
          'pretty_version' => '4.0.1',
          'version' => '4.0.1.0',
          'reference' => '3e0404dc6b300e6bf56415467ebcb3fe4f33e964',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../phpunit/php-text-template',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/php-timer' => 
        array (
          'pretty_version' => '7.0.1',
          'version' => '7.0.1.0',
          'reference' => '3b415def83fbcb41f991d9ebf16ae4ad8b7837b3',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../phpunit/php-timer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/phpunit' => 
        array (
          'pretty_version' => '11.5.56',
          'version' => '11.5.56.0',
          'reference' => '5f83edffa6967c3db468d48a695ec7bcb02e9256',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../phpunit/phpunit',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'psr/clock' => 
        array (
          'pretty_version' => '1.0.0',
          'version' => '1.0.0.0',
          'reference' => 'e41a24703d4560fd0acb709162f73b8adfc3aa0d',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../psr/clock',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/clock-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.0',
          ),
        ),
        'psr/container' => 
        array (
          'pretty_version' => '2.0.2',
          'version' => '2.0.2.0',
          'reference' => 'c71ecc56dfe541dbd90c5360474fbc405f8d5963',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../psr/container',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/container-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.1|2.0',
          ),
        ),
        'psr/event-dispatcher' => 
        array (
          'pretty_version' => '1.0.0',
          'version' => '1.0.0.0',
          'reference' => 'dbefd12671e8a14ec7f180cab83036ed26714bb0',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../psr/event-dispatcher',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/event-dispatcher-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.0',
          ),
        ),
        'psr/http-client' => 
        array (
          'pretty_version' => '1.0.3',
          'version' => '1.0.3.0',
          'reference' => 'bb5906edc1c324c9a05aa0873d40117941e5fa90',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../psr/http-client',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/http-client-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.0',
          ),
        ),
        'psr/http-factory' => 
        array (
          'pretty_version' => '1.1.0',
          'version' => '1.1.0.0',
          'reference' => '2b4765fddfe3b508ac62f829e852b1501d3f6e8a',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../psr/http-factory',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/http-factory-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.0',
          ),
        ),
        'psr/http-message' => 
        array (
          'pretty_version' => '2.0',
          'version' => '2.0.0.0',
          'reference' => '402d35bcb92c70c026d1a6a9883f06b2ead23d71',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../psr/http-message',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/http-message-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.0',
          ),
        ),
        'psr/log' => 
        array (
          'pretty_version' => '3.0.2',
          'version' => '3.0.2.0',
          'reference' => 'f16e1d5863e37f8d8c2a01719f5b34baa2b714d3',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../psr/log',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/log-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.0|2.0|3.0',
            1 => '3.0.0',
          ),
        ),
        'psr/simple-cache' => 
        array (
          'pretty_version' => '3.0.0',
          'version' => '3.0.0.0',
          'reference' => '764e0b3939f5ca87cb904f570ef9be2d78a07865',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../psr/simple-cache',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/simple-cache-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.0|2.0|3.0',
          ),
        ),
        'psy/psysh' => 
        array (
          'pretty_version' => 'v0.12.24',
          'version' => '0.12.24.0',
          'reference' => 'ca0fdcf8a7617afa3adfdf1b5fef573dffb69ca1',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../psy/psysh',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'ralouphie/getallheaders' => 
        array (
          'pretty_version' => '3.0.3',
          'version' => '3.0.3.0',
          'reference' => '120b605dfeb996808c31b6477290a714d356e822',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../ralouphie/getallheaders',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'ramsey/collection' => 
        array (
          'pretty_version' => '2.1.1',
          'version' => '2.1.1.0',
          'reference' => '344572933ad0181accbf4ba763e85a0306a8c5e2',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../ramsey/collection',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'ramsey/uuid' => 
        array (
          'pretty_version' => '4.9.3',
          'version' => '4.9.3.0',
          'reference' => '1df15849d00943a67d677dc9cfd80795f038c9f8',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../ramsey/uuid',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'rhumsaa/uuid' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => '4.9.3',
          ),
        ),
        'sabberworm/php-css-parser' => 
        array (
          'pretty_version' => 'v9.4.0',
          'version' => '9.4.0.0',
          'reference' => 'fd3bf9fb173e0df649bc4e3e0d088a1b2417c08f',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../sabberworm/php-css-parser',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'sebastian/cli-parser' => 
        array (
          'pretty_version' => '3.0.2',
          'version' => '3.0.2.0',
          'reference' => '15c5dd40dc4f38794d383bb95465193f5e0ae180',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../sebastian/cli-parser',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/code-unit' => 
        array (
          'pretty_version' => '3.0.3',
          'version' => '3.0.3.0',
          'reference' => '54391c61e4af8078e5b276ab082b6d3c54c9ad64',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../sebastian/code-unit',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/code-unit-reverse-lookup' => 
        array (
          'pretty_version' => '4.0.1',
          'version' => '4.0.1.0',
          'reference' => '183a9b2632194febd219bb9246eee421dad8d45e',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../sebastian/code-unit-reverse-lookup',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/comparator' => 
        array (
          'pretty_version' => '6.3.3',
          'version' => '6.3.3.0',
          'reference' => '2c95e1e86cb8dd41beb8d502057d1081ccc8eca9',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../sebastian/comparator',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/complexity' => 
        array (
          'pretty_version' => '4.0.1',
          'version' => '4.0.1.0',
          'reference' => 'ee41d384ab1906c68852636b6de493846e13e5a0',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../sebastian/complexity',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/diff' => 
        array (
          'pretty_version' => '6.0.2',
          'version' => '6.0.2.0',
          'reference' => 'b4ccd857127db5d41a5b676f24b51371d76d8544',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../sebastian/diff',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/environment' => 
        array (
          'pretty_version' => '7.2.1',
          'version' => '7.2.1.0',
          'reference' => 'a5c75038693ad2e8d4b6c15ba2403532647830c4',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../sebastian/environment',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/exporter' => 
        array (
          'pretty_version' => '6.3.2',
          'version' => '6.3.2.0',
          'reference' => '70a298763b40b213ec087c51c739efcaa90bcd74',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../sebastian/exporter',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/global-state' => 
        array (
          'pretty_version' => '7.0.2',
          'version' => '7.0.2.0',
          'reference' => '3be331570a721f9a4b5917f4209773de17f747d7',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../sebastian/global-state',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/lines-of-code' => 
        array (
          'pretty_version' => '3.0.1',
          'version' => '3.0.1.0',
          'reference' => 'd36ad0d782e5756913e42ad87cb2890f4ffe467a',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../sebastian/lines-of-code',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/object-enumerator' => 
        array (
          'pretty_version' => '6.0.1',
          'version' => '6.0.1.0',
          'reference' => 'f5b498e631a74204185071eb41f33f38d64608aa',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../sebastian/object-enumerator',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/object-reflector' => 
        array (
          'pretty_version' => '4.0.1',
          'version' => '4.0.1.0',
          'reference' => '6e1a43b411b2ad34146dee7524cb13a068bb35f9',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../sebastian/object-reflector',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/recursion-context' => 
        array (
          'pretty_version' => '6.0.3',
          'version' => '6.0.3.0',
          'reference' => 'f6458abbf32a6c8174f8f26261475dc133b3d9dc',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../sebastian/recursion-context',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/type' => 
        array (
          'pretty_version' => '5.1.3',
          'version' => '5.1.3.0',
          'reference' => 'f77d2d4e78738c98d9a68d2596fe5e8fa380f449',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../sebastian/type',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/version' => 
        array (
          'pretty_version' => '5.0.2',
          'version' => '5.0.2.0',
          'reference' => 'c687e3387b99f5b03b6caa64c74b63e2936ff874',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../sebastian/version',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'spatie/once' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => '*',
          ),
        ),
        'staabm/side-effects-detector' => 
        array (
          'pretty_version' => '1.0.5',
          'version' => '1.0.5.0',
          'reference' => 'd8334211a140ce329c13726d4a715adbddd0a163',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../staabm/side-effects-detector',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/clock' => 
        array (
          'pretty_version' => 'v7.4.8',
          'version' => '7.4.8.0',
          'reference' => '674fa3b98e21531dd040e613479f5f6fa8f32111',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../symfony/clock',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/console' => 
        array (
          'pretty_version' => 'v7.4.15',
          'version' => '7.4.15.0',
          'reference' => '088ec6fe0ef6819cbc301174093b6bfa4ad26930',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../symfony/console',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/css-selector' => 
        array (
          'pretty_version' => 'v7.4.9',
          'version' => '7.4.9.0',
          'reference' => 'b75663ed96cf4756e28e3105476f220f92886cc4',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../symfony/css-selector',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/deprecation-contracts' => 
        array (
          'pretty_version' => 'v3.7.1',
          'version' => '3.7.1.0',
          'reference' => 'f3202fa1b5097b0af062dc978b32ecf63404e31d',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../symfony/deprecation-contracts',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/error-handler' => 
        array (
          'pretty_version' => 'v7.4.15',
          'version' => '7.4.15.0',
          'reference' => 'd49f6a19f326db41ae7103bdc38e3eb35a791261',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../symfony/error-handler',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/event-dispatcher' => 
        array (
          'pretty_version' => 'v7.4.15',
          'version' => '7.4.15.0',
          'reference' => '336e7f3b9e95aba04f93ea9143920c2186abfbb9',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../symfony/event-dispatcher',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/event-dispatcher-contracts' => 
        array (
          'pretty_version' => 'v3.7.1',
          'version' => '3.7.1.0',
          'reference' => 'c7de7a00ffb67842132da02ea92988a39ccd9f4e',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../symfony/event-dispatcher-contracts',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/event-dispatcher-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '2.0|3.0',
          ),
        ),
        'symfony/finder' => 
        array (
          'pretty_version' => 'v7.4.14',
          'version' => '7.4.14.0',
          'reference' => '13b38720174286f55d1761152b575a8d1436fc25',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../symfony/finder',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/http-foundation' => 
        array (
          'pretty_version' => 'v7.4.15',
          'version' => '7.4.15.0',
          'reference' => '1f898ee8188adda9417fb52cf8425a8342c254e7',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../symfony/http-foundation',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/http-kernel' => 
        array (
          'pretty_version' => 'v7.4.15',
          'version' => '7.4.15.0',
          'reference' => '403275d94f94d5626c3288c599b3b48093ba24f7',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../symfony/http-kernel',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/mailer' => 
        array (
          'pretty_version' => 'v7.4.15',
          'version' => '7.4.15.0',
          'reference' => '68c1f27c97edd0222eb8d440a6c8c4da5354ab46',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../symfony/mailer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/mime' => 
        array (
          'pretty_version' => 'v7.4.15',
          'version' => '7.4.15.0',
          'reference' => '0c1daf58bc931628df0bea26840d1fc8b9a3d34b',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../symfony/mime',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-ctype' => 
        array (
          'pretty_version' => 'v1.37.0',
          'version' => '1.37.0.0',
          'reference' => '141046a8f9477948ff284fa65be2095baafb94f2',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../symfony/polyfill-ctype',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-intl-grapheme' => 
        array (
          'pretty_version' => 'v1.41.0',
          'version' => '1.41.0.0',
          'reference' => 'bb899c1db0aa8127dc3afe8cda4a67eb24915f8d',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../symfony/polyfill-intl-grapheme',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-intl-idn' => 
        array (
          'pretty_version' => 'v1.38.1',
          'version' => '1.38.1.0',
          'reference' => 'dc21118016c039a66235cf93d96b435ffb282412',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../symfony/polyfill-intl-idn',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-intl-normalizer' => 
        array (
          'pretty_version' => 'v1.38.0',
          'version' => '1.38.0.0',
          'reference' => '2d446c214bdbe5b71bde5011b060a05fece3ae6b',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../symfony/polyfill-intl-normalizer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-mbstring' => 
        array (
          'pretty_version' => 'v1.38.2',
          'version' => '1.38.2.0',
          'reference' => 'd3d318bad5e7a1bfbd026009c8bfb8d8f99ae6b6',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../symfony/polyfill-mbstring',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-php80' => 
        array (
          'pretty_version' => 'v1.37.0',
          'version' => '1.37.0.0',
          'reference' => 'dfb55726c3a76ea3b6459fcfda1ec2d80a682411',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../symfony/polyfill-php80',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-php83' => 
        array (
          'pretty_version' => 'v1.41.0',
          'version' => '1.41.0.0',
          'reference' => '5ea99087fb99c273a9b9236ed4c31e78b16103c6',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../symfony/polyfill-php83',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-php84' => 
        array (
          'pretty_version' => 'v1.38.1',
          'version' => '1.38.1.0',
          'reference' => 'f4e1dfaee5b74aba5964fe1fd4dfc7ba5e3085fa',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../symfony/polyfill-php84',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-php85' => 
        array (
          'pretty_version' => 'v1.41.0',
          'version' => '1.41.0.0',
          'reference' => '255fab485aaa1006ed411040c42aecd7b5302d7a',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../symfony/polyfill-php85',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-uuid' => 
        array (
          'pretty_version' => 'v1.37.0',
          'version' => '1.37.0.0',
          'reference' => '26dfec253c4cf3e51b541b52ddf7e42cb0908e94',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../symfony/polyfill-uuid',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/process' => 
        array (
          'pretty_version' => 'v7.4.13',
          'version' => '7.4.13.0',
          'reference' => 'f5804be144caceb570f6747519999636b664f24c',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../symfony/process',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/routing' => 
        array (
          'pretty_version' => 'v7.4.15',
          'version' => '7.4.15.0',
          'reference' => '80c0a93d3f8e7499f716204a1fb38ead942a7a2b',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../symfony/routing',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/service-contracts' => 
        array (
          'pretty_version' => 'v3.7.1',
          'version' => '3.7.1.0',
          'reference' => 'c0a284bab1ed8aa0417e3d69250ab437739563a0',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../symfony/service-contracts',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/string' => 
        array (
          'pretty_version' => 'v7.4.15',
          'version' => '7.4.15.0',
          'reference' => 'e394af32256bf9e7bf80849d95e589167c10097b',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../symfony/string',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/translation' => 
        array (
          'pretty_version' => 'v7.4.14',
          'version' => '7.4.14.0',
          'reference' => 'a1af4dacb24eb7ef4f1ca71b94da8ddbce572281',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../symfony/translation',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/translation-contracts' => 
        array (
          'pretty_version' => 'v3.7.1',
          'version' => '3.7.1.0',
          'reference' => 'ccb206b98faccc511ebae8e5fad50f2dc0b30621',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../symfony/translation-contracts',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/translation-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '2.3|3.0',
          ),
        ),
        'symfony/uid' => 
        array (
          'pretty_version' => 'v7.4.9',
          'version' => '7.4.9.0',
          'reference' => '2676b524340abcfe4d6151ec698463cebafee439',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../symfony/uid',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/var-dumper' => 
        array (
          'pretty_version' => 'v7.4.15',
          'version' => '7.4.15.0',
          'reference' => '04ba4add636a95ff437af3a5a9499bb1d6c6d4bd',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../symfony/var-dumper',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/yaml' => 
        array (
          'pretty_version' => 'v7.4.15',
          'version' => '7.4.15.0',
          'reference' => 'e101850ded5d2c0d44bf32abb8996404afec2dec',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../symfony/yaml',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'thecodingmachine/safe' => 
        array (
          'pretty_version' => 'v3.4.0',
          'version' => '3.4.0.0',
          'reference' => '705683a25bacf0d4860c7dea4d7947bfd09eea19',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../thecodingmachine/safe',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'theseer/tokenizer' => 
        array (
          'pretty_version' => '1.3.1',
          'version' => '1.3.1.0',
          'reference' => 'b7489ce515e168639d17feec34b8847c326b0b3c',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../theseer/tokenizer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'tijsverkoyen/css-to-inline-styles' => 
        array (
          'pretty_version' => 'v2.4.0',
          'version' => '2.4.0.0',
          'reference' => 'f0292ccf0ec75843d65027214426b6b163b48b41',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../tijsverkoyen/css-to-inline-styles',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'vlucas/phpdotenv' => 
        array (
          'pretty_version' => 'v5.6.4',
          'version' => '5.6.4.0',
          'reference' => '416df702837983f8d5ff48c9c3fee4f5f57b980b',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../vlucas/phpdotenv',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'voku/portable-ascii' => 
        array (
          'pretty_version' => '2.1.1',
          'version' => '2.1.1.0',
          'reference' => '8e1051fe39379367aecf014f41744ce7539a856f',
          'type' => 'library',
          'install_path' => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\composer/../voku/portable-ascii',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
      ),
    ),
  ),
  'executedFilesHashes' => 
  array (
    'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\phpstan-bootstrap.php' => '9187894c4e04a60b9dd7878716fedeb01946f730ef3c6ac06b59cd3042b39e23',
    'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\larastan\\larastan\\bootstrap.php' => '5a3eacbf63b3e41659adfee92facededf8e020a932800f93c9a8b0e67f235805',
    'phar://C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\phpstan\\phpstan\\phpstan.phar\\stubs\\runtime\\Attribute85.php' => 'cb8b31e82c61ce197871c9e8a6f122256751f2ab606dd2be90846d4fa5f8933e',
    'phar://C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\phpstan\\phpstan\\phpstan.phar\\stubs\\runtime\\ReflectionAttribute.php' => 'c0068e383717870a304781d462f7e2afe1c6f24e9133851852a2aca96b4fa26f',
    'phar://C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\phpstan\\phpstan\\phpstan.phar\\stubs\\runtime\\ReflectionIntersectionType.php' => '65fe0a8bc6fe285d8ddc8798ab5b9299920af70db5ad74596bc08df823e7c5d9',
    'phar://C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\vendor\\phpstan\\phpstan\\phpstan.phar\\stubs\\runtime\\ReflectionUnionType.php' => '1e2fe940e4ba4e00d9ee6adb2af3ee1bf333e6f8afe61c61deb038886d293427',
  ),
  'phpExtensions' => 
  array (
    0 => 'Core',
    1 => 'PDO',
    2 => 'Phar',
    3 => 'Reflection',
    4 => 'SPL',
    5 => 'SimpleXML',
    6 => 'bcmath',
    7 => 'bz2',
    8 => 'calendar',
    9 => 'ctype',
    10 => 'curl',
    11 => 'date',
    12 => 'dom',
    13 => 'exif',
    14 => 'fileinfo',
    15 => 'filter',
    16 => 'ftp',
    17 => 'gd',
    18 => 'gettext',
    19 => 'hash',
    20 => 'iconv',
    21 => 'intl',
    22 => 'json',
    23 => 'libxml',
    24 => 'mbstring',
    25 => 'mysqli',
    26 => 'mysqlnd',
    27 => 'openssl',
    28 => 'pcre',
    29 => 'pdo_mysql',
    30 => 'pdo_sqlite',
    31 => 'random',
    32 => 'readline',
    33 => 'session',
    34 => 'standard',
    35 => 'tokenizer',
    36 => 'xml',
    37 => 'xmlreader',
    38 => 'xmlwriter',
    39 => 'zip',
    40 => 'zlib',
  ),
  'stubFiles' => 
  array (
  ),
  'level' => '5',
),
	'projectExtensionFiles' => array (
),
	'errorsCallback' => static function (): array { return array (
); },
	'locallyIgnoredErrorsCallback' => static function (): array { return array (
); },
	'linesToIgnore' => array (
),
	'unmatchedLineIgnores' => array (
),
	'collectedDataCallback' => static function (): array { return array (
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Console\\Commands\\ProcessAttendanceCommand.php' => 
  array (
    'PHPStan\\Rules\\Comparison\\FunctionCallConstantConditionCollector' => 
    array (
      0 => 
      array (
        0 => 'PHPStan\\Rules\\Comparison\\IfConstantConditionRule',
        1 => NULL,
        2 => '$this->option(\'backfill\'):17',
        3 => NULL,
      ),
      1 => 
      array (
        0 => 'PHPStan\\Rules\\Comparison\\BooleanAndConstantConditionRule',
        1 => NULL,
        2 => '$this->option(\'from\'):20',
        3 => NULL,
      ),
      2 => 
      array (
        0 => 'PHPStan\\Rules\\Comparison\\BooleanAndConstantConditionRule',
        1 => NULL,
        2 => '$this->option(\'to\'):20',
        3 => NULL,
      ),
      3 => 
      array (
        0 => 'PHPStan\\Rules\\Comparison\\TernaryOperatorConstantConditionRule',
        1 => NULL,
        2 => '$this->option(\'date\'):24',
        3 => NULL,
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Console\\Commands\\SyncBiometricCommand.php' => 
  array (
    'PHPStan\\Rules\\Comparison\\FunctionCallConstantConditionCollector' => 
    array (
      0 => 
      array (
        0 => 'PHPStan\\Rules\\Comparison\\TernaryOperatorConstantConditionRule',
        1 => NULL,
        2 => '$this->option(\'device\'):17',
        3 => NULL,
      ),
      1 => 
      array (
        0 => 'PHPStan\\Rules\\Comparison\\IfConstantConditionRule',
        1 => NULL,
        2 => '$devices->isEmpty():21',
        3 => NULL,
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Exports\\GenericExport.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Exports\\GenericExport',
        1 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Exports\\GenericExport',
        1 => 'array',
        2 => 'App\\Exports\\GenericExport',
        3 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 'App\\Exports\\GenericExport',
        1 => 'headings',
        2 => 'App\\Exports\\GenericExport',
        3 => 
        array (
        ),
      ),
      2 => 
      array (
        0 => 'App\\Exports\\GenericExport',
        1 => 'title',
        2 => 'App\\Exports\\GenericExport',
        3 => 
        array (
        ),
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ArchiveController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'archive.index',
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\AttendanceController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'attendance.index',
      1 => 'attendance.edit',
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\AuthenticatedSessionController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'auth.login',
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Controllers\\Auth\\AuthenticatedSessionController',
        1 => 'create',
        2 => 'App\\Http\\Controllers\\Auth\\AuthenticatedSessionController',
        3 => 
        array (
          0 => 'f' . "\0" . 'view',
        ),
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\ConfirmablePasswordController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedTranslationFunctionCollector' => 
    array (
      0 => 
      array (
        0 => 'auth.password',
        1 => 32,
      ),
    ),
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'auth.confirm-password',
    ),
    'PHPStan\\Rules\\Comparison\\FunctionCallConstantConditionCollector' => 
    array (
      0 => 
      array (
        0 => 'PHPStan\\Rules\\Comparison\\BooleanNotConstantConditionRule',
        1 => NULL,
        2 => '\\Illuminate\\Support\\Facades\\Auth::guard(\'web\')->validate([\'email\' => $request->user()->email, \'password\' => $request->password]):27',
        3 => NULL,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Controllers\\Auth\\ConfirmablePasswordController',
        1 => 'show',
        2 => 'App\\Http\\Controllers\\Auth\\ConfirmablePasswordController',
        3 => 
        array (
          0 => 'f' . "\0" . 'view',
        ),
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\EmailVerificationNotificationController.php' => 
  array (
    'PHPStan\\Rules\\Comparison\\FunctionCallConstantConditionCollector' => 
    array (
      0 => 
      array (
        0 => 'PHPStan\\Rules\\Comparison\\IfConstantConditionRule',
        1 => NULL,
        2 => '$request->user()->hasVerifiedEmail():16',
        3 => NULL,
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\EmailVerificationPromptController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'auth.verify-email',
    ),
    'PHPStan\\Rules\\Comparison\\FunctionCallConstantConditionCollector' => 
    array (
      0 => 
      array (
        0 => 'PHPStan\\Rules\\Comparison\\TernaryOperatorConstantConditionRule',
        1 => NULL,
        2 => '$request->user()->hasVerifiedEmail():17',
        3 => NULL,
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\NewPasswordController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'auth.reset-password',
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Controllers\\Auth\\NewPasswordController',
        1 => 'create',
        2 => 'App\\Http\\Controllers\\Auth\\NewPasswordController',
        3 => 
        array (
          0 => 'f' . "\0" . 'view',
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureFuncCallCollector' => 
    array (
      0 => 
      array (
        0 => 'event',
        1 => 51,
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\PasswordResetLinkController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'auth.forgot-password',
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Controllers\\Auth\\PasswordResetLinkController',
        1 => 'create',
        2 => 'App\\Http\\Controllers\\Auth\\PasswordResetLinkController',
        3 => 
        array (
          0 => 'f' . "\0" . 'view',
        ),
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\RegisteredUserController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'auth.register',
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Controllers\\Auth\\RegisteredUserController',
        1 => 'create',
        2 => 'App\\Http\\Controllers\\Auth\\RegisteredUserController',
        3 => 
        array (
          0 => 'f' . "\0" . 'view',
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureFuncCallCollector' => 
    array (
      0 => 
      array (
        0 => 'event',
        1 => 45,
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\VerifyEmailController.php' => 
  array (
    'PHPStan\\Rules\\Comparison\\FunctionCallConstantConditionCollector' => 
    array (
      0 => 
      array (
        0 => 'PHPStan\\Rules\\Comparison\\IfConstantConditionRule',
        1 => NULL,
        2 => '$request->user()->hasVerifiedEmail():17',
        3 => NULL,
      ),
      1 => 
      array (
        0 => 'PHPStan\\Rules\\Comparison\\IfConstantConditionRule',
        1 => NULL,
        2 => '$request->user()->markEmailAsVerified():21',
        3 => NULL,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureFuncCallCollector' => 
    array (
      0 => 
      array (
        0 => 'event',
        1 => 22,
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\BenefitLoanController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'benefits.index',
      1 => 'loans.index',
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 38,
      ),
      1 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 58,
      ),
      2 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 105,
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\BiometricController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'biometrics.index',
      1 => 'biometrics.punches',
    ),
    'PHPStan\\Rules\\Comparison\\FunctionCallConstantConditionCollector' => 
    array (
      0 => 
      array (
        0 => 'PHPStan\\Rules\\Comparison\\BooleanNotConstantConditionRule',
        1 => NULL,
        2 => 'hash_equals($token, $request->token):97',
        3 => NULL,
      ),
      1 => 
      array (
        0 => 'PHPStan\\Rules\\Comparison\\TernaryOperatorConstantConditionRule',
        1 => NULL,
        2 => '$service->persistPunch($record):104',
        3 => NULL,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureFuncCallCollector' => 
    array (
      0 => 
      array (
        0 => 'abort',
        1 => 98,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 30,
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ClearanceController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'clearances.index',
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'firstOrCreate',
        2 => 64,
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\DashboardController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'dashboard.index',
      1 => 'dashboard.employee',
    ),
    'PHPStan\\Rules\\Comparison\\FunctionCallConstantConditionCollector' => 
    array (
      0 => 
      array (
        0 => 'PHPStan\\Rules\\Comparison\\TernaryOperatorConstantConditionRule',
        1 => NULL,
        2 => '$request->get(\'from\'):26',
        3 => NULL,
      ),
      1 => 
      array (
        0 => 'PHPStan\\Rules\\Comparison\\TernaryOperatorConstantConditionRule',
        1 => NULL,
        2 => '$request->get(\'to\'):27',
        3 => NULL,
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\DepartmentController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'departments.index',
    ),
    'PHPStan\\Rules\\Comparison\\FunctionCallConstantConditionCollector' => 
    array (
      0 => 
      array (
        0 => 'PHPStan\\Rules\\Comparison\\IfConstantConditionRule',
        1 => NULL,
        2 => '$department->employees()->exists():43',
        3 => NULL,
      ),
      1 => 
      array (
        0 => 'PHPStan\\Rules\\Comparison\\IfConstantConditionRule',
        1 => NULL,
        2 => '$position->employees()->exists():65',
        3 => NULL,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 25,
      ),
      1 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 58,
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\EmployeeController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'employees.index',
      1 => 'employees.form',
      2 => 'employees.show',
      3 => 'employees.form',
    ),
    'PHPStan\\Rules\\Comparison\\FunctionCallConstantConditionCollector' => 
    array (
      0 => 
      array (
        0 => 'PHPStan\\Rules\\Comparison\\BooleanAndConstantConditionRule',
        1 => NULL,
        2 => 'array_key_exists($field, $data):133',
        3 => NULL,
      ),
      1 => 
      array (
        0 => 'PHPStan\\Rules\\Comparison\\BooleanNotConstantConditionRule',
        1 => NULL,
        2 => '$request->filled(\'login_email\'):159',
        3 => NULL,
      ),
      2 => 
      array (
        0 => 'PHPStan\\Rules\\Comparison\\IfConstantConditionRule',
        1 => NULL,
        2 => '$request->filled(\'login_password\'):168',
        3 => NULL,
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\EmployeeSelfServiceController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'employee.no-record',
      1 => 'employee.attendance',
      2 => 'employee.schedule',
      3 => 'employee.payslips',
      4 => 'employee.receipts',
      5 => 'employee.history',
      6 => 'employee.requirements',
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Controllers\\EmployeeSelfServiceController',
        1 => 'noEmployeeRecord',
        2 => 'App\\Http\\Controllers\\EmployeeSelfServiceController',
        3 => 
        array (
          0 => 'f' . "\0" . 'view',
        ),
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\MakeUpClassController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'makeup.index',
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 54,
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\MasterDataController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'masterdata.index',
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 26,
      ),
      1 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 34,
      ),
      2 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 46,
      ),
      3 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 67,
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\NotificationController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'notifications.index',
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureFuncCallCollector' => 
    array (
      0 => 
      array (
        0 => 'abort',
        1 => 21,
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\PayrollController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'payroll.index',
      1 => 'payroll.show',
      2 => 'payroll.create',
      3 => 'payroll.line',
    ),
    'PHPStan\\Rules\\Comparison\\FunctionCallConstantConditionCollector' => 
    array (
      0 => 
      array (
        0 => 'PHPStan\\Rules\\Comparison\\IfConstantConditionRule',
        1 => NULL,
        2 => '$period->payrolls()->where(\'status\', \'released\')->exists():130',
        3 => NULL,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Controllers\\PayrollController',
        1 => 'create',
        2 => 'App\\Http\\Controllers\\PayrollController',
        3 => 
        array (
          0 => 'm' . "\0" . 'app\\models\\setting' . "\0" . 'get',
          1 => 'f' . "\0" . 'view',
        ),
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\PayrollReceiptController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'receipts.index',
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\PayslipController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'payslips.index',
      1 => 'payslips.show',
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ProfileController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'profile.edit',
    ),
    'PHPStan\\Rules\\Comparison\\FunctionCallConstantConditionCollector' => 
    array (
      0 => 
      array (
        0 => 'PHPStan\\Rules\\Comparison\\IfConstantConditionRule',
        1 => NULL,
        2 => '$request->user()->isDirty(\'email\'):31',
        3 => NULL,
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ReportController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'reports.index',
      1 => 'reports.show',
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Controllers\\ReportController',
        1 => 'attendanceColumns',
        2 => 'App\\Http\\Controllers\\ReportController',
        3 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 'App\\Http\\Controllers\\ReportController',
        1 => 'dailyColumns',
        2 => 'App\\Http\\Controllers\\ReportController',
        3 => 
        array (
        ),
      ),
      2 => 
      array (
        0 => 'App\\Http\\Controllers\\ReportController',
        1 => 'payrollColumns',
        2 => 'App\\Http\\Controllers\\ReportController',
        3 => 
        array (
        ),
      ),
      3 => 
      array (
        0 => 'App\\Http\\Controllers\\ReportController',
        1 => 'makeUpColumns',
        2 => 'App\\Http\\Controllers\\ReportController',
        3 => 
        array (
        ),
      ),
      4 => 
      array (
        0 => 'App\\Http\\Controllers\\ReportController',
        1 => 'benefitColumns',
        2 => 'App\\Http\\Controllers\\ReportController',
        3 => 
        array (
        ),
      ),
      5 => 
      array (
        0 => 'App\\Http\\Controllers\\ReportController',
        1 => 'loanColumns',
        2 => 'App\\Http\\Controllers\\ReportController',
        3 => 
        array (
        ),
      ),
      6 => 
      array (
        0 => 'App\\Http\\Controllers\\ReportController',
        1 => 'departmentColumns',
        2 => 'App\\Http\\Controllers\\ReportController',
        3 => 
        array (
        ),
      ),
      7 => 
      array (
        0 => 'App\\Http\\Controllers\\ReportController',
        1 => 'employeeColumns',
        2 => 'App\\Http\\Controllers\\ReportController',
        3 => 
        array (
        ),
      ),
      8 => 
      array (
        0 => 'App\\Http\\Controllers\\ReportController',
        1 => 'titleFor',
        2 => 'App\\Http\\Controllers\\ReportController',
        3 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureFuncCallCollector' => 
    array (
      0 => 
      array (
        0 => 'abort',
        1 => 95,
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\RequirementController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'requirements.index',
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 43,
      ),
      1 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'updateOrCreate',
        2 => 65,
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ScheduleController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'schedules.index',
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 60,
      ),
      1 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 80,
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\SettingsController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'settings.index',
      1 => 'settings.payroll',
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Controllers\\SettingsController',
        1 => 'payroll',
        2 => 'App\\Http\\Controllers\\SettingsController',
        3 => 
        array (
          0 => 'm' . "\0" . 'app\\models\\setting' . "\0" . 'get',
          1 => 'm' . "\0" . 'app\\http\\controllers\\settingscontroller' . "\0" . 'defaultvalue',
          2 => 'f' . "\0" . 'view',
        ),
      ),
      1 => 
      array (
        0 => 'App\\Http\\Controllers\\SettingsController',
        1 => 'defaultValue',
        2 => 'App\\Http\\Controllers\\SettingsController',
        3 => 
        array (
        ),
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\UserController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'users.index',
      1 => 'users.form',
      2 => 'users.form',
    ),
    'PHPStan\\Rules\\Comparison\\FunctionCallConstantConditionCollector' => 
    array (
      0 => 
      array (
        0 => 'PHPStan\\Rules\\Comparison\\IfConstantConditionRule',
        1 => NULL,
        2 => '$request->filled(\'password\'):60',
        3 => NULL,
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Middleware\\RoleMiddleware.php' => 
  array (
    'PHPStan\\Rules\\Comparison\\FunctionCallConstantConditionCollector' => 
    array (
      0 => 
      array (
        0 => 'PHPStan\\Rules\\Comparison\\BooleanNotConstantConditionRule',
        1 => NULL,
        2 => 'in_array($user->role, $roles, true):26',
        3 => NULL,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureFuncCallCollector' => 
    array (
      0 => 
      array (
        0 => 'abort',
        1 => 27,
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Requests\\Auth\\LoginRequest.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedTranslationFunctionCollector' => 
    array (
      0 => 
      array (
        0 => 'auth.failed',
        1 => 51,
      ),
      1 => 
      array (
        0 => 'auth.throttle',
        1 => 74,
      ),
    ),
    'PHPStan\\Rules\\Comparison\\FunctionCallConstantConditionCollector' => 
    array (
      0 => 
      array (
        0 => 'PHPStan\\Rules\\Comparison\\BooleanNotConstantConditionRule',
        1 => NULL,
        2 => '\\Illuminate\\Support\\Facades\\Auth::attempt($credentials, $this->boolean(\'remember\')):47',
        3 => NULL,
      ),
      1 => 
      array (
        0 => 'PHPStan\\Rules\\Comparison\\BooleanNotConstantConditionRule',
        1 => NULL,
        2 => '\\Illuminate\\Support\\Facades\\RateLimiter::tooManyAttempts($this->throttleKey(), 5):65',
        3 => NULL,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Requests\\Auth\\LoginRequest',
        1 => 'authorize',
        2 => 'App\\Http\\Requests\\Auth\\LoginRequest',
        3 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 'App\\Http\\Requests\\Auth\\LoginRequest',
        1 => 'rules',
        2 => 'App\\Http\\Requests\\Auth\\LoginRequest',
        3 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureFuncCallCollector' => 
    array (
      0 => 
      array (
        0 => 'event',
        1 => 69,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Support\\Facades\\RateLimiter',
        1 => 'hit',
        2 => 48,
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Archive.php' => 
  array (
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Attendance.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Models\\Attendance',
        1 => 'getStatusLabelAttribute',
        2 => 'App\\Models\\Attendance',
        3 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 'App\\Models\\Attendance',
        1 => 'getStatusColorAttribute',
        2 => 'App\\Models\\Attendance',
        3 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\AttendanceLog.php' => 
  array (
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Benefit.php' => 
  array (
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\BiometricDevice.php' => 
  array (
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Clearance.php' => 
  array (
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Department.php' => 
  array (
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Employee.php' => 
  array (
    'PHPStan\\Rules\\Comparison\\FunctionCallConstantConditionCollector' => 
    array (
      0 => 
      array (
        0 => 'PHPStan\\Rules\\Comparison\\IfConstantConditionRule',
        1 => NULL,
        2 => '$required->isEmpty():252',
        3 => NULL,
      ),
      1 => 
      array (
        0 => 'PHPStan\\Rules\\Comparison\\IfConstantConditionRule',
        1 => NULL,
        2 => '$required->isEmpty():265',
        3 => NULL,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Models\\Employee',
        1 => 'getFullNameAttribute',
        2 => 'App\\Models\\Employee',
        3 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 'App\\Models\\Employee',
        1 => 'getIsTeachingAttribute',
        2 => 'App\\Models\\Employee',
        3 => 
        array (
        ),
      ),
      2 => 
      array (
        0 => 'App\\Models\\Employee',
        1 => 'getIsPermanentAttribute',
        2 => 'App\\Models\\Employee',
        3 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeBenefit.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Models\\EmployeeBenefit',
        1 => 'getEffectiveAmountAttribute',
        2 => 'App\\Models\\EmployeeBenefit',
        3 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeClearance.php' => 
  array (
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeRequirement.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Models\\EmployeeRequirement',
        1 => 'getStatusColorAttribute',
        2 => 'App\\Models\\EmployeeRequirement',
        3 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Loan.php' => 
  array (
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\LoanPayment.php' => 
  array (
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\MakeUpClass.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Models\\MakeUpClass',
        1 => 'computeAdditionalPay',
        2 => 'App\\Models\\MakeUpClass',
        3 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Notification.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 66,
      ),
    ),
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Payroll.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Models\\Payroll',
        1 => 'getStatusLabelAttribute',
        2 => 'App\\Models\\Payroll',
        3 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 'App\\Models\\Payroll',
        1 => 'getStatusColorAttribute',
        2 => 'App\\Models\\Payroll',
        3 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\PayrollPeriod.php' => 
  array (
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\PayrollReceipt.php' => 
  array (
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Payslip.php' => 
  array (
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Position.php' => 
  array (
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Requirement.php' => 
  array (
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Room.php' => 
  array (
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\SchoolYear.php' => 
  array (
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Semester.php' => 
  array (
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Setting.php' => 
  array (
    'PHPStan\\Rules\\Comparison\\FunctionCallConstantConditionCollector' => 
    array (
      0 => 
      array (
        0 => 'PHPStan\\Rules\\Comparison\\TernaryOperatorConstantConditionRule',
        1 => NULL,
        2 => 'is_array($value):49',
        3 => NULL,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'updateOrCreate',
        2 => 50,
      ),
    ),
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Subject.php' => 
  array (
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\TeachingSchedule.php' => 
  array (
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\User.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Models\\User',
        1 => 'casts',
        2 => 'App\\Models\\User',
        3 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 'App\\Models\\User',
        1 => 'hasRole',
        2 => 'App\\Models\\User',
        3 => 
        array (
        ),
      ),
      2 => 
      array (
        0 => 'App\\Models\\User',
        1 => 'isAdmin',
        2 => 'App\\Models\\User',
        3 => 
        array (
        ),
      ),
      3 => 
      array (
        0 => 'App\\Models\\User',
        1 => 'isHr',
        2 => 'App\\Models\\User',
        3 => 
        array (
        ),
      ),
      4 => 
      array (
        0 => 'App\\Models\\User',
        1 => 'isPayroll',
        2 => 'App\\Models\\User',
        3 => 
        array (
        ),
      ),
      5 => 
      array (
        0 => 'App\\Models\\User',
        1 => 'isDepartmentHead',
        2 => 'App\\Models\\User',
        3 => 
        array (
        ),
      ),
      6 => 
      array (
        0 => 'App\\Models\\User',
        1 => 'roleLabel',
        2 => 'App\\Models\\User',
        3 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
        1 => 'Illuminate\\Notifications\\Notifiable',
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\WorkSchedule.php' => 
  array (
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\ArchiveService.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'updateOrCreate',
        2 => 38,
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\AttendanceService.php' => 
  array (
    'PHPStan\\Rules\\Comparison\\FunctionCallConstantConditionCollector' => 
    array (
      0 => 
      array (
        0 => 'PHPStan\\Rules\\Comparison\\IfConstantConditionRule',
        1 => NULL,
        2 => '$punchTimes->isEmpty():145',
        3 => NULL,
      ),
      1 => 
      array (
        0 => 'PHPStan\\Rules\\Comparison\\IfConstantConditionRule',
        1 => NULL,
        2 => '$timeOut->lt($timeIn):167',
        3 => NULL,
      ),
      2 => 
      array (
        0 => 'PHPStan\\Rules\\Comparison\\WhileLoopAlwaysFalseConditionRule',
        1 => NULL,
        2 => '$cursor->lte($to):243',
        3 => NULL,
      ),
      3 => 
      array (
        0 => 'PHPStan\\Rules\\Comparison\\WhileLoopAlwaysTrueConditionRule',
        1 => NULL,
        2 => '$cursor->lte($to):243',
        3 => NULL,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 92,
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\BiometricService.php' => 
  array (
    'PHPStan\\Rules\\Comparison\\FunctionCallConstantConditionCollector' => 
    array (
      0 => 
      array (
        0 => 'PHPStan\\Rules\\Comparison\\BooleanNotConstantConditionRule',
        1 => NULL,
        2 => '$this->connect($device):196',
        3 => NULL,
      ),
      1 => 
      array (
        0 => 'PHPStan\\Rules\\Comparison\\TernaryOperatorConstantConditionRule',
        1 => NULL,
        2 => '$this->persistPunch($record):217',
        3 => NULL,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Services\\BiometricService',
        1 => 'isConnected',
        2 => 'App\\Services\\BiometricService',
        3 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 'App\\Services\\BiometricService',
        1 => 'buildFrame',
        2 => 'App\\Services\\BiometricService',
        3 => 
        array (
        ),
      ),
      2 => 
      array (
        0 => 'App\\Services\\BiometricService',
        1 => 'sendCommand',
        2 => 'App\\Services\\BiometricService',
        3 => 
        array (
          0 => 'm' . "\0" . 'app\\services\\biometricservice' . "\0" . 'buildframe',
          1 => 'f' . "\0" . 'fwrite',
          2 => 'm' . "\0" . 'illuminate\\log\\logger' . "\0" . 'warning',
        ),
      ),
      3 => 
      array (
        0 => 'App\\Services\\BiometricService',
        1 => 'readResponse',
        2 => 'App\\Services\\BiometricService',
        3 => 
        array (
          0 => 'f' . "\0" . 'fread',
        ),
      ),
      4 => 
      array (
        0 => 'App\\Services\\BiometricService',
        1 => 'parseRecords',
        2 => 'App\\Services\\BiometricService',
        3 => 
        array (
          0 => 'm' . "\0" . 'carbon\\carbon' . "\0" . 'create',
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureFuncCallCollector' => 
    array (
      0 => 
      array (
        0 => 'stream_set_timeout',
        1 => 64,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureMethodCallCollector' => 
    array (
      0 => 
      array (
        0 => 
        array (
          0 => 'App\\Services\\BiometricService',
        ),
        1 => 'sendCommand',
        2 => 66,
      ),
      1 => 
      array (
        0 => 
        array (
          0 => 'App\\Services\\BiometricService',
        ),
        1 => 'sendCommand',
        2 => 200,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 245,
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\PayrollService.php' => 
  array (
    'PHPStan\\Rules\\Comparison\\FunctionCallConstantConditionCollector' => 
    array (
      0 => 
      array (
        0 => 'PHPStan\\Rules\\Comparison\\BooleanAndConstantConditionRule',
        1 => NULL,
        2 => '$eb->effective_date->gt($p->end_date):104',
        3 => NULL,
      ),
      1 => 
      array (
        0 => 'PHPStan\\Rules\\Comparison\\BooleanAndConstantConditionRule',
        1 => NULL,
        2 => '$eb->expiration_date->lt($p->start_date):107',
        3 => NULL,
      ),
      2 => 
      array (
        0 => 'PHPStan\\Rules\\Comparison\\BooleanNotConstantConditionRule',
        1 => NULL,
        2 => '$e->hasCompleteClearance():246',
        3 => NULL,
      ),
      3 => 
      array (
        0 => 'PHPStan\\Rules\\Comparison\\BooleanNotConstantConditionRule',
        1 => NULL,
        2 => '$e->hasCompleteRequirements():249',
        3 => NULL,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Services\\PayrollService',
        1 => 'computeWithholdingTax',
        2 => 'App\\Services\\PayrollService',
        3 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 'App\\Services\\PayrollService',
        1 => 'sss',
        2 => 'App\\Services\\PayrollService',
        3 => 
        array (
          0 => 'm' . "\0" . 'app\\models\\setting' . "\0" . 'get',
        ),
      ),
      2 => 
      array (
        0 => 'App\\Services\\PayrollService',
        1 => 'philhealth',
        2 => 'App\\Services\\PayrollService',
        3 => 
        array (
          0 => 'm' . "\0" . 'app\\models\\setting' . "\0" . 'get',
        ),
      ),
      3 => 
      array (
        0 => 'App\\Services\\PayrollService',
        1 => 'pagibig',
        2 => 'App\\Services\\PayrollService',
        3 => 
        array (
          0 => 'm' . "\0" . 'app\\models\\setting' . "\0" . 'get',
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Connection',
        1 => 'transaction',
        2 => 238,
      ),
      1 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'updateOrCreate',
        2 => 255,
      ),
      2 => 
      array (
        0 => 'Illuminate\\Database\\Connection',
        1 => 'transaction',
        2 => 288,
      ),
      3 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 296,
      ),
      4 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 305,
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\ReportService.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Services\\ReportService',
        1 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Services\\ReportService',
        1 => 'departmentId',
        2 => 'App\\Services\\ReportService',
        3 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 'App\\Services\\ReportService',
        1 => 'classification',
        2 => 'App\\Services\\ReportService',
        3 => 
        array (
        ),
      ),
      2 => 
      array (
        0 => 'App\\Services\\ReportService',
        1 => 'employmentStatus',
        2 => 'App\\Services\\ReportService',
        3 => 
        array (
        ),
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\View\\Components\\AppLayout.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'layouts.hris',
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\View\\Components\\AppLayout',
        1 => 'render',
        2 => 'App\\View\\Components\\AppLayout',
        3 => 
        array (
          0 => 'f' . "\0" . 'view',
        ),
      ),
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\View\\Components\\GuestLayout.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'layouts.guest',
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\View\\Components\\GuestLayout',
        1 => 'render',
        2 => 'App\\View\\Components\\GuestLayout',
        3 => 
        array (
          0 => 'f' . "\0" . 'view',
        ),
      ),
    ),
  ),
); },
	'dependencies' => array (
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Console\\Commands\\ProcessAttendanceCommand.php' => 
  array (
    'fileHash' => '78cc1f555b2603bcfedb7525c2c60868a06878a1e0da8f57474f69b851da8d85',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Console\\Commands\\SyncBiometricCommand.php' => 
  array (
    'fileHash' => 'a4a99986979f59f4c469a0c43261855e10c698d1476d0fb93c8e9a6cfdb9aa9a',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Exports\\GenericExport.php' => 
  array (
    'fileHash' => '39df4d695f0e99a141c04f98d54138365ad80b95573d6f3a4acc2eec5aa2296c',
    'dependentFiles' => 
    array (
      0 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ReportController.php',
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ArchiveController.php' => 
  array (
    'fileHash' => '87f0ec3a4b17f1ea8bf9fc3fc7819916f9aba850bbb7497cd818a6862aa3feeb',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\AttendanceController.php' => 
  array (
    'fileHash' => '3c33e584f1f940640ff85d550f912dea37bbc7734ef2e69e99cd13a246a8ca92',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\AuthenticatedSessionController.php' => 
  array (
    'fileHash' => '7abca3bbac59a74848386606a67694f3de4b3b5e1e8ff5eaae8a30c2da3f8592',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\ConfirmablePasswordController.php' => 
  array (
    'fileHash' => '7322ce4e2ccdf76d1583cd84d27f5708436ffc91d7d00ee7abbde40f3e403ba7',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\EmailVerificationNotificationController.php' => 
  array (
    'fileHash' => '24d5704b7534ad365800a33e7c537bf63467f1271c4bc801b351c8a05a77e5b9',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\EmailVerificationPromptController.php' => 
  array (
    'fileHash' => '6b5b4b75fc25c43c1b31106f63f7b1f854b729527b2f5c067f122f4857f85e3a',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\NewPasswordController.php' => 
  array (
    'fileHash' => '64300ff2989baeb1924c6b0d698cdcd189796ed45d5b14135a03c4607e4007af',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\PasswordController.php' => 
  array (
    'fileHash' => '81f68e0aa74f66038082364499dde9a1b1d93ca961448bd8b46bc77aa17117fd',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\PasswordResetLinkController.php' => 
  array (
    'fileHash' => '82a07fee8b04223bf3587e5d3458de77275335104efa304aaf9e4a2dad1dea8c',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\RegisteredUserController.php' => 
  array (
    'fileHash' => '3ff4b60d65feaea37daff2f0de9f6be3cf381c941c4ae04a5ac4657637cfdd4e',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\VerifyEmailController.php' => 
  array (
    'fileHash' => '5f6080a239709740135d9138085ceb1857c5570a0fea35e62c976fc90929631e',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\BenefitLoanController.php' => 
  array (
    'fileHash' => '26ac492da229ec79471eb3175b5be7a91e3e9fc60a8594393958e1210cc445a6',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\BiometricController.php' => 
  array (
    'fileHash' => '30e0289f9b6b87b37120b2a8e24331f0801e82ca45f85a8ceb6285e625750fba',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ClearanceController.php' => 
  array (
    'fileHash' => '5f3ff9b5035e45f0d0810be51ef281ab9983f0be46d36e0c35ffe7033e26e291',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Controller.php' => 
  array (
    'fileHash' => '25d1c1ef8e6cc8a376553faacfba2b07d9dfaee9bdbb84f14f77517580e9deb1',
    'dependentFiles' => 
    array (
      0 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ArchiveController.php',
      1 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\AttendanceController.php',
      2 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\AuthenticatedSessionController.php',
      3 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\ConfirmablePasswordController.php',
      4 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\EmailVerificationNotificationController.php',
      5 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\EmailVerificationPromptController.php',
      6 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\NewPasswordController.php',
      7 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\PasswordController.php',
      8 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\PasswordResetLinkController.php',
      9 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\RegisteredUserController.php',
      10 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\VerifyEmailController.php',
      11 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\BenefitLoanController.php',
      12 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\BiometricController.php',
      13 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ClearanceController.php',
      14 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\DashboardController.php',
      15 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\DepartmentController.php',
      16 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\EmployeeController.php',
      17 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\EmployeeSelfServiceController.php',
      18 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\MakeUpClassController.php',
      19 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\MasterDataController.php',
      20 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\NotificationController.php',
      21 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\PayrollController.php',
      22 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\PayrollReceiptController.php',
      23 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\PayslipController.php',
      24 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ProfileController.php',
      25 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ReportController.php',
      26 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\RequirementController.php',
      27 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ScheduleController.php',
      28 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\SettingsController.php',
      29 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\UserController.php',
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\DashboardController.php' => 
  array (
    'fileHash' => 'eada1cd5068d00843ae914c41ab826767056d21dff3bd8dfd3af2f66262c4c35',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\DepartmentController.php' => 
  array (
    'fileHash' => 'e6cbc56bd3c1921236e9ab557677f4431f9a57c2166bd0f7a673ddc4d335f530',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\EmployeeController.php' => 
  array (
    'fileHash' => 'caa5951c20eeee531d846226eb225eab60f479ae6573c9439257f88afae230a6',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\EmployeeSelfServiceController.php' => 
  array (
    'fileHash' => '208bd2ea1fa6842ddd4474557620b4bf6bf2fc50a783a37c6fedc1ea2c6c36f7',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\MakeUpClassController.php' => 
  array (
    'fileHash' => '32388c4c2589e2054a032ac9a352a25d453fd49e567162927c498eb695db914e',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\MasterDataController.php' => 
  array (
    'fileHash' => '09f63139fe012fb6eddbfa158881049c2e400af47fdc87a85999ba91e9ba24c3',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\NotificationController.php' => 
  array (
    'fileHash' => '4481a82b924775c1bd9154ddc9d3dc95658ad0a3e5275ad8d27f61a4ed63dbad',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\PayrollController.php' => 
  array (
    'fileHash' => 'dea3adde74c998c375c3dfe1f8ac1eef8bcf2cf2598947e397b52acb765b7d91',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\PayrollReceiptController.php' => 
  array (
    'fileHash' => 'f4a7880012fb020d856bd445705b6a666d9a255493a129dbc0143384eea3bb62',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\PayslipController.php' => 
  array (
    'fileHash' => '0662f6a8eac53910f9a34c5829b18c05a03d5825137579ae53206609d06376c8',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ProfileController.php' => 
  array (
    'fileHash' => '01586a456c9162ecf08234897b47ab29828e67b185e68983932ecc41a76ed355',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ReportController.php' => 
  array (
    'fileHash' => '408dba6f7c16d9864cc8626179c7c59e7198590cac03157e11ae00c5235e2193',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\RequirementController.php' => 
  array (
    'fileHash' => 'c7157046715fc55a4f630ccfae09e20f840049db8092a74e89da2a5398b77087',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ScheduleController.php' => 
  array (
    'fileHash' => 'e4689a82171aa6213ffb9de9786cb03252ab7d6ddf43a8c65f5c8249b4c73821',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\SettingsController.php' => 
  array (
    'fileHash' => 'cda962fbf9a8e3d30b8157b790725b1e776d67da23da91bbc53364e826532867',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\UserController.php' => 
  array (
    'fileHash' => '3fec018c12498785759070e973c4d8aaa099e81ecbc935dc84b35fe49cc851cf',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Middleware\\RoleMiddleware.php' => 
  array (
    'fileHash' => '5d8f97f0fd4bd12384d85dd86e0826087e71f40f363220717a3ad65a5ae055b0',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Requests\\Auth\\LoginRequest.php' => 
  array (
    'fileHash' => 'baabce490eb862f7f1eb59142cbebc5b5ddad64f11950d47e2c081da6d63df62',
    'dependentFiles' => 
    array (
      0 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\AuthenticatedSessionController.php',
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Requests\\ProfileUpdateRequest.php' => 
  array (
    'fileHash' => '720b4e00a5f02025c8448fd8a3bac93eb0e55a64d5ff861581b6a00c26dfd871',
    'dependentFiles' => 
    array (
      0 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ProfileController.php',
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Archive.php' => 
  array (
    'fileHash' => 'ac3c2bab36b657acf99caf42d162d374f249373040b42ee97149bfd95615cc4b',
    'dependentFiles' => 
    array (
      0 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ArchiveController.php',
      1 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\ArchiveService.php',
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Attendance.php' => 
  array (
    'fileHash' => 'cbef35cd6f5491e4a024180cde062cba79044f91c6d99d3f81d01b64ef04bd1f',
    'dependentFiles' => 
    array (
      0 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\AttendanceController.php',
      1 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\BiometricController.php',
      2 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ClearanceController.php',
      3 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\DashboardController.php',
      4 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\EmployeeController.php',
      5 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\EmployeeSelfServiceController.php',
      6 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\MakeUpClassController.php',
      7 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\PayslipController.php',
      8 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ScheduleController.php',
      9 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\UserController.php',
      10 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\AttendanceLog.php',
      11 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Department.php',
      12 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Employee.php',
      13 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeBenefit.php',
      14 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeClearance.php',
      15 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeRequirement.php',
      16 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Loan.php',
      17 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\MakeUpClass.php',
      18 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Payroll.php',
      19 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\PayrollReceipt.php',
      20 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Payslip.php',
      21 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Position.php',
      22 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\TeachingSchedule.php',
      23 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\User.php',
      24 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\WorkSchedule.php',
      25 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\ArchiveService.php',
      26 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\AttendanceService.php',
      27 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\BiometricService.php',
      28 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\PayrollService.php',
      29 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\ReportService.php',
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\AttendanceLog.php' => 
  array (
    'fileHash' => '1386e6c756983183af02abfbf3788c00f51c885f0462e49976c4bbcd04543af8',
    'dependentFiles' => 
    array (
      0 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Console\\Commands\\SyncBiometricCommand.php',
      1 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\AttendanceController.php',
      2 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\BiometricController.php',
      3 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Attendance.php',
      4 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\BiometricDevice.php',
      5 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\AttendanceService.php',
      6 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\BiometricService.php',
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Benefit.php' => 
  array (
    'fileHash' => '9c58baca79abf41df4cdde0645fe1a35b19d8966a1eecbc7d7f3cd9c7341dfa6',
    'dependentFiles' => 
    array (
      0 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\BenefitLoanController.php',
      1 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Employee.php',
      2 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeBenefit.php',
      3 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\PayrollService.php',
      4 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\ReportService.php',
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\BiometricDevice.php' => 
  array (
    'fileHash' => 'd63ab37f86be1bcbc1fc289b3bf2b5910b75eb828cd26b852f0f834146a3fc78',
    'dependentFiles' => 
    array (
      0 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Console\\Commands\\SyncBiometricCommand.php',
      1 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\AttendanceController.php',
      2 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\BiometricController.php',
      3 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\DashboardController.php',
      4 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Attendance.php',
      5 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\AttendanceLog.php',
      6 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Employee.php',
      7 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\ArchiveService.php',
      8 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\AttendanceService.php',
      9 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\BiometricService.php',
      10 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\PayrollService.php',
      11 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\ReportService.php',
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Clearance.php' => 
  array (
    'fileHash' => '8a809b1634df793af4ba913f0c0d266b7883ba86a1ea5c617278babaa48a5086',
    'dependentFiles' => 
    array (
      0 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ClearanceController.php',
      1 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Employee.php',
      2 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeClearance.php',
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Department.php' => 
  array (
    'fileHash' => '74c5a4481bb85c0b08989764d4c0cad34834a2ef1621490b4a372c6b661fe08a',
    'dependentFiles' => 
    array (
      0 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\AttendanceController.php',
      1 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\BenefitLoanController.php',
      2 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\BiometricController.php',
      3 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ClearanceController.php',
      4 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\DashboardController.php',
      5 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\DepartmentController.php',
      6 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\EmployeeController.php',
      7 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\EmployeeSelfServiceController.php',
      8 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\MakeUpClassController.php',
      9 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\PayrollController.php',
      10 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\PayrollReceiptController.php',
      11 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\PayslipController.php',
      12 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\RequirementController.php',
      13 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ScheduleController.php',
      14 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\UserController.php',
      15 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Attendance.php',
      16 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\AttendanceLog.php',
      17 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Employee.php',
      18 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeBenefit.php',
      19 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeClearance.php',
      20 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeRequirement.php',
      21 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Loan.php',
      22 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\MakeUpClass.php',
      23 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Payroll.php',
      24 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\PayrollReceipt.php',
      25 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Payslip.php',
      26 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Position.php',
      27 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\TeachingSchedule.php',
      28 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\User.php',
      29 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\WorkSchedule.php',
      30 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\ArchiveService.php',
      31 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\AttendanceService.php',
      32 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\BiometricService.php',
      33 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\PayrollService.php',
      34 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\ReportService.php',
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Employee.php' => 
  array (
    'fileHash' => 'b2c546b5b5da4eb160859c3b6f21d3dc959cf3e5391941e60a0990898404afcc',
    'dependentFiles' => 
    array (
      0 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\AttendanceController.php',
      1 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\ConfirmablePasswordController.php',
      2 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\EmailVerificationNotificationController.php',
      3 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\EmailVerificationPromptController.php',
      4 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\NewPasswordController.php',
      5 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\PasswordController.php',
      6 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\RegisteredUserController.php',
      7 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\VerifyEmailController.php',
      8 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\BenefitLoanController.php',
      9 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\BiometricController.php',
      10 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ClearanceController.php',
      11 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\DashboardController.php',
      12 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\DepartmentController.php',
      13 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\EmployeeController.php',
      14 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\EmployeeSelfServiceController.php',
      15 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\MakeUpClassController.php',
      16 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\PayrollController.php',
      17 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\PayrollReceiptController.php',
      18 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\PayslipController.php',
      19 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ProfileController.php',
      20 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ReportController.php',
      21 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\RequirementController.php',
      22 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ScheduleController.php',
      23 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\UserController.php',
      24 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Middleware\\RoleMiddleware.php',
      25 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Requests\\ProfileUpdateRequest.php',
      26 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Archive.php',
      27 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Attendance.php',
      28 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\AttendanceLog.php',
      29 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Benefit.php',
      30 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\BiometricDevice.php',
      31 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Clearance.php',
      32 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Department.php',
      33 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeBenefit.php',
      34 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeClearance.php',
      35 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeRequirement.php',
      36 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Loan.php',
      37 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\LoanPayment.php',
      38 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\MakeUpClass.php',
      39 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Notification.php',
      40 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Payroll.php',
      41 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\PayrollPeriod.php',
      42 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\PayrollReceipt.php',
      43 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Payslip.php',
      44 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Position.php',
      45 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Requirement.php',
      46 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Subject.php',
      47 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\TeachingSchedule.php',
      48 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\User.php',
      49 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\WorkSchedule.php',
      50 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\ArchiveService.php',
      51 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\AttendanceService.php',
      52 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\BiometricService.php',
      53 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\PayrollService.php',
      54 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\ReportService.php',
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeBenefit.php' => 
  array (
    'fileHash' => '8bd0f28179ca5a63d5f787bb20d872426c6a84743645300b293b2a94a3ecaa41',
    'dependentFiles' => 
    array (
      0 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\AttendanceController.php',
      1 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\BenefitLoanController.php',
      2 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\BiometricController.php',
      3 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ClearanceController.php',
      4 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\DashboardController.php',
      5 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\EmployeeController.php',
      6 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\EmployeeSelfServiceController.php',
      7 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\MakeUpClassController.php',
      8 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\PayslipController.php',
      9 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ScheduleController.php',
      10 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\UserController.php',
      11 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Attendance.php',
      12 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\AttendanceLog.php',
      13 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Benefit.php',
      14 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Department.php',
      15 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Employee.php',
      16 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeClearance.php',
      17 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeRequirement.php',
      18 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Loan.php',
      19 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\MakeUpClass.php',
      20 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Payroll.php',
      21 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\PayrollReceipt.php',
      22 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Payslip.php',
      23 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Position.php',
      24 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\TeachingSchedule.php',
      25 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\User.php',
      26 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\WorkSchedule.php',
      27 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\AttendanceService.php',
      28 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\BiometricService.php',
      29 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\PayrollService.php',
      30 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\ReportService.php',
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeClearance.php' => 
  array (
    'fileHash' => '44ed2fb44096b8ebcc0eb5db5d35d21d77dba1b9379c92c2781071d51e9ccb97',
    'dependentFiles' => 
    array (
      0 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\AttendanceController.php',
      1 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\BiometricController.php',
      2 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ClearanceController.php',
      3 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\DashboardController.php',
      4 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\EmployeeController.php',
      5 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\EmployeeSelfServiceController.php',
      6 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\MakeUpClassController.php',
      7 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\PayslipController.php',
      8 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ScheduleController.php',
      9 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\UserController.php',
      10 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Attendance.php',
      11 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\AttendanceLog.php',
      12 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Clearance.php',
      13 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Department.php',
      14 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Employee.php',
      15 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeBenefit.php',
      16 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeRequirement.php',
      17 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Loan.php',
      18 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\MakeUpClass.php',
      19 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Payroll.php',
      20 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\PayrollReceipt.php',
      21 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Payslip.php',
      22 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Position.php',
      23 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\TeachingSchedule.php',
      24 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\User.php',
      25 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\WorkSchedule.php',
      26 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\AttendanceService.php',
      27 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\BiometricService.php',
      28 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\PayrollService.php',
      29 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\ReportService.php',
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeRequirement.php' => 
  array (
    'fileHash' => '2e64cd5a1483303e1080fd69a4171296e9e1ab9ea4dd3e4eed288ec88d625fa3',
    'dependentFiles' => 
    array (
      0 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\AttendanceController.php',
      1 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\BiometricController.php',
      2 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ClearanceController.php',
      3 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\DashboardController.php',
      4 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\EmployeeController.php',
      5 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\EmployeeSelfServiceController.php',
      6 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\MakeUpClassController.php',
      7 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\PayslipController.php',
      8 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\RequirementController.php',
      9 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ScheduleController.php',
      10 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\UserController.php',
      11 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Attendance.php',
      12 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\AttendanceLog.php',
      13 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Department.php',
      14 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Employee.php',
      15 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeBenefit.php',
      16 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeClearance.php',
      17 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Loan.php',
      18 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\MakeUpClass.php',
      19 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Payroll.php',
      20 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\PayrollReceipt.php',
      21 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Payslip.php',
      22 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Position.php',
      23 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Requirement.php',
      24 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\TeachingSchedule.php',
      25 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\User.php',
      26 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\WorkSchedule.php',
      27 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\AttendanceService.php',
      28 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\BiometricService.php',
      29 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\PayrollService.php',
      30 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\ReportService.php',
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Loan.php' => 
  array (
    'fileHash' => '07922a8414aa105aa6079f6d58d7ab23a9685eeedc9bb4728b8a52a737a34970',
    'dependentFiles' => 
    array (
      0 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\AttendanceController.php',
      1 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\BenefitLoanController.php',
      2 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\BiometricController.php',
      3 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ClearanceController.php',
      4 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\DashboardController.php',
      5 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\EmployeeController.php',
      6 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\EmployeeSelfServiceController.php',
      7 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\MakeUpClassController.php',
      8 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\PayslipController.php',
      9 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ScheduleController.php',
      10 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\UserController.php',
      11 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Attendance.php',
      12 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\AttendanceLog.php',
      13 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Department.php',
      14 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Employee.php',
      15 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeBenefit.php',
      16 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeClearance.php',
      17 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeRequirement.php',
      18 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\LoanPayment.php',
      19 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\MakeUpClass.php',
      20 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Payroll.php',
      21 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\PayrollReceipt.php',
      22 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Payslip.php',
      23 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Position.php',
      24 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\TeachingSchedule.php',
      25 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\User.php',
      26 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\WorkSchedule.php',
      27 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\AttendanceService.php',
      28 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\BiometricService.php',
      29 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\PayrollService.php',
      30 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\ReportService.php',
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\LoanPayment.php' => 
  array (
    'fileHash' => '6dfdfeb0934112477667655ed7079c5bdef6595dcb780e19e93ba56b4a1babbe',
    'dependentFiles' => 
    array (
      0 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\BenefitLoanController.php',
      1 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\DashboardController.php',
      2 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\PayrollController.php',
      3 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\PayslipController.php',
      4 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Employee.php',
      5 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Loan.php',
      6 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Payroll.php',
      7 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\PayrollPeriod.php',
      8 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\PayrollReceipt.php',
      9 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Payslip.php',
      10 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\ArchiveService.php',
      11 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\PayrollService.php',
      12 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\ReportService.php',
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\MakeUpClass.php' => 
  array (
    'fileHash' => 'dff5d4eef4c18a42491fd6271236d8d2646408c4b34731d5459617952f87a01f',
    'dependentFiles' => 
    array (
      0 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\AttendanceController.php',
      1 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\BiometricController.php',
      2 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ClearanceController.php',
      3 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\DashboardController.php',
      4 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\EmployeeController.php',
      5 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\EmployeeSelfServiceController.php',
      6 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\MakeUpClassController.php',
      7 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\PayslipController.php',
      8 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ScheduleController.php',
      9 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\UserController.php',
      10 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Attendance.php',
      11 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\AttendanceLog.php',
      12 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Department.php',
      13 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Employee.php',
      14 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeBenefit.php',
      15 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeClearance.php',
      16 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeRequirement.php',
      17 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Loan.php',
      18 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Payroll.php',
      19 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\PayrollReceipt.php',
      20 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Payslip.php',
      21 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Position.php',
      22 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\TeachingSchedule.php',
      23 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\User.php',
      24 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\WorkSchedule.php',
      25 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\ArchiveService.php',
      26 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\AttendanceService.php',
      27 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\BiometricService.php',
      28 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\PayrollService.php',
      29 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\ReportService.php',
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Notification.php' => 
  array (
    'fileHash' => '3691061163e460b5c6cbcf65651fe529d6569a75410f7a760a83f335dde788bd',
    'dependentFiles' => 
    array (
      0 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\MakeUpClassController.php',
      1 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\NotificationController.php',
      2 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\PayrollService.php',
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Payroll.php' => 
  array (
    'fileHash' => 'a580f756944eb69302c50a4abc177fd5ce99c78b1c728bd7e9c083a0c55f7318',
    'dependentFiles' => 
    array (
      0 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\AttendanceController.php',
      1 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\BiometricController.php',
      2 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ClearanceController.php',
      3 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\DashboardController.php',
      4 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\EmployeeController.php',
      5 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\EmployeeSelfServiceController.php',
      6 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\MakeUpClassController.php',
      7 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\PayrollController.php',
      8 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\PayrollReceiptController.php',
      9 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\PayslipController.php',
      10 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ReportController.php',
      11 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ScheduleController.php',
      12 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\UserController.php',
      13 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Attendance.php',
      14 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\AttendanceLog.php',
      15 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Department.php',
      16 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Employee.php',
      17 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeBenefit.php',
      18 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeClearance.php',
      19 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeRequirement.php',
      20 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Loan.php',
      21 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\LoanPayment.php',
      22 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\MakeUpClass.php',
      23 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\PayrollPeriod.php',
      24 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\PayrollReceipt.php',
      25 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Payslip.php',
      26 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Position.php',
      27 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\TeachingSchedule.php',
      28 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\User.php',
      29 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\WorkSchedule.php',
      30 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\ArchiveService.php',
      31 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\AttendanceService.php',
      32 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\BiometricService.php',
      33 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\PayrollService.php',
      34 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\ReportService.php',
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\PayrollPeriod.php' => 
  array (
    'fileHash' => 'fb90c75abaf60dce4a2df304fc0e60e0cc83a0de15d068155ea04db6681b46d1',
    'dependentFiles' => 
    array (
      0 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\DashboardController.php',
      1 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\PayrollController.php',
      2 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\PayslipController.php',
      3 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ReportController.php',
      4 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Employee.php',
      5 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\LoanPayment.php',
      6 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Payroll.php',
      7 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\PayrollReceipt.php',
      8 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Payslip.php',
      9 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\ArchiveService.php',
      10 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\PayrollService.php',
      11 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\ReportService.php',
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\PayrollReceipt.php' => 
  array (
    'fileHash' => 'e19dedda4f62373d5521504fbfd63cf1700ae49e5987447113e6907ef22542f1',
    'dependentFiles' => 
    array (
      0 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\AttendanceController.php',
      1 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\BiometricController.php',
      2 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ClearanceController.php',
      3 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\DashboardController.php',
      4 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\EmployeeController.php',
      5 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\EmployeeSelfServiceController.php',
      6 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\MakeUpClassController.php',
      7 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\PayrollController.php',
      8 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\PayrollReceiptController.php',
      9 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\PayslipController.php',
      10 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ScheduleController.php',
      11 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\UserController.php',
      12 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Attendance.php',
      13 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\AttendanceLog.php',
      14 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Department.php',
      15 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Employee.php',
      16 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeBenefit.php',
      17 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeClearance.php',
      18 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeRequirement.php',
      19 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Loan.php',
      20 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\LoanPayment.php',
      21 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\MakeUpClass.php',
      22 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Payroll.php',
      23 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\PayrollPeriod.php',
      24 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Payslip.php',
      25 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Position.php',
      26 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\TeachingSchedule.php',
      27 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\User.php',
      28 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\WorkSchedule.php',
      29 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\ArchiveService.php',
      30 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\AttendanceService.php',
      31 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\BiometricService.php',
      32 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\PayrollService.php',
      33 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\ReportService.php',
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Payslip.php' => 
  array (
    'fileHash' => 'ef76e70b4445c8cb0f88d2ef4d222ebc74742fe232962c1d74cfd01bcfa82b27',
    'dependentFiles' => 
    array (
      0 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\AttendanceController.php',
      1 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\BiometricController.php',
      2 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ClearanceController.php',
      3 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\DashboardController.php',
      4 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\EmployeeController.php',
      5 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\EmployeeSelfServiceController.php',
      6 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\MakeUpClassController.php',
      7 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\PayrollController.php',
      8 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\PayslipController.php',
      9 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ScheduleController.php',
      10 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\UserController.php',
      11 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Attendance.php',
      12 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\AttendanceLog.php',
      13 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Department.php',
      14 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Employee.php',
      15 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeBenefit.php',
      16 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeClearance.php',
      17 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeRequirement.php',
      18 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Loan.php',
      19 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\LoanPayment.php',
      20 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\MakeUpClass.php',
      21 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Payroll.php',
      22 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\PayrollPeriod.php',
      23 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\PayrollReceipt.php',
      24 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Position.php',
      25 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\TeachingSchedule.php',
      26 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\User.php',
      27 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\WorkSchedule.php',
      28 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\ArchiveService.php',
      29 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\AttendanceService.php',
      30 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\BiometricService.php',
      31 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\PayrollService.php',
      32 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\ReportService.php',
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Position.php' => 
  array (
    'fileHash' => 'd0aa17423f96cd25bed30fa380ffc581810ccfba2358be500ed05f9c111d2c88',
    'dependentFiles' => 
    array (
      0 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\AttendanceController.php',
      1 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\BiometricController.php',
      2 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ClearanceController.php',
      3 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\DashboardController.php',
      4 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\DepartmentController.php',
      5 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\EmployeeController.php',
      6 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\EmployeeSelfServiceController.php',
      7 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\MakeUpClassController.php',
      8 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\PayslipController.php',
      9 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ScheduleController.php',
      10 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\UserController.php',
      11 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Attendance.php',
      12 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\AttendanceLog.php',
      13 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Department.php',
      14 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Employee.php',
      15 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeBenefit.php',
      16 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeClearance.php',
      17 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeRequirement.php',
      18 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Loan.php',
      19 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\MakeUpClass.php',
      20 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Payroll.php',
      21 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\PayrollReceipt.php',
      22 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Payslip.php',
      23 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\TeachingSchedule.php',
      24 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\User.php',
      25 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\WorkSchedule.php',
      26 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\AttendanceService.php',
      27 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\BiometricService.php',
      28 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\PayrollService.php',
      29 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\ReportService.php',
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Requirement.php' => 
  array (
    'fileHash' => '5dccb016c1093ffb5dc70e83a0b0b2a34a2c0019bf3d18345ca2f4873ac96ea5',
    'dependentFiles' => 
    array (
      0 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\EmployeeSelfServiceController.php',
      1 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\RequirementController.php',
      2 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Employee.php',
      3 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeRequirement.php',
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Room.php' => 
  array (
    'fileHash' => '8484a5d4db7b18441deebe19d4e17caef1739d3b25e7be0c812e3fc9eb7540c2',
    'dependentFiles' => 
    array (
      0 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\EmployeeSelfServiceController.php',
      1 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\MasterDataController.php',
      2 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ScheduleController.php',
      3 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Employee.php',
      4 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Subject.php',
      5 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\TeachingSchedule.php',
      6 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\WorkSchedule.php',
      7 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\AttendanceService.php',
      8 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\ReportService.php',
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\SchoolYear.php' => 
  array (
    'fileHash' => '25c6c540afecf18b917d3bfebb18a8cae2aadbf411ae190318dada2480bc2e8c',
    'dependentFiles' => 
    array (
      0 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\EmployeeSelfServiceController.php',
      1 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\MasterDataController.php',
      2 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ScheduleController.php',
      3 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Employee.php',
      4 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Semester.php',
      5 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Subject.php',
      6 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\TeachingSchedule.php',
      7 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\WorkSchedule.php',
      8 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\AttendanceService.php',
      9 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\ReportService.php',
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Semester.php' => 
  array (
    'fileHash' => 'e2027b9d528a968567bffbe202976bffcc47da9f9b9ea35e64e0938fb4dbd6fe',
    'dependentFiles' => 
    array (
      0 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\EmployeeSelfServiceController.php',
      1 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\MasterDataController.php',
      2 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ScheduleController.php',
      3 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Employee.php',
      4 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\SchoolYear.php',
      5 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Subject.php',
      6 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\TeachingSchedule.php',
      7 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\WorkSchedule.php',
      8 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\AttendanceService.php',
      9 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\ReportService.php',
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Setting.php' => 
  array (
    'fileHash' => 'b0038e28a85ab22c91139b6659b154167b3c92226925ca2626d64dcd663f0a41',
    'dependentFiles' => 
    array (
      0 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\EmployeeSelfServiceController.php',
      1 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\PayrollController.php',
      2 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\PayrollReceiptController.php',
      3 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\PayslipController.php',
      4 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\SettingsController.php',
      5 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\AttendanceService.php',
      6 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\PayrollService.php',
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Subject.php' => 
  array (
    'fileHash' => 'e67e7e09338319400e5ba498cf774585e9d71c79c8924ee38d588d19b99a537f',
    'dependentFiles' => 
    array (
      0 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\DashboardController.php',
      1 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\EmployeeSelfServiceController.php',
      2 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\MakeUpClassController.php',
      3 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\MasterDataController.php',
      4 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ScheduleController.php',
      5 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Employee.php',
      6 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\MakeUpClass.php',
      7 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\TeachingSchedule.php',
      8 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\WorkSchedule.php',
      9 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\ArchiveService.php',
      10 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\AttendanceService.php',
      11 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\PayrollService.php',
      12 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\ReportService.php',
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\TeachingSchedule.php' => 
  array (
    'fileHash' => '8dac10ac221d8df242c6d6b6a16bb4db055af848d3602a16682f7ecb6879f344',
    'dependentFiles' => 
    array (
      0 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\AttendanceController.php',
      1 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\BiometricController.php',
      2 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ClearanceController.php',
      3 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\DashboardController.php',
      4 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\EmployeeController.php',
      5 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\EmployeeSelfServiceController.php',
      6 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\MakeUpClassController.php',
      7 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\MasterDataController.php',
      8 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\PayslipController.php',
      9 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ScheduleController.php',
      10 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\UserController.php',
      11 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Attendance.php',
      12 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\AttendanceLog.php',
      13 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Department.php',
      14 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Employee.php',
      15 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeBenefit.php',
      16 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeClearance.php',
      17 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeRequirement.php',
      18 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Loan.php',
      19 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\MakeUpClass.php',
      20 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Payroll.php',
      21 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\PayrollReceipt.php',
      22 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Payslip.php',
      23 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Position.php',
      24 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Subject.php',
      25 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\User.php',
      26 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\WorkSchedule.php',
      27 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\AttendanceService.php',
      28 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\BiometricService.php',
      29 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\PayrollService.php',
      30 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\ReportService.php',
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\User.php' => 
  array (
    'fileHash' => '39507b18293560fdd7b9e489369a44f8f901b7ae20ef02cb45d5bac3b0ad93aa',
    'dependentFiles' => 
    array (
      0 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ArchiveController.php',
      1 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\AttendanceController.php',
      2 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\ConfirmablePasswordController.php',
      3 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\EmailVerificationNotificationController.php',
      4 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\EmailVerificationPromptController.php',
      5 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\NewPasswordController.php',
      6 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\PasswordController.php',
      7 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\RegisteredUserController.php',
      8 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\VerifyEmailController.php',
      9 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\BenefitLoanController.php',
      10 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\BiometricController.php',
      11 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ClearanceController.php',
      12 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\DashboardController.php',
      13 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\DepartmentController.php',
      14 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\EmployeeController.php',
      15 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\EmployeeSelfServiceController.php',
      16 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\MakeUpClassController.php',
      17 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\NotificationController.php',
      18 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\PayrollController.php',
      19 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\PayrollReceiptController.php',
      20 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\PayslipController.php',
      21 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ProfileController.php',
      22 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ReportController.php',
      23 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\RequirementController.php',
      24 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ScheduleController.php',
      25 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\UserController.php',
      26 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Middleware\\RoleMiddleware.php',
      27 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Requests\\ProfileUpdateRequest.php',
      28 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Archive.php',
      29 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Attendance.php',
      30 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\AttendanceLog.php',
      31 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Clearance.php',
      32 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Department.php',
      33 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Employee.php',
      34 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeBenefit.php',
      35 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeClearance.php',
      36 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeRequirement.php',
      37 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Loan.php',
      38 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\LoanPayment.php',
      39 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\MakeUpClass.php',
      40 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Notification.php',
      41 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Payroll.php',
      42 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\PayrollPeriod.php',
      43 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\PayrollReceipt.php',
      44 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Payslip.php',
      45 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Position.php',
      46 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Requirement.php',
      47 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\TeachingSchedule.php',
      48 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\WorkSchedule.php',
      49 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\ArchiveService.php',
      50 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\AttendanceService.php',
      51 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\BiometricService.php',
      52 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\PayrollService.php',
      53 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\ReportService.php',
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\WorkSchedule.php' => 
  array (
    'fileHash' => '26832de9df0a7db429e9b16e94a253610d2bd8e2069d4f31f9d0b6798ddb03fc',
    'dependentFiles' => 
    array (
      0 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\AttendanceController.php',
      1 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\BiometricController.php',
      2 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ClearanceController.php',
      3 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\DashboardController.php',
      4 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\EmployeeController.php',
      5 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\EmployeeSelfServiceController.php',
      6 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\MakeUpClassController.php',
      7 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\PayslipController.php',
      8 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ScheduleController.php',
      9 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\UserController.php',
      10 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Attendance.php',
      11 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\AttendanceLog.php',
      12 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Department.php',
      13 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Employee.php',
      14 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeBenefit.php',
      15 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeClearance.php',
      16 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeRequirement.php',
      17 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Loan.php',
      18 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\MakeUpClass.php',
      19 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Payroll.php',
      20 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\PayrollReceipt.php',
      21 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Payslip.php',
      22 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Position.php',
      23 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\TeachingSchedule.php',
      24 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\User.php',
      25 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\AttendanceService.php',
      26 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\BiometricService.php',
      27 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\PayrollService.php',
      28 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\ReportService.php',
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Providers\\AppServiceProvider.php' => 
  array (
    'fileHash' => 'caf306ef6a25a547bbb7edd5508a39b51c365083eb6dd58378cf2242018e94c7',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\ArchiveService.php' => 
  array (
    'fileHash' => 'e71b4274f73d1b72a7a65179f2adb3456637464e3b0d0f7cd5137c02fa7b2438',
    'dependentFiles' => 
    array (
      0 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ArchiveController.php',
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\AttendanceService.php' => 
  array (
    'fileHash' => 'bc5a98861725d0a0cc45da090c4299baee11cde3f72860c54a17338e65c647f1',
    'dependentFiles' => 
    array (
      0 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Console\\Commands\\ProcessAttendanceCommand.php',
      1 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\AttendanceController.php',
      2 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\BiometricController.php',
      3 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\DashboardController.php',
      4 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\BiometricService.php',
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\BiometricService.php' => 
  array (
    'fileHash' => 'fbd03c65c1b879d6854aa5ab605e5db3e4be22f0b9473a0b9c424faa1bb02ff9',
    'dependentFiles' => 
    array (
      0 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Console\\Commands\\SyncBiometricCommand.php',
      1 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\BiometricController.php',
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\PayrollService.php' => 
  array (
    'fileHash' => '2b3fb600e82da1cec04b3100630818a44339fe3a6e2b759d709c120da1d153d3',
    'dependentFiles' => 
    array (
      0 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\PayrollController.php',
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\ReportService.php' => 
  array (
    'fileHash' => '7642283c3c7809693a2afbfd0d90e245b6c94ff53dea0903762a0fdd79631942',
    'dependentFiles' => 
    array (
      0 => 'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ReportController.php',
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\View\\Components\\AppLayout.php' => 
  array (
    'fileHash' => '9450639575a866758b257916f0dca37da5da34f7d798c46f8cf3bd85166b58ef',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\View\\Components\\GuestLayout.php' => 
  array (
    'fileHash' => '35663740cd39dc5f726b24e402babb41d0af62e09567c0e717235586fa3d9f80',
    'dependentFiles' => 
    array (
    ),
  ),
),
	'packageDependencies' => array (
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Exports\\GenericExport.php' => 
  array (
    0 => 'maatwebsite/excel',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\AuthenticatedSessionController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\PasswordController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\RegisteredUserController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\BenefitLoanController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
    2 => 'nesbot/carbon',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\BiometricController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
    2 => 'nesbot/carbon',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\EmployeeSelfServiceController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
    2 => 'barryvdh/laravel-dompdf',
    3 => 'dompdf/dompdf',
    4 => 'nesbot/carbon',
    5 => 'league/flysystem',
    6 => 'psr/http-message',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\MasterDataController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Requests\\Auth\\LoginRequest.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Benefit.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Department.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeClearance.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\MakeUpClass.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Notification.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\SchoolYear.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Subject.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\PayrollService.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'nesbot/carbon',
    2 => 'symfony/http-foundation',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\ReportService.php' => 
  array (
    0 => 'nesbot/carbon',
    1 => 'laravel/framework',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\View\\Components\\AppLayout.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Console\\Commands\\SyncBiometricCommand.php' => 
  array (
    0 => 'symfony/console',
    1 => 'laravel/framework',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\AttendanceController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
    2 => 'nesbot/carbon',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\ConfirmablePasswordController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\EmailVerificationPromptController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\NewPasswordController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Controller.php' => 
  array (
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\PayrollController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
    2 => 'nesbot/carbon',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\PayrollReceiptController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
    2 => 'nesbot/carbon',
    3 => 'barryvdh/laravel-dompdf',
    4 => 'dompdf/dompdf',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ProfileController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
    2 => 'nesbot/carbon',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ReportController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
    2 => 'nesbot/carbon',
    3 => 'maatwebsite/excel',
    4 => 'barryvdh/laravel-dompdf',
    5 => 'dompdf/dompdf',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\RequirementController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
    2 => 'nesbot/carbon',
    3 => 'league/flysystem',
    4 => 'psr/http-message',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ScheduleController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Middleware\\RoleMiddleware.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Payroll.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\PayrollPeriod.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\PayrollReceipt.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Requirement.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Setting.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\WorkSchedule.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\PasswordResetLinkController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ClearanceController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
    2 => 'nesbot/carbon',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\DepartmentController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\MakeUpClassController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
    2 => 'nesbot/carbon',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\NotificationController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'nesbot/carbon',
    2 => 'symfony/http-foundation',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Requests\\ProfileUpdateRequest.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Attendance.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\BiometricDevice.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeBenefit.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeRequirement.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Loan.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Payslip.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Position.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Room.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Semester.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Providers\\AppServiceProvider.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\AttendanceService.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'nesbot/carbon',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\BiometricService.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'psr/log',
    2 => 'monolog/monolog',
    3 => 'nesbot/carbon',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Console\\Commands\\ProcessAttendanceCommand.php' => 
  array (
    0 => 'symfony/console',
    1 => 'laravel/framework',
    2 => 'nesbot/carbon',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ArchiveController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\EmailVerificationNotificationController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\VerifyEmailController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\DashboardController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
    2 => 'nesbot/carbon',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\EmployeeController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\PayslipController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
    2 => 'barryvdh/laravel-dompdf',
    3 => 'dompdf/dompdf',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\SettingsController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\UserController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Archive.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\AttendanceLog.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Clearance.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Employee.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\LoanPayment.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\TeachingSchedule.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\User.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\ArchiveService.php' => 
  array (
    0 => 'nesbot/carbon',
    1 => 'laravel/framework',
    2 => 'symfony/http-foundation',
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\View\\Components\\GuestLayout.php' => 
  array (
    0 => 'laravel/framework',
  ),
),
	'exportedNodesCallback' => static function (): array { return array (
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Console\\Commands\\ProcessAttendanceCommand.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Console\\Commands\\ProcessAttendanceCommand',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Console\\Command',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'signature',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'description',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'handle',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'int',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'service',
               'type' => 'App\\Services\\AttendanceService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Console\\Commands\\SyncBiometricCommand.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Console\\Commands\\SyncBiometricCommand',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Console\\Command',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'signature',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'description',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'handle',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'int',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'service',
               'type' => 'App\\Services\\BiometricService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Exports\\GenericExport.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Exports\\GenericExport',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
        0 => 'Maatwebsite\\Excel\\Concerns\\FromArray',
        1 => 'Maatwebsite\\Excel\\Concerns\\WithHeadings',
        2 => 'Maatwebsite\\Excel\\Concerns\\WithTitle',
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'data',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 4,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'headings',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 4,
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'sheet',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 4,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'array',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'headings',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'title',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ArchiveController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\ArchiveController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'run',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'service',
               'type' => 'App\\Services\\ArchiveService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'destroy',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'archive',
               'type' => 'App\\Models\\Archive',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\AttendanceController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\AttendanceController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'service',
               'type' => 'App\\Services\\AttendanceService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'edit',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'attendance',
               'type' => 'App\\Models\\Attendance',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'update',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'attendance',
               'type' => 'App\\Models\\Attendance',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'storePunch',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Manual punch registration for a specific employee.
     */',
             'namespace' => 'App\\Http\\Controllers',
             'uses' => 
            array (
              'attendance' => 'App\\Models\\Attendance',
              'biometricdevice' => 'App\\Models\\BiometricDevice',
              'department' => 'App\\Models\\Department',
              'employee' => 'App\\Models\\Employee',
              'attendanceservice' => 'App\\Services\\AttendanceService',
              'carbon' => 'Carbon\\Carbon',
              'request' => 'Illuminate\\Http\\Request',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'service',
               'type' => 'App\\Services\\AttendanceService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'processRange',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Process / backfill a range of dates for all employees.
     */',
             'namespace' => 'App\\Http\\Controllers',
             'uses' => 
            array (
              'attendance' => 'App\\Models\\Attendance',
              'biometricdevice' => 'App\\Models\\BiometricDevice',
              'department' => 'App\\Models\\Department',
              'employee' => 'App\\Models\\Employee',
              'attendanceservice' => 'App\\Services\\AttendanceService',
              'carbon' => 'Carbon\\Carbon',
              'request' => 'Illuminate\\Http\\Request',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'service',
               'type' => 'App\\Services\\AttendanceService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\AuthenticatedSessionController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Auth\\AuthenticatedSessionController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'create',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Display the login view.
     */',
             'namespace' => 'App\\Http\\Controllers\\Auth',
             'uses' => 
            array (
              'controller' => 'App\\Http\\Controllers\\Controller',
              'loginrequest' => 'App\\Http\\Requests\\Auth\\LoginRequest',
              'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
              'request' => 'Illuminate\\Http\\Request',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
              'view' => 'Illuminate\\View\\View',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\View\\View',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'store',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Handle an incoming authentication request.
     */',
             'namespace' => 'App\\Http\\Controllers\\Auth',
             'uses' => 
            array (
              'controller' => 'App\\Http\\Controllers\\Controller',
              'loginrequest' => 'App\\Http\\Requests\\Auth\\LoginRequest',
              'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
              'request' => 'Illuminate\\Http\\Request',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
              'view' => 'Illuminate\\View\\View',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'App\\Http\\Requests\\Auth\\LoginRequest',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'destroy',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Destroy an authenticated session.
     */',
             'namespace' => 'App\\Http\\Controllers\\Auth',
             'uses' => 
            array (
              'controller' => 'App\\Http\\Controllers\\Controller',
              'loginrequest' => 'App\\Http\\Requests\\Auth\\LoginRequest',
              'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
              'request' => 'Illuminate\\Http\\Request',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
              'view' => 'Illuminate\\View\\View',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\ConfirmablePasswordController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Auth\\ConfirmablePasswordController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'show',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Show the confirm password view.
     */',
             'namespace' => 'App\\Http\\Controllers\\Auth',
             'uses' => 
            array (
              'controller' => 'App\\Http\\Controllers\\Controller',
              'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
              'request' => 'Illuminate\\Http\\Request',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
              'validationexception' => 'Illuminate\\Validation\\ValidationException',
              'view' => 'Illuminate\\View\\View',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\View\\View',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'store',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Confirm the user\'s password.
     */',
             'namespace' => 'App\\Http\\Controllers\\Auth',
             'uses' => 
            array (
              'controller' => 'App\\Http\\Controllers\\Controller',
              'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
              'request' => 'Illuminate\\Http\\Request',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
              'validationexception' => 'Illuminate\\Validation\\ValidationException',
              'view' => 'Illuminate\\View\\View',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\EmailVerificationNotificationController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Auth\\EmailVerificationNotificationController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'store',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Send a new email verification notification.
     */',
             'namespace' => 'App\\Http\\Controllers\\Auth',
             'uses' => 
            array (
              'controller' => 'App\\Http\\Controllers\\Controller',
              'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
              'request' => 'Illuminate\\Http\\Request',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\EmailVerificationPromptController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Auth\\EmailVerificationPromptController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__invoke',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Display the email verification prompt.
     */',
             'namespace' => 'App\\Http\\Controllers\\Auth',
             'uses' => 
            array (
              'controller' => 'App\\Http\\Controllers\\Controller',
              'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
              'request' => 'Illuminate\\Http\\Request',
              'view' => 'Illuminate\\View\\View',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse|Illuminate\\View\\View',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\NewPasswordController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Auth\\NewPasswordController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'create',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Display the password reset view.
     */',
             'namespace' => 'App\\Http\\Controllers\\Auth',
             'uses' => 
            array (
              'controller' => 'App\\Http\\Controllers\\Controller',
              'user' => 'App\\Models\\User',
              'passwordreset' => 'Illuminate\\Auth\\Events\\PasswordReset',
              'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
              'request' => 'Illuminate\\Http\\Request',
              'hash' => 'Illuminate\\Support\\Facades\\Hash',
              'password' => 'Illuminate\\Support\\Facades\\Password',
              'str' => 'Illuminate\\Support\\Str',
              'rules' => 'Illuminate\\Validation\\Rules',
              'validationexception' => 'Illuminate\\Validation\\ValidationException',
              'view' => 'Illuminate\\View\\View',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\View\\View',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'store',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Handle an incoming new password request.
     *
     * @throws ValidationException
     */',
             'namespace' => 'App\\Http\\Controllers\\Auth',
             'uses' => 
            array (
              'controller' => 'App\\Http\\Controllers\\Controller',
              'user' => 'App\\Models\\User',
              'passwordreset' => 'Illuminate\\Auth\\Events\\PasswordReset',
              'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
              'request' => 'Illuminate\\Http\\Request',
              'hash' => 'Illuminate\\Support\\Facades\\Hash',
              'password' => 'Illuminate\\Support\\Facades\\Password',
              'str' => 'Illuminate\\Support\\Str',
              'rules' => 'Illuminate\\Validation\\Rules',
              'validationexception' => 'Illuminate\\Validation\\ValidationException',
              'view' => 'Illuminate\\View\\View',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\PasswordController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Auth\\PasswordController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'update',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Update the user\'s password.
     */',
             'namespace' => 'App\\Http\\Controllers\\Auth',
             'uses' => 
            array (
              'controller' => 'App\\Http\\Controllers\\Controller',
              'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
              'request' => 'Illuminate\\Http\\Request',
              'hash' => 'Illuminate\\Support\\Facades\\Hash',
              'password' => 'Illuminate\\Validation\\Rules\\Password',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\PasswordResetLinkController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Auth\\PasswordResetLinkController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'create',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Display the password reset link request view.
     */',
             'namespace' => 'App\\Http\\Controllers\\Auth',
             'uses' => 
            array (
              'controller' => 'App\\Http\\Controllers\\Controller',
              'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
              'request' => 'Illuminate\\Http\\Request',
              'password' => 'Illuminate\\Support\\Facades\\Password',
              'validationexception' => 'Illuminate\\Validation\\ValidationException',
              'view' => 'Illuminate\\View\\View',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\View\\View',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'store',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Handle an incoming password reset link request.
     *
     * @throws ValidationException
     */',
             'namespace' => 'App\\Http\\Controllers\\Auth',
             'uses' => 
            array (
              'controller' => 'App\\Http\\Controllers\\Controller',
              'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
              'request' => 'Illuminate\\Http\\Request',
              'password' => 'Illuminate\\Support\\Facades\\Password',
              'validationexception' => 'Illuminate\\Validation\\ValidationException',
              'view' => 'Illuminate\\View\\View',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\RegisteredUserController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Auth\\RegisteredUserController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'create',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Display the registration view.
     */',
             'namespace' => 'App\\Http\\Controllers\\Auth',
             'uses' => 
            array (
              'controller' => 'App\\Http\\Controllers\\Controller',
              'user' => 'App\\Models\\User',
              'registered' => 'Illuminate\\Auth\\Events\\Registered',
              'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
              'request' => 'Illuminate\\Http\\Request',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
              'hash' => 'Illuminate\\Support\\Facades\\Hash',
              'rules' => 'Illuminate\\Validation\\Rules',
              'validationexception' => 'Illuminate\\Validation\\ValidationException',
              'view' => 'Illuminate\\View\\View',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\View\\View',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'store',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */',
             'namespace' => 'App\\Http\\Controllers\\Auth',
             'uses' => 
            array (
              'controller' => 'App\\Http\\Controllers\\Controller',
              'user' => 'App\\Models\\User',
              'registered' => 'Illuminate\\Auth\\Events\\Registered',
              'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
              'request' => 'Illuminate\\Http\\Request',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
              'hash' => 'Illuminate\\Support\\Facades\\Hash',
              'rules' => 'Illuminate\\Validation\\Rules',
              'validationexception' => 'Illuminate\\Validation\\ValidationException',
              'view' => 'Illuminate\\View\\View',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Auth\\VerifyEmailController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Auth\\VerifyEmailController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__invoke',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Mark the authenticated user\'s email address as verified.
     */',
             'namespace' => 'App\\Http\\Controllers\\Auth',
             'uses' => 
            array (
              'controller' => 'App\\Http\\Controllers\\Controller',
              'verified' => 'Illuminate\\Auth\\Events\\Verified',
              'emailverificationrequest' => 'Illuminate\\Foundation\\Auth\\EmailVerificationRequest',
              'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Foundation\\Auth\\EmailVerificationRequest',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\BenefitLoanController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\BenefitLoanController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'benefits',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'storeBenefit',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'destroyBenefit',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'benefit',
               'type' => 'App\\Models\\Benefit',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'assignBenefit',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'revokeBenefit',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'employeeBenefit',
               'type' => 'App\\Models\\EmployeeBenefit',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'loans',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'storeLoan',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'updateLoan',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'loan',
               'type' => 'App\\Models\\Loan',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\BiometricController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\BiometricController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'store',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'sync',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'device',
               'type' => 'App\\Models\\BiometricDevice',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'service',
               'type' => 'App\\Services\\BiometricService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'testConnection',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'device',
               'type' => 'App\\Models\\BiometricDevice',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'service',
               'type' => 'App\\Services\\BiometricService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'destroy',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'device',
               'type' => 'App\\Models\\BiometricDevice',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'punches',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Manual punch form.
     */',
             'namespace' => 'App\\Http\\Controllers',
             'uses' => 
            array (
              'biometricdevice' => 'App\\Models\\BiometricDevice',
              'employee' => 'App\\Models\\Employee',
              'attendanceservice' => 'App\\Services\\AttendanceService',
              'biometricservice' => 'App\\Services\\BiometricService',
              'carbon' => 'Carbon\\Carbon',
              'request' => 'Illuminate\\Http\\Request',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'storePunch',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'service',
               'type' => 'App\\Services\\AttendanceService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'apiPush',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Device push endpoint (used by the local sync agent on LAN).
     */',
             'namespace' => 'App\\Http\\Controllers',
             'uses' => 
            array (
              'biometricdevice' => 'App\\Models\\BiometricDevice',
              'employee' => 'App\\Models\\Employee',
              'attendanceservice' => 'App\\Services\\AttendanceService',
              'biometricservice' => 'App\\Services\\BiometricService',
              'carbon' => 'Carbon\\Carbon',
              'request' => 'Illuminate\\Http\\Request',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ClearanceController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\ClearanceController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'toggleClearance',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'bulkSync',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\Controller.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Controller',
       'phpDoc' => NULL,
       'abstract' => true,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\DashboardController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\DashboardController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__invoke',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'attendanceService',
               'type' => 'App\\Services\\AttendanceService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\DepartmentController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\DepartmentController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'store',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'update',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'department',
               'type' => 'App\\Models\\Department',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'destroy',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'department',
               'type' => 'App\\Models\\Department',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'storePosition',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'destroyPosition',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'position',
               'type' => 'App\\Models\\Position',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\EmployeeController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\EmployeeController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'create',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'store',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'show',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'employee',
               'type' => 'App\\Models\\Employee',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'edit',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'employee',
               'type' => 'App\\Models\\Employee',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'update',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'employee',
               'type' => 'App\\Models\\Employee',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'destroy',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'employee',
               'type' => 'App\\Models\\Employee',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'reactivate',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'employee',
               'type' => 'App\\Models\\Employee',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\EmployeeSelfServiceController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\EmployeeSelfServiceController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'attendance',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'schedule',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'payslips',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'payslipDownload',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'payslip',
               'type' => 'App\\Models\\Payslip',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'receipts',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'receiptDownload',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'receipt',
               'type' => 'App\\Models\\PayrollReceipt',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'receiptSign',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'receipt',
               'type' => 'App\\Models\\PayrollReceipt',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'history',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'requirements',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        9 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'submitRequirement',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        10 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'requirementDownload',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'employeeRequirement',
               'type' => 'App\\Models\\EmployeeRequirement',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\MakeUpClassController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\MakeUpClassController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'store',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'approve',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'makeUpClass',
               'type' => 'App\\Models\\MakeUpClass',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'reject',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'makeUpClass',
               'type' => 'App\\Models\\MakeUpClass',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\MasterDataController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\MasterDataController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'storeSubject',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'storeRoom',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'storeSchoolYear',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'activateSchoolYear',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'schoolYear',
               'type' => 'App\\Models\\SchoolYear',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'storeSemester',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'activateSemester',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'semester',
               'type' => 'App\\Models\\Semester',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\NotificationController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\NotificationController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'markRead',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'notification',
               'type' => 'App\\Models\\Notification',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'markAll',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\PayrollController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\PayrollController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'show',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'period',
               'type' => 'App\\Models\\PayrollPeriod',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'create',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'store',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'service',
               'type' => 'App\\Services\\PayrollService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'regenerate',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'period',
               'type' => 'App\\Models\\PayrollPeriod',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'service',
               'type' => 'App\\Services\\PayrollService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'release',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'payroll',
               'type' => 'App\\Models\\Payroll',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'service',
               'type' => 'App\\Services\\PayrollService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'showLine',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'payroll',
               'type' => 'App\\Models\\Payroll',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'updateLine',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'payroll',
               'type' => 'App\\Models\\Payroll',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'destroy',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'period',
               'type' => 'App\\Models\\PayrollPeriod',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\PayrollReceiptController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\PayrollReceiptController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'sign',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'receipt',
               'type' => 'App\\Models\\PayrollReceipt',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'signHr',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'receipt',
               'type' => 'App\\Models\\PayrollReceipt',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'print',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'receipt',
               'type' => 'App\\Models\\PayrollReceipt',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\PayslipController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\PayslipController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'show',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'payslip',
               'type' => 'App\\Models\\Payslip',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'download',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'payslip',
               'type' => 'App\\Models\\Payslip',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ProfileController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\ProfileController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'edit',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Display the user\'s profile form.
     */',
             'namespace' => 'App\\Http\\Controllers',
             'uses' => 
            array (
              'profileupdaterequest' => 'App\\Http\\Requests\\ProfileUpdateRequest',
              'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
              'request' => 'Illuminate\\Http\\Request',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
              'redirect' => 'Illuminate\\Support\\Facades\\Redirect',
              'view' => 'Illuminate\\View\\View',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\View\\View',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'update',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Update the user\'s profile information.
     */',
             'namespace' => 'App\\Http\\Controllers',
             'uses' => 
            array (
              'profileupdaterequest' => 'App\\Http\\Requests\\ProfileUpdateRequest',
              'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
              'request' => 'Illuminate\\Http\\Request',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
              'redirect' => 'Illuminate\\Support\\Facades\\Redirect',
              'view' => 'Illuminate\\View\\View',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'App\\Http\\Requests\\ProfileUpdateRequest',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'destroy',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Delete the user\'s account.
     */',
             'namespace' => 'App\\Http\\Controllers',
             'uses' => 
            array (
              'profileupdaterequest' => 'App\\Http\\Requests\\ProfileUpdateRequest',
              'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
              'request' => 'Illuminate\\Http\\Request',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
              'redirect' => 'Illuminate\\Support\\Facades\\Redirect',
              'view' => 'Illuminate\\View\\View',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ReportController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\ReportController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'show',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'export',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\RequirementController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\RequirementController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'storeRequirementType',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'upload',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'verify',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'employeeRequirement',
               'type' => 'App\\Models\\EmployeeRequirement',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'download',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'employeeRequirement',
               'type' => 'App\\Models\\EmployeeRequirement',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\ScheduleController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\ScheduleController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'storeTeaching',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'destroyTeaching',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'schedule',
               'type' => 'App\\Models\\TeachingSchedule',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'storeWork',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'destroyWork',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'schedule',
               'type' => 'App\\Models\\WorkSchedule',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\SettingsController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\SettingsController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'payroll',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'savePayroll',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'updateKey',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'key',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Controllers\\UserController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\UserController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'create',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'store',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'edit',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'update',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'toggle',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'destroy',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'employees',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Middleware\\RoleMiddleware.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Middleware\\RoleMiddleware',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'handle',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Symfony\\Component\\HttpFoundation\\Response',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'next',
               'type' => 'Closure',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'roles',
               'type' => 'string',
               'byRef' => false,
               'variadic' => true,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Requests\\Auth\\LoginRequest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Requests\\Auth\\LoginRequest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Foundation\\Http\\FormRequest',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'authorize',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Determine if the user is authorized to make this request.
     */',
             'namespace' => 'App\\Http\\Requests\\Auth',
             'uses' => 
            array (
              'lockout' => 'Illuminate\\Auth\\Events\\Lockout',
              'validationrule' => 'Illuminate\\Contracts\\Validation\\ValidationRule',
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
              'ratelimiter' => 'Illuminate\\Support\\Facades\\RateLimiter',
              'str' => 'Illuminate\\Support\\Str',
              'validationexception' => 'Illuminate\\Validation\\ValidationException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'rules',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */',
             'namespace' => 'App\\Http\\Requests\\Auth',
             'uses' => 
            array (
              'lockout' => 'Illuminate\\Auth\\Events\\Lockout',
              'validationrule' => 'Illuminate\\Contracts\\Validation\\ValidationRule',
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
              'ratelimiter' => 'Illuminate\\Support\\Facades\\RateLimiter',
              'str' => 'Illuminate\\Support\\Str',
              'validationexception' => 'Illuminate\\Validation\\ValidationException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'authenticate',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Attempt to authenticate the request\'s credentials.
     *
     * @throws ValidationException
     */',
             'namespace' => 'App\\Http\\Requests\\Auth',
             'uses' => 
            array (
              'lockout' => 'Illuminate\\Auth\\Events\\Lockout',
              'validationrule' => 'Illuminate\\Contracts\\Validation\\ValidationRule',
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
              'ratelimiter' => 'Illuminate\\Support\\Facades\\RateLimiter',
              'str' => 'Illuminate\\Support\\Str',
              'validationexception' => 'Illuminate\\Validation\\ValidationException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'ensureIsNotRateLimited',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Ensure the login request is not rate limited.
     *
     * @throws ValidationException
     */',
             'namespace' => 'App\\Http\\Requests\\Auth',
             'uses' => 
            array (
              'lockout' => 'Illuminate\\Auth\\Events\\Lockout',
              'validationrule' => 'Illuminate\\Contracts\\Validation\\ValidationRule',
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
              'ratelimiter' => 'Illuminate\\Support\\Facades\\RateLimiter',
              'str' => 'Illuminate\\Support\\Str',
              'validationexception' => 'Illuminate\\Validation\\ValidationException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'throttleKey',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the rate limiting throttle key for the request.
     */',
             'namespace' => 'App\\Http\\Requests\\Auth',
             'uses' => 
            array (
              'lockout' => 'Illuminate\\Auth\\Events\\Lockout',
              'validationrule' => 'Illuminate\\Contracts\\Validation\\ValidationRule',
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
              'ratelimiter' => 'Illuminate\\Support\\Facades\\RateLimiter',
              'str' => 'Illuminate\\Support\\Str',
              'validationexception' => 'Illuminate\\Validation\\ValidationException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Http\\Requests\\ProfileUpdateRequest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Requests\\ProfileUpdateRequest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Foundation\\Http\\FormRequest',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'rules',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */',
             'namespace' => 'App\\Http\\Requests',
             'uses' => 
            array (
              'user' => 'App\\Models\\User',
              'validationrule' => 'Illuminate\\Contracts\\Validation\\ValidationRule',
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
              'rule' => 'Illuminate\\Validation\\Rule',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Archive.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\Archive',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
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
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'carbon' => 'Illuminate\\Support\\Carbon',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'timestamps',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => true,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'casts',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'archiver',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Attendance.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\Attendance',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
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
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'carbon' => 'Illuminate\\Support\\Carbon',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'casts',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedClassConstantsNode::__set_state(array(
           'constants' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedClassConstantNode::__set_state(array(
               'name' => 'PRESENT',
               'value' => '\'present\'',
               'attributes' => 
              array (
              ),
            )),
          ),
           'public' => true,
           'private' => false,
           'final' => false,
           'phpDoc' => NULL,
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedClassConstantsNode::__set_state(array(
           'constants' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedClassConstantNode::__set_state(array(
               'name' => 'LATE',
               'value' => '\'late\'',
               'attributes' => 
              array (
              ),
            )),
          ),
           'public' => true,
           'private' => false,
           'final' => false,
           'phpDoc' => NULL,
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedClassConstantsNode::__set_state(array(
           'constants' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedClassConstantNode::__set_state(array(
               'name' => 'HALF_DAY',
               'value' => '\'half_day\'',
               'attributes' => 
              array (
              ),
            )),
          ),
           'public' => true,
           'private' => false,
           'final' => false,
           'phpDoc' => NULL,
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedClassConstantsNode::__set_state(array(
           'constants' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedClassConstantNode::__set_state(array(
               'name' => 'ABSENT',
               'value' => '\'absent\'',
               'attributes' => 
              array (
              ),
            )),
          ),
           'public' => true,
           'private' => false,
           'final' => false,
           'phpDoc' => NULL,
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedClassConstantsNode::__set_state(array(
           'constants' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedClassConstantNode::__set_state(array(
               'name' => 'REST_DAY',
               'value' => '\'rest_day\'',
               'attributes' => 
              array (
              ),
            )),
          ),
           'public' => true,
           'private' => false,
           'final' => false,
           'phpDoc' => NULL,
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'employee',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'department',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        9 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'device',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        10 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getStatusLabelAttribute',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        11 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getStatusColorAttribute',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\AttendanceLog.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\AttendanceLog',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @property int $id
 * @property int|null $employee_id
 * @property int|null $fingerprint_id
 * @property int|null $device_id
 * @property Carbon $punch_time
 * @property string $source
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
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'carbon' => 'Illuminate\\Support\\Carbon',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'casts',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'employee',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'device',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Benefit.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\Benefit',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @property int $id
 * @property string $name
 * @property string $type
 * @property numeric $amount
 * @property string $frequency
 * @property bool $is_taxable
 * @property bool $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, EmployeeBenefit> $employeeBenefits
 * @property-read int|null $employee_benefits_count
 *
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Benefit newModelQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Benefit newQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Benefit query()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Benefit whereAmount($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Benefit whereCreatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Benefit whereFrequency($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Benefit whereId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Benefit whereIsActive($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Benefit whereIsTaxable($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Benefit whereName($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Benefit whereType($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Benefit whereUpdatedAt($value)
 *
 * @mixin \\Eloquent
 */',
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'collection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
          'carbon' => 'Illuminate\\Support\\Carbon',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'casts',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'employeeBenefits',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\BiometricDevice.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\BiometricDevice',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
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
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'collection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
          'carbon' => 'Illuminate\\Support\\Carbon',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'casts',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'logs',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Clearance.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\Clearance',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property bool $is_required
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, EmployeeClearance> $employeeClearances
 * @property-read int|null $employee_clearances_count
 *
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Clearance newModelQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Clearance newQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Clearance query()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Clearance whereCreatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Clearance whereDescription($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Clearance whereId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Clearance whereIsRequired($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Clearance whereName($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Clearance whereUpdatedAt($value)
 *
 * @mixin \\Eloquent
 */',
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'collection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
          'carbon' => 'Illuminate\\Support\\Carbon',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'casts',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'employeeClearances',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Department.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\Department',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @property int $id
 * @property string $name
 * @property string|null $code
 * @property string|null $description
 * @property bool $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, Employee> $employees
 * @property-read int|null $employees_count
 * @property-read User|null $head
 *
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Department newModelQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Department newQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Department query()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Department whereCode($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Department whereCreatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Department whereDescription($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Department whereId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Department whereIsActive($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Department whereName($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Department whereUpdatedAt($value)
 *
 * @mixin \\Eloquent
 */',
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'collection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
          'carbon' => 'Illuminate\\Support\\Carbon',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'casts',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'employees',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'head',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Employee.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\Employee',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @property int $id
 * @property string $employee_id
 * @property int|null $user_id
 * @property int|null $department_id
 * @property int|null $position_id
 * @property string $first_name
 * @property string|null $middle_name
 * @property string $last_name
 * @property string|null $suffix
 * @property Carbon|null $birth_date
 * @property string|null $gender
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $photo_path
 * @property string $classification
 * @property string $employment_status
 * @property string $salary_type
 * @property numeric $monthly_salary
 * @property numeric $daily_rate
 * @property numeric $hourly_rate
 * @property numeric $teaching_load
 * @property int|null $fingerprint_id
 * @property string|null $fingerprint_template
 * @property string|null $sss_no
 * @property string|null $philhealth_no
 * @property string|null $pagibig_no
 * @property string|null $tin
 * @property string $tax_status
 * @property string|null $bank_name
 * @property string|null $bank_account_no
 * @property string $payment_method
 * @property Carbon|null $date_hired
 * @property Carbon|null $date_resigned
 * @property bool $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, Attendance> $attendances
 * @property-read int|null $attendances_count
 * @property-read Collection<int, EmployeeBenefit> $benefits
 * @property-read int|null $benefits_count
 * @property-read Collection<int, EmployeeClearance> $clearances
 * @property-read int|null $clearances_count
 * @property-read Department|null $department
 * @property-read string $full_name
 * @property-read bool $is_permanent
 * @property-read bool $is_teaching
 * @property-read Collection<int, Loan> $loans
 * @property-read int|null $loans_count
 * @property-read Collection<int, MakeUpClass> $makeUpClasses
 * @property-read int|null $make_up_classes_count
 * @property-read Collection<int, PayrollReceipt> $payrollReceipts
 * @property-read int|null $payroll_receipts_count
 * @property-read Collection<int, Payroll> $payrolls
 * @property-read int|null $payrolls_count
 * @property-read Collection<int, Payslip> $payslips
 * @property-read int|null $payslips_count
 * @property-read Position|null $position
 * @property-read Collection<int, EmployeeRequirement> $requirements
 * @property-read int|null $requirements_count
 * @property-read Collection<int, TeachingSchedule> $teachingSchedules
 * @property-read int|null $teaching_schedules_count
 * @property-read User|null $user
 * @property-read Collection<int, WorkSchedule> $workSchedules
 * @property-read int|null $work_schedules_count
 *
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee newModelQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee newQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee query()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereAddress($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereBankAccountNo($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereBankName($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereBirthDate($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereClassification($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereCreatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereDailyRate($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereDateHired($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereDateResigned($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereDepartmentId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereEmail($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereEmployeeId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereEmploymentStatus($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereFingerprintId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereFingerprintTemplate($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereFirstName($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereGender($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereHourlyRate($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereIsActive($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereLastName($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereMiddleName($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereMonthlySalary($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee wherePagibigNo($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee wherePaymentMethod($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee wherePhilhealthNo($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee wherePhone($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee wherePhotoPath($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee wherePositionId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereSalaryType($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereSssNo($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereSuffix($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereTaxStatus($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereTeachingLoad($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereTin($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereUpdatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Employee whereUserId($value)
 *
 * @mixin \\Eloquent
 */',
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'collection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
          'carbon' => 'Illuminate\\Support\\Carbon',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'casts',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getFullNameAttribute',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getIsTeachingAttribute',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getIsPermanentAttribute',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'user',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'department',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'position',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'teachingSchedules',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return HasMany<TeachingSchedule, $this>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Database\\Eloquent\\Collection',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'carbon' => 'Illuminate\\Support\\Carbon',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        9 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'workSchedules',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return HasMany<WorkSchedule, $this>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Database\\Eloquent\\Collection',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'carbon' => 'Illuminate\\Support\\Carbon',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        10 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'attendances',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        11 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'makeUpClasses',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return HasMany<MakeUpClass, $this>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Database\\Eloquent\\Collection',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'carbon' => 'Illuminate\\Support\\Carbon',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        12 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'clearances',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        13 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'requirements',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        14 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'benefits',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return HasMany<EmployeeBenefit, $this>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Database\\Eloquent\\Collection',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'carbon' => 'Illuminate\\Support\\Carbon',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        15 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'loans',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return HasMany<Loan, $this>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Database\\Eloquent\\Collection',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'carbon' => 'Illuminate\\Support\\Carbon',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        16 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'payrolls',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        17 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'payslips',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        18 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'payrollReceipts',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        19 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'hasCompleteClearance',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        20 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'hasCompleteRequirements',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeBenefit.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\EmployeeBenefit',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @property int $id
 * @property int $employee_id
 * @property int $benefit_id
 * @property numeric|null $amount
 * @property Carbon|null $effective_date
 * @property Carbon|null $expiration_date
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Benefit $benefit
 * @property-read Employee $employee
 * @property-read float $effective_amount
 *
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeBenefit newModelQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeBenefit newQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeBenefit query()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeBenefit whereAmount($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeBenefit whereBenefitId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeBenefit whereCreatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeBenefit whereEffectiveDate($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeBenefit whereEmployeeId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeBenefit whereExpirationDate($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeBenefit whereId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeBenefit whereUpdatedAt($value)
 *
 * @mixin \\Eloquent
 */',
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'carbon' => 'Illuminate\\Support\\Carbon',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'casts',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'employee',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'benefit',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getEffectiveAmountAttribute',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'float',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeClearance.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\EmployeeClearance',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @property int $id
 * @property int $employee_id
 * @property int $clearance_id
 * @property string $status
 * @property int|null $cleared_by
 * @property Carbon|null $cleared_at
 * @property string|null $remarks
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Clearance $clearance
 * @property-read User|null $clearedBy
 * @property-read Employee $employee
 *
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeClearance newModelQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeClearance newQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeClearance query()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeClearance whereClearanceId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeClearance whereClearedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeClearance whereClearedBy($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeClearance whereCreatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeClearance whereEmployeeId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeClearance whereId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeClearance whereRemarks($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeClearance whereStatus($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|EmployeeClearance whereUpdatedAt($value)
 *
 * @mixin \\Eloquent
 */',
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'carbon' => 'Illuminate\\Support\\Carbon',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'casts',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'employee',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'clearance',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'clearedBy',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\EmployeeRequirement.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\EmployeeRequirement',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
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
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'carbon' => 'Illuminate\\Support\\Carbon',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'casts',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'employee',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'requirement',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'verifier',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getStatusColorAttribute',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Loan.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\Loan',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @property int $id
 * @property int $employee_id
 * @property string $loan_type
 * @property string|null $reference_no
 * @property numeric $amount
 * @property numeric $interest_rate
 * @property numeric $monthly_amortization
 * @property numeric $balance
 * @property Carbon|null $start_date
 * @property Carbon|null $end_date
 * @property string $status
 * @property string|null $remarks
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Employee $employee
 * @property-read Collection<int, LoanPayment> $payments
 * @property-read int|null $payments_count
 *
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Loan newModelQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Loan newQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Loan query()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Loan whereAmount($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Loan whereBalance($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Loan whereCreatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Loan whereEmployeeId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Loan whereEndDate($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Loan whereId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Loan whereInterestRate($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Loan whereLoanType($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Loan whereMonthlyAmortization($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Loan whereReferenceNo($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Loan whereRemarks($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Loan whereStartDate($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Loan whereStatus($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Loan whereUpdatedAt($value)
 *
 * @mixin \\Eloquent
 */',
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'collection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
          'carbon' => 'Illuminate\\Support\\Carbon',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'casts',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'employee',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'payments',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return HasMany<LoanPayment, $this>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'collection' => 'Illuminate\\Database\\Eloquent\\Collection',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'carbon' => 'Illuminate\\Support\\Carbon',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\LoanPayment.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\LoanPayment',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @property int $id
 * @property int $loan_id
 * @property int|null $payroll_id
 * @property numeric $amount
 * @property Carbon $payment_date
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Loan $loan
 * @property-read Payroll|null $payroll
 *
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|LoanPayment newModelQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|LoanPayment newQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|LoanPayment query()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|LoanPayment whereAmount($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|LoanPayment whereCreatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|LoanPayment whereId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|LoanPayment whereLoanId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|LoanPayment wherePaymentDate($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|LoanPayment wherePayrollId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|LoanPayment whereUpdatedAt($value)
 *
 * @mixin \\Eloquent
 */',
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'carbon' => 'Illuminate\\Support\\Carbon',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'casts',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'loan',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'payroll',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\MakeUpClass.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\MakeUpClass',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
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
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'carbon' => 'Illuminate\\Support\\Carbon',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'casts',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'employee',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'subject',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'approver',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'computeAdditionalPay',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'float',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Notification.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\Notification',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @property int $id
 * @property string $title
 * @property string|null $message
 * @property string|null $url
 * @property string|null $icon
 * @property bool $read
 * @property int $notifiable_id
 * @property string $notifiable_type
 * @property Carbon|null $read_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Model|\\Eloquent $notifiable
 * @property-read User|null $user
 *
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Notification newModelQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Notification newQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Notification query()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Notification whereCreatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Notification whereIcon($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Notification whereId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Notification whereMessage($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Notification whereNotifiableId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Notification whereNotifiableType($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Notification whereRead($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Notification whereReadAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Notification whereTitle($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Notification whereUpdatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Notification whereUrl($value)
 *
 * @mixin \\Eloquent
 */',
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'morphto' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
          'carbon' => 'Illuminate\\Support\\Carbon',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'casts',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'notifiable',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'user',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'notify',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'title',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'message',
               'type' => '?string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            3 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'url',
               'type' => '?string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            4 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'icon',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Payroll.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\Payroll',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @property int $id
 * @property int $payroll_period_id
 * @property int $employee_id
 * @property numeric $basic_pay
 * @property numeric $teaching_hours
 * @property numeric $teaching_pay
 * @property numeric $make_up_pay
 * @property numeric $allowances
 * @property numeric $overtime_pay
 * @property numeric $benefits
 * @property numeric $gross_pay
 * @property numeric $deduction_late
 * @property numeric $deduction_absent
 * @property numeric $deduction_undertime
 * @property numeric $deduction_tax
 * @property numeric $deduction_sss
 * @property numeric $deduction_philhealth
 * @property numeric $deduction_pagibig
 * @property numeric $deduction_loans
 * @property numeric $deduction_cash_advance
 * @property numeric $deduction_other
 * @property numeric $total_deductions
 * @property numeric $net_pay
 * @property int $days_present
 * @property int $days_late
 * @property int $days_absent
 * @property int $late_minutes_total
 * @property int $undertime_minutes_total
 * @property numeric $overtime_hours_total
 * @property string $status
 * @property string|null $hold_reason
 * @property int|null $released_by
 * @property Carbon|null $released_at
 * @property string|null $notes
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Employee $employee
 * @property-read string $status_color
 * @property-read string $status_label
 * @property-read Collection<int, LoanPayment> $loanPayments
 * @property-read int|null $loan_payments_count
 * @property-read Payslip|null $payslip
 * @property-read PayrollPeriod $period
 * @property-read PayrollReceipt|null $receipt
 * @property-read User|null $releaser
 *
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll newModelQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll newQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll query()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereAllowances($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereBasicPay($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereBenefits($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereCreatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereDaysAbsent($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereDaysLate($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereDaysPresent($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereDeductionAbsent($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereDeductionCashAdvance($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereDeductionLate($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereDeductionLoans($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereDeductionOther($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereDeductionPagibig($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereDeductionPhilhealth($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereDeductionSss($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereDeductionTax($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereDeductionUndertime($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereEmployeeId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereGrossPay($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereHoldReason($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereLateMinutesTotal($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereMakeUpPay($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereNetPay($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereNotes($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereOvertimeHoursTotal($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereOvertimePay($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll wherePayrollPeriodId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereReleasedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereReleasedBy($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereStatus($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereTeachingHours($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereTeachingPay($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereTotalDeductions($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereUndertimeMinutesTotal($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payroll whereUpdatedAt($value)
 *
 * @mixin \\Eloquent
 */',
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'collection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
          'hasone' => 'Illuminate\\Database\\Eloquent\\Relations\\HasOne',
          'carbon' => 'Illuminate\\Support\\Carbon',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'casts',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedClassConstantsNode::__set_state(array(
           'constants' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedClassConstantNode::__set_state(array(
               'name' => 'DRAFT',
               'value' => '\'draft\'',
               'attributes' => 
              array (
              ),
            )),
          ),
           'public' => true,
           'private' => false,
           'final' => false,
           'phpDoc' => NULL,
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedClassConstantsNode::__set_state(array(
           'constants' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedClassConstantNode::__set_state(array(
               'name' => 'ON_HOLD',
               'value' => '\'on_hold\'',
               'attributes' => 
              array (
              ),
            )),
          ),
           'public' => true,
           'private' => false,
           'final' => false,
           'phpDoc' => NULL,
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedClassConstantsNode::__set_state(array(
           'constants' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedClassConstantNode::__set_state(array(
               'name' => 'READY',
               'value' => '\'ready\'',
               'attributes' => 
              array (
              ),
            )),
          ),
           'public' => true,
           'private' => false,
           'final' => false,
           'phpDoc' => NULL,
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedClassConstantsNode::__set_state(array(
           'constants' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedClassConstantNode::__set_state(array(
               'name' => 'RELEASED',
               'value' => '\'released\'',
               'attributes' => 
              array (
              ),
            )),
          ),
           'public' => true,
           'private' => false,
           'final' => false,
           'phpDoc' => NULL,
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'period',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'employee',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'releaser',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        9 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'payslip',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasOne',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        10 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'receipt',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasOne',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        11 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'loanPayments',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        12 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getStatusLabelAttribute',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        13 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getStatusColorAttribute',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\PayrollPeriod.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\PayrollPeriod',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @property int $id
 * @property string $name
 * @property string $type
 * @property Carbon $start_date
 * @property Carbon $end_date
 * @property Carbon $pay_date
 * @property string $status
 * @property int|null $generated_by
 * @property Carbon|null $generated_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read User|null $generator
 * @property-read Collection<int, Payroll> $payrolls
 * @property-read int|null $payrolls_count
 *
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollPeriod newModelQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollPeriod newQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollPeriod query()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollPeriod whereCreatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollPeriod whereEndDate($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollPeriod whereGeneratedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollPeriod whereGeneratedBy($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollPeriod whereId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollPeriod whereName($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollPeriod wherePayDate($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollPeriod whereStartDate($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollPeriod whereStatus($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollPeriod whereType($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollPeriod whereUpdatedAt($value)
 *
 * @mixin \\Eloquent
 */',
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'collection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
          'carbon' => 'Illuminate\\Support\\Carbon',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'casts',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'payrolls',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'generator',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\PayrollReceipt.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\PayrollReceipt',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @property int $id
 * @property string $receipt_no
 * @property int $payroll_id
 * @property int $employee_id
 * @property numeric $amount_received
 * @property string $payment_method
 * @property string|null $employee_signature
 * @property string|null $hr_signature
 * @property Carbon|null $signed_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Employee $employee
 * @property-read Payroll $payroll
 *
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollReceipt newModelQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollReceipt newQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollReceipt query()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollReceipt whereAmountReceived($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollReceipt whereCreatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollReceipt whereEmployeeId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollReceipt whereEmployeeSignature($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollReceipt whereHrSignature($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollReceipt whereId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollReceipt wherePaymentMethod($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollReceipt wherePayrollId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollReceipt whereReceiptNo($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollReceipt whereSignedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|PayrollReceipt whereUpdatedAt($value)
 *
 * @mixin \\Eloquent
 */',
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'carbon' => 'Illuminate\\Support\\Carbon',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'casts',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'payroll',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'employee',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Payslip.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\Payslip',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @property int $id
 * @property string $payslip_no
 * @property int $payroll_id
 * @property int $employee_id
 * @property string|null $digital_signature
 * @property Carbon|null $generated_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Employee $employee
 * @property-read Payroll $payroll
 *
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payslip newModelQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payslip newQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payslip query()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payslip whereCreatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payslip whereDigitalSignature($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payslip whereEmployeeId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payslip whereGeneratedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payslip whereId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payslip wherePayrollId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payslip wherePayslipNo($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Payslip whereUpdatedAt($value)
 *
 * @mixin \\Eloquent
 */',
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'carbon' => 'Illuminate\\Support\\Carbon',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'casts',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'payroll',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'employee',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Position.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\Position',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @property int $id
 * @property int|null $department_id
 * @property string $name
 * @property string $category
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Department|null $department
 * @property-read Collection<int, Employee> $employees
 * @property-read int|null $employees_count
 *
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Position newModelQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Position newQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Position query()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Position whereCategory($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Position whereCreatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Position whereDepartmentId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Position whereId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Position whereName($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Position whereUpdatedAt($value)
 *
 * @mixin \\Eloquent
 */',
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'collection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
          'carbon' => 'Illuminate\\Support\\Carbon',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'department',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'employees',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Requirement.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\Requirement',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string $applies_to
 * @property bool $needs_expiration
 * @property bool $is_required
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, EmployeeRequirement> $employeeRequirements
 * @property-read int|null $employee_requirements_count
 *
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Requirement newModelQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Requirement newQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Requirement query()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Requirement whereAppliesTo($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Requirement whereCreatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Requirement whereDescription($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Requirement whereId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Requirement whereIsRequired($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Requirement whereName($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Requirement whereNeedsExpiration($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Requirement whereUpdatedAt($value)
 *
 * @mixin \\Eloquent
 */',
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'collection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
          'carbon' => 'Illuminate\\Support\\Carbon',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'casts',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'employeeRequirements',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Room.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\Room',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string|null $building
 * @property int|null $capacity
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Room newModelQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Room newQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Room query()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Room whereBuilding($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Room whereCapacity($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Room whereCode($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Room whereCreatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Room whereId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Room whereName($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Room whereUpdatedAt($value)
 *
 * @mixin \\Eloquent
 */',
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'carbon' => 'Illuminate\\Support\\Carbon',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\SchoolYear.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\SchoolYear',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @property int $id
 * @property string $name
 * @property Carbon $start_date
 * @property Carbon $end_date
 * @property bool $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, Semester> $semesters
 * @property-read int|null $semesters_count
 *
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|SchoolYear newModelQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|SchoolYear newQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|SchoolYear query()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|SchoolYear whereCreatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|SchoolYear whereEndDate($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|SchoolYear whereId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|SchoolYear whereIsActive($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|SchoolYear whereName($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|SchoolYear whereStartDate($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|SchoolYear whereUpdatedAt($value)
 *
 * @mixin \\Eloquent
 */',
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'collection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
          'carbon' => 'Illuminate\\Support\\Carbon',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'casts',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'semesters',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Semester.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\Semester',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @property int $id
 * @property int $school_year_id
 * @property string $name
 * @property Carbon $start_date
 * @property Carbon $end_date
 * @property bool $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read SchoolYear $schoolYear
 *
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Semester newModelQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Semester newQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Semester query()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Semester whereCreatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Semester whereEndDate($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Semester whereId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Semester whereIsActive($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Semester whereName($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Semester whereSchoolYearId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Semester whereStartDate($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Semester whereUpdatedAt($value)
 *
 * @mixin \\Eloquent
 */',
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'carbon' => 'Illuminate\\Support\\Carbon',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'casts',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'schoolYear',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Setting.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\Setting',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @property int $id
 * @property string $key
 * @property string|null $value
 * @property string $group
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Setting newModelQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Setting newQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Setting query()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Setting whereCreatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Setting whereGroup($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Setting whereId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Setting whereKey($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Setting whereUpdatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Setting whereValue($value)
 *
 * @mixin \\Eloquent
 */',
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'timestamps',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => true,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'get',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'mixed',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'key',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'default',
               'type' => '?mixed',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'set',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'key',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'value',
               'type' => 'mixed',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'group',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\Subject.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\Subject',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @property int $id
 * @property string $code
 * @property string $name
 * @property numeric $units
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, TeachingSchedule> $schedules
 * @property-read int|null $schedules_count
 *
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Subject newModelQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Subject newQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Subject query()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Subject whereCode($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Subject whereCreatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Subject whereId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Subject whereName($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Subject whereUnits($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|Subject whereUpdatedAt($value)
 *
 * @mixin \\Eloquent
 */',
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'collection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
          'carbon' => 'Illuminate\\Support\\Carbon',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'schedules',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\TeachingSchedule.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\TeachingSchedule',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
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
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'carbon' => 'Illuminate\\Support\\Carbon',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'casts',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'dayNames',
          ),
           'phpDoc' => NULL,
           'type' => 'array',
           'public' => true,
           'private' => false,
           'static' => true,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getDayNameAttribute',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'employee',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'subject',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'room',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'semester',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'schoolYear',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\User.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\User',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $role
 * @property int|null $employee_id
 * @property bool $is_active
 * @property-read Employee|null $employee
 * @property-read DatabaseNotificationCollection<int, DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 *
 * @method static \\Database\\Factories\\UserFactory factory($count = null, $state = [])
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|User newModelQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|User newQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|User query()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|User whereCreatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|User whereEmail($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|User whereEmployeeId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|User whereId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|User whereIsActive($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|User whereName($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|User wherePassword($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|User whereRememberToken($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|User whereRole($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|User whereUpdatedAt($value)
 *
 * @mixin \\Eloquent
 */',
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'userfactory' => 'Database\\Factories\\UserFactory',
          'mustverifyemail' => 'Illuminate\\Contracts\\Auth\\MustVerifyEmail',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
          'databasenotification' => 'Illuminate\\Notifications\\DatabaseNotification',
          'databasenotificationcollection' => 'Illuminate\\Notifications\\DatabaseNotificationCollection',
          'notifiable' => 'Illuminate\\Notifications\\Notifiable',
          'carbon' => 'Illuminate\\Support\\Carbon',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Foundation\\Auth\\User',
       'implements' => 
      array (
        0 => 'Illuminate\\Contracts\\Auth\\MustVerifyEmail',
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
        1 => 'Illuminate\\Notifications\\Notifiable',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedClassConstantsNode::__set_state(array(
           'constants' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedClassConstantNode::__set_state(array(
               'name' => 'ROLES',
               'value' => '[\'admin\', \'hr\', \'payroll_officer\', \'department_head\', \'employee\']',
               'attributes' => 
              array (
              ),
            )),
          ),
           'public' => true,
           'private' => false,
           'final' => false,
           'phpDoc' => NULL,
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'hidden',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'casts',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'employee',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'hasRole',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'roles',
               'type' => 'string|array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'isAdmin',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'isHr',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'isPayroll',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        9 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'isDepartmentHead',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        10 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'roleLabel',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Models\\WorkSchedule.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\WorkSchedule',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @property int $id
 * @property int $employee_id
 * @property int $day
 * @property Carbon $start_time
 * @property Carbon $end_time
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Employee $employee
 * @property-read string $day_name
 *
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|WorkSchedule newModelQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|WorkSchedule newQuery()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|WorkSchedule query()
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|WorkSchedule whereCreatedAt($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|WorkSchedule whereDay($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|WorkSchedule whereEmployeeId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|WorkSchedule whereEndTime($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|WorkSchedule whereId($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|WorkSchedule whereStartTime($value)
 * @method static \\Illuminate\\Database\\Eloquent\\Builder<static>|WorkSchedule whereUpdatedAt($value)
 *
 * @mixin \\Eloquent
 */',
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'carbon' => 'Illuminate\\Support\\Carbon',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'casts',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getDayNameAttribute',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'employee',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Providers\\AppServiceProvider.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Providers\\AppServiceProvider',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Support\\ServiceProvider',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'register',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Register any application services.
     */',
             'namespace' => 'App\\Providers',
             'uses' => 
            array (
              'serviceprovider' => 'Illuminate\\Support\\ServiceProvider',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'boot',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Bootstrap any application services.
     */',
             'namespace' => 'App\\Providers',
             'uses' => 
            array (
              'serviceprovider' => 'Illuminate\\Support\\ServiceProvider',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\ArchiveService.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Services\\ArchiveService',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'archiveType',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Archive records of one type for a period (snapshot into archives table).
     */',
             'namespace' => 'App\\Services',
             'uses' => 
            array (
              'archive' => 'App\\Models\\Archive',
              'attendance' => 'App\\Models\\Attendance',
              'makeupclass' => 'App\\Models\\MakeUpClass',
              'payroll' => 'App\\Models\\Payroll',
              'payrollreceipt' => 'App\\Models\\PayrollReceipt',
              'payslip' => 'App\\Models\\Payslip',
              'user' => 'App\\Models\\User',
              'carbon' => 'Carbon\\Carbon',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'int',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'type',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'from',
               'type' => 'Carbon\\Carbon',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'to',
               'type' => 'Carbon\\Carbon',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            3 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'periodLabel',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            4 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'periodType',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            5 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => '?App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'archivePeriod',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Archive everything for a month / year.
     */',
             'namespace' => 'App\\Services',
             'uses' => 
            array (
              'archive' => 'App\\Models\\Archive',
              'attendance' => 'App\\Models\\Attendance',
              'makeupclass' => 'App\\Models\\MakeUpClass',
              'payroll' => 'App\\Models\\Payroll',
              'payrollreceipt' => 'App\\Models\\PayrollReceipt',
              'payslip' => 'App\\Models\\Payslip',
              'user' => 'App\\Models\\User',
              'carbon' => 'Carbon\\Carbon',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'month',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\AttendanceService.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Services\\AttendanceService',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getScheduleFor',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Find the schedule window for an employee on a given date.
     *
     * Teaching personnel are validated against their assigned class
     * schedules (per-day, per-semester). Non-teaching personnel use
     * their fixed work schedules, falling back to the company default
     * Monday-Friday shift defined in settings.
     *
     * @return array{start: Carbon|null, end: Carbon|null, schedule: TeachingSchedule|WorkSchedule|null, type: string|null}
     */',
             'namespace' => 'App\\Services',
             'uses' => 
            array (
              'attendance' => 'App\\Models\\Attendance',
              'attendancelog' => 'App\\Models\\AttendanceLog',
              'employee' => 'App\\Models\\Employee',
              'setting' => 'App\\Models\\Setting',
              'teachingschedule' => 'App\\Models\\TeachingSchedule',
              'workschedule' => 'App\\Models\\WorkSchedule',
              'carbon' => 'Carbon\\Carbon',
              'db' => 'Illuminate\\Support\\Facades\\DB',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'employee',
               'type' => 'App\\Models\\Employee',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'date',
               'type' => 'Carbon\\Carbon',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'registerPunch',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Register a raw fingerprint punch (from device sync / API / manual).
     * Returns the processed attendance.
     */',
             'namespace' => 'App\\Services',
             'uses' => 
            array (
              'attendance' => 'App\\Models\\Attendance',
              'attendancelog' => 'App\\Models\\AttendanceLog',
              'employee' => 'App\\Models\\Employee',
              'setting' => 'App\\Models\\Setting',
              'teachingschedule' => 'App\\Models\\TeachingSchedule',
              'workschedule' => 'App\\Models\\WorkSchedule',
              'carbon' => 'Carbon\\Carbon',
              'db' => 'Illuminate\\Support\\Facades\\DB',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'App\\Models\\Attendance',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'employee',
               'type' => 'App\\Models\\Employee',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'punchTime',
               'type' => 'Carbon\\Carbon',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'deviceId',
               'type' => '?int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            3 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'source',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'processDay',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Process one employee for one date using the punch logs.
     * Recomputes everything from scratch so it is idempotent.
     */',
             'namespace' => 'App\\Services',
             'uses' => 
            array (
              'attendance' => 'App\\Models\\Attendance',
              'attendancelog' => 'App\\Models\\AttendanceLog',
              'employee' => 'App\\Models\\Employee',
              'setting' => 'App\\Models\\Setting',
              'teachingschedule' => 'App\\Models\\TeachingSchedule',
              'workschedule' => 'App\\Models\\WorkSchedule',
              'carbon' => 'Carbon\\Carbon',
              'db' => 'Illuminate\\Support\\Facades\\DB',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'App\\Models\\Attendance',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'employee',
               'type' => 'App\\Models\\Employee',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'date',
               'type' => 'Carbon\\Carbon',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'processedBy',
               'type' => '?int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'processDate',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Process all active employees for a given date.
     */',
             'namespace' => 'App\\Services',
             'uses' => 
            array (
              'attendance' => 'App\\Models\\Attendance',
              'attendancelog' => 'App\\Models\\AttendanceLog',
              'employee' => 'App\\Models\\Employee',
              'setting' => 'App\\Models\\Setting',
              'teachingschedule' => 'App\\Models\\TeachingSchedule',
              'workschedule' => 'App\\Models\\WorkSchedule',
              'carbon' => 'Carbon\\Carbon',
              'db' => 'Illuminate\\Support\\Facades\\DB',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'int',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'date',
               'type' => 'Carbon\\Carbon',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'processedBy',
               'type' => '?int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'processRange',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Process a date range for one employee (used after bulk import).
     */',
             'namespace' => 'App\\Services',
             'uses' => 
            array (
              'attendance' => 'App\\Models\\Attendance',
              'attendancelog' => 'App\\Models\\AttendanceLog',
              'employee' => 'App\\Models\\Employee',
              'setting' => 'App\\Models\\Setting',
              'teachingschedule' => 'App\\Models\\TeachingSchedule',
              'workschedule' => 'App\\Models\\WorkSchedule',
              'carbon' => 'Carbon\\Carbon',
              'db' => 'Illuminate\\Support\\Facades\\DB',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'int',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'employee',
               'type' => 'App\\Models\\Employee',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'from',
               'type' => 'Carbon\\Carbon',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'to',
               'type' => 'Carbon\\Carbon',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            3 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'processedBy',
               'type' => '?int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'backfill',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Backfill attendance for all employees in a date range.
     */',
             'namespace' => 'App\\Services',
             'uses' => 
            array (
              'attendance' => 'App\\Models\\Attendance',
              'attendancelog' => 'App\\Models\\AttendanceLog',
              'employee' => 'App\\Models\\Employee',
              'setting' => 'App\\Models\\Setting',
              'teachingschedule' => 'App\\Models\\TeachingSchedule',
              'workschedule' => 'App\\Models\\WorkSchedule',
              'carbon' => 'Carbon\\Carbon',
              'db' => 'Illuminate\\Support\\Facades\\DB',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'int',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'from',
               'type' => 'Carbon\\Carbon',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'to',
               'type' => 'Carbon\\Carbon',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'processedBy',
               'type' => '?int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'dailySummary',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Daily attendance summary percentages for dashboards.
     */',
             'namespace' => 'App\\Services',
             'uses' => 
            array (
              'attendance' => 'App\\Models\\Attendance',
              'attendancelog' => 'App\\Models\\AttendanceLog',
              'employee' => 'App\\Models\\Employee',
              'setting' => 'App\\Models\\Setting',
              'teachingschedule' => 'App\\Models\\TeachingSchedule',
              'workschedule' => 'App\\Models\\WorkSchedule',
              'carbon' => 'Carbon\\Carbon',
              'db' => 'Illuminate\\Support\\Facades\\DB',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'date',
               'type' => '?Carbon\\Carbon',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\BiometricService.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Services\\BiometricService',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * Minimal ZKTeco (ZK) fingerprint device client over TCP.
 *
 * Implements the session handshake (CMD_CONNECT) and attendance record
 * download (CMD_ATTLOG_RRQ). If a device is unreachable the methods fail
 * gracefully so the app keeps running — the same data can be received
 * through the local sync agent POSTing to the device API endpoint.
 */',
         'namespace' => 'App\\Services',
         'uses' => 
        array (
          'attendancelog' => 'App\\Models\\AttendanceLog',
          'biometricdevice' => 'App\\Models\\BiometricDevice',
          'employee' => 'App\\Models\\Employee',
          'carbon' => 'Carbon\\Carbon',
          'log' => 'Illuminate\\Support\\Facades\\Log',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedClassConstantsNode::__set_state(array(
           'constants' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedClassConstantNode::__set_state(array(
               'name' => 'CMD_CONNECT',
               'value' => '1000',
               'attributes' => 
              array (
              ),
            )),
          ),
           'public' => true,
           'private' => false,
           'final' => false,
           'phpDoc' => NULL,
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedClassConstantsNode::__set_state(array(
           'constants' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedClassConstantNode::__set_state(array(
               'name' => 'CMD_ATTLOG_RRQ',
               'value' => '13',
               'attributes' => 
              array (
              ),
            )),
          ),
           'public' => true,
           'private' => false,
           'final' => false,
           'phpDoc' => NULL,
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedClassConstantsNode::__set_state(array(
           'constants' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedClassConstantNode::__set_state(array(
               'name' => 'CMD_ENABLE_DEVICE',
               'value' => '1001',
               'attributes' => 
              array (
              ),
            )),
          ),
           'public' => true,
           'private' => false,
           'final' => false,
           'phpDoc' => NULL,
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedClassConstantsNode::__set_state(array(
           'constants' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedClassConstantNode::__set_state(array(
               'name' => 'CMD_DISABLE_DEVICE',
               'value' => '1002',
               'attributes' => 
              array (
              ),
            )),
          ),
           'public' => true,
           'private' => false,
           'final' => false,
           'phpDoc' => NULL,
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'isConnected',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'connect',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Establish a session with the device.
     */',
             'namespace' => 'App\\Services',
             'uses' => 
            array (
              'attendancelog' => 'App\\Models\\AttendanceLog',
              'biometricdevice' => 'App\\Models\\BiometricDevice',
              'employee' => 'App\\Models\\Employee',
              'carbon' => 'Carbon\\Carbon',
              'log' => 'Illuminate\\Support\\Facades\\Log',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'device',
               'type' => 'App\\Models\\BiometricDevice|string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'port',
               'type' => '?int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'disconnect',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'pullAttendance',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Pull all attendance records from the device and persist them.
     */',
             'namespace' => 'App\\Services',
             'uses' => 
            array (
              'attendancelog' => 'App\\Models\\AttendanceLog',
              'biometricdevice' => 'App\\Models\\BiometricDevice',
              'employee' => 'App\\Models\\Employee',
              'carbon' => 'Carbon\\Carbon',
              'log' => 'Illuminate\\Support\\Facades\\Log',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'device',
               'type' => 'App\\Models\\BiometricDevice',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'persistPunch',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Save a punch and reprocess the employee\'s attendance for that day.
     */',
             'namespace' => 'App\\Services',
             'uses' => 
            array (
              'attendancelog' => 'App\\Models\\AttendanceLog',
              'biometricdevice' => 'App\\Models\\BiometricDevice',
              'employee' => 'App\\Models\\Employee',
              'carbon' => 'Carbon\\Carbon',
              'log' => 'Illuminate\\Support\\Facades\\Log',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'record',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\PayrollService.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Services\\PayrollService',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'computeWithholdingTax',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Simplified BIR-style monthly withholding brackets (Philippines).
     */',
             'namespace' => 'App\\Services',
             'uses' => 
            array (
              'attendance' => 'App\\Models\\Attendance',
              'employee' => 'App\\Models\\Employee',
              'notification' => 'App\\Models\\Notification',
              'payroll' => 'App\\Models\\Payroll',
              'payrollperiod' => 'App\\Models\\PayrollPeriod',
              'payrollreceipt' => 'App\\Models\\PayrollReceipt',
              'payslip' => 'App\\Models\\Payslip',
              'setting' => 'App\\Models\\Setting',
              'user' => 'App\\Models\\User',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
              'db' => 'Illuminate\\Support\\Facades\\DB',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'float',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'taxableMonthlyIncome',
               'type' => 'float',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'computeEmployee',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Compute one employee\'s payroll line for a period.
     */',
             'namespace' => 'App\\Services',
             'uses' => 
            array (
              'attendance' => 'App\\Models\\Attendance',
              'employee' => 'App\\Models\\Employee',
              'notification' => 'App\\Models\\Notification',
              'payroll' => 'App\\Models\\Payroll',
              'payrollperiod' => 'App\\Models\\PayrollPeriod',
              'payrollreceipt' => 'App\\Models\\PayrollReceipt',
              'payslip' => 'App\\Models\\Payslip',
              'setting' => 'App\\Models\\Setting',
              'user' => 'App\\Models\\User',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
              'db' => 'Illuminate\\Support\\Facades\\DB',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'e',
               'type' => 'App\\Models\\Employee',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'p',
               'type' => 'App\\Models\\PayrollPeriod',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'generatePeriod',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Generate payrolls for every active employee in a period.
     * Teaching personnel are placed on hold until clearance & requirements complete.
     */',
             'namespace' => 'App\\Services',
             'uses' => 
            array (
              'attendance' => 'App\\Models\\Attendance',
              'employee' => 'App\\Models\\Employee',
              'notification' => 'App\\Models\\Notification',
              'payroll' => 'App\\Models\\Payroll',
              'payrollperiod' => 'App\\Models\\PayrollPeriod',
              'payrollreceipt' => 'App\\Models\\PayrollReceipt',
              'payslip' => 'App\\Models\\Payslip',
              'setting' => 'App\\Models\\Setting',
              'user' => 'App\\Models\\User',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
              'db' => 'Illuminate\\Support\\Facades\\DB',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'p',
               'type' => 'App\\Models\\PayrollPeriod',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => '?App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'release',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Release a payroll: records salary release, generates payslip + receipt,
     * and applies loan payments.
     */',
             'namespace' => 'App\\Services',
             'uses' => 
            array (
              'attendance' => 'App\\Models\\Attendance',
              'employee' => 'App\\Models\\Employee',
              'notification' => 'App\\Models\\Notification',
              'payroll' => 'App\\Models\\Payroll',
              'payrollperiod' => 'App\\Models\\PayrollPeriod',
              'payrollreceipt' => 'App\\Models\\PayrollReceipt',
              'payslip' => 'App\\Models\\Payslip',
              'setting' => 'App\\Models\\Setting',
              'user' => 'App\\Models\\User',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
              'db' => 'Illuminate\\Support\\Facades\\DB',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'App\\Models\\Payroll',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'payroll',
               'type' => 'App\\Models\\Payroll',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'releaser',
               'type' => '?App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\Services\\ReportService.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Services\\ReportService',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'filters',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'attendanceReport',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Attendance report: one row per attendance within the range.
     */',
             'namespace' => 'App\\Services',
             'uses' => 
            array (
              'attendance' => 'App\\Models\\Attendance',
              'department' => 'App\\Models\\Department',
              'employee' => 'App\\Models\\Employee',
              'employeebenefit' => 'App\\Models\\EmployeeBenefit',
              'loan' => 'App\\Models\\Loan',
              'makeupclass' => 'App\\Models\\MakeUpClass',
              'payroll' => 'App\\Models\\Payroll',
              'carbon' => 'Carbon\\Carbon',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'collection' => 'Illuminate\\Support\\Collection',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Support\\Collection',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'attendanceDailySummary',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Daily summary per employee in the range.
     */',
             'namespace' => 'App\\Services',
             'uses' => 
            array (
              'attendance' => 'App\\Models\\Attendance',
              'department' => 'App\\Models\\Department',
              'employee' => 'App\\Models\\Employee',
              'employeebenefit' => 'App\\Models\\EmployeeBenefit',
              'loan' => 'App\\Models\\Loan',
              'makeupclass' => 'App\\Models\\MakeUpClass',
              'payroll' => 'App\\Models\\Payroll',
              'carbon' => 'Carbon\\Carbon',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'collection' => 'Illuminate\\Support\\Collection',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Support\\Collection',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'lateReport',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Support\\Collection',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'absentReport',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Support\\Collection',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'payrollReport',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Payroll report across periods.
     */',
             'namespace' => 'App\\Services',
             'uses' => 
            array (
              'attendance' => 'App\\Models\\Attendance',
              'department' => 'App\\Models\\Department',
              'employee' => 'App\\Models\\Employee',
              'employeebenefit' => 'App\\Models\\EmployeeBenefit',
              'loan' => 'App\\Models\\Loan',
              'makeupclass' => 'App\\Models\\MakeUpClass',
              'payroll' => 'App\\Models\\Payroll',
              'carbon' => 'Carbon\\Carbon',
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'collection' => 'Illuminate\\Support\\Collection',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Support\\Collection',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'teachingHoursReport',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Support\\Collection',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'makeUpClassReport',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Support\\Collection',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'benefitReport',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Support\\Collection',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        9 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'loanReport',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Support\\Collection',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        10 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'departmentReport',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Support\\Collection',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        11 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'employeeReport',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Support\\Collection',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\View\\Components\\AppLayout.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\View\\Components\\AppLayout',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\View\\Component',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'render',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the view / contents that represents the component.
     */',
             'namespace' => 'App\\View\\Components',
             'uses' => 
            array (
              'component' => 'Illuminate\\View\\Component',
              'view' => 'Illuminate\\View\\View',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\View\\View',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Users\\Ryzen\\Desktop\\hrissystem\\system\\app\\View\\Components\\GuestLayout.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\View\\Components\\GuestLayout',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\View\\Component',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'render',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the view / contents that represents the component.
     */',
             'namespace' => 'App\\View\\Components',
             'uses' => 
            array (
              'component' => 'Illuminate\\View\\Component',
              'view' => 'Illuminate\\View\\View',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\View\\View',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
); },
];
