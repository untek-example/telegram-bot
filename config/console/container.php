<?php

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;
use Untek\Framework\Console\Infrastructure\DependencyInjection\ConsoleCommandPass;

/**
 * @var ContainerBuilder $containerBuilder
 */

$fileLocator = new FileLocator(__DIR__);
$loader = new PhpFileLoader($containerBuilder, $fileLocator);

$containerBuilder->addCompilerPass(new ConsoleCommandPass());

$loader->load(__DIR__ . '/services/main.php');
$loader->load(__DIR__ . '/services/telegram.php');

// Console framework
$loader->load(__DIR__ . '/../../vendor/untek-framework/console/src/resources/config/services/main.php');

$loader->load(__DIR__ . '/../../vendor/untek-framework/telegram/src/resources/config/services/console.php');
