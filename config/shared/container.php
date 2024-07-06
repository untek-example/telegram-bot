<?php

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;

/**
 * @var ContainerBuilder $containerBuilder
 */

$fileLocator = new FileLocator(__DIR__);
$loader = new PhpFileLoader($containerBuilder, $fileLocator);

$loader->load(__DIR__ . '/services/main.php');

// Base
$loader->load(__DIR__ . '/../../vendor/untek-core/instance/src/resources/config/services/argument-resolver.php');
$loader->load(__DIR__ . '/../../vendor/untek-core/event-dispatcher/src/resources/config/services/event-dispatcher.php');
$loader->load(__DIR__ . '/../../vendor/untek-core/kernel/src/resources/config/services/kernel.php');

// CQRS
$loader->load(__DIR__ . '/../../vendor/untek-model/cqrs/src/resources/config/services/main.php');

// Model
//$loader->load(__DIR__ . '/../../vendor/untek-model/entity-manager/src/resources/config/services/entity-manager.php');

// Validator
//$loader->load(__DIR__ . '/../../vendor/untek-model/validator/src/resources/config/services/validator.php');

// Logger
$loader->load(__DIR__ . '/services/log.php');

// Database
//$loader->load(__DIR__ . '/../../vendor/untek-sandbox/common/src/Database/Doctrine/resources/config/services/main.php');
//$loader->load(__DIR__ . '/../../vendor/untek-sandbox/common/src/Database/Eloquent/resources/config/services/main.php');

// Translate
$loader->load(__DIR__ . '/../../vendor/untek-component/translation/src/resources/config/services/main.php');

$loader->load(__DIR__ . '/../../vendor/untek-framework/telegram/src/resources/config/services/main.php');
