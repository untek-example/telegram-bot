<?php

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;
use Symfony\Component\EventDispatcher\DependencyInjection\RegisterListenersPass;
use Untek\Model\Cqrs\Infrastructure\DependencyInjection\CqrsPass;

/**
 * @var ContainerBuilder $containerBuilder
 */

$fileLocator = new FileLocator(__DIR__);
$loader = new PhpFileLoader($containerBuilder, $fileLocator);

$containerBuilder->addCompilerPass(new CqrsPass());
$containerBuilder->addCompilerPass(new RegisterListenersPass());

$loader->load(__DIR__ . '/services/main.php');

// Base
$loader->load(__DIR__ . '/../../vendor/untek-core/instance/src/resources/config/services/argument-resolver.php');
$loader->load(__DIR__ . '/../../vendor/untek-core/event-dispatcher/src/resources/config/services/event-dispatcher.php');
$loader->load(__DIR__ . '/../../vendor/untek-core/kernel/src/resources/config/services/kernel.php');

// CQRS
$loader->load(__DIR__ . '/../../vendor/untek-model/cqrs/src/resources/config/services/main.php');

// Logger
$loader->load(__DIR__ . '/services/log.php');

$loader->load(__DIR__ . '/../../vendor/untek-framework/telegram/src/resources/config/services/main.php');
