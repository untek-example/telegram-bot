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
$loader->load(__DIR__ . '/services/telegram.php');

// Console framework
$loader->load(__DIR__ . '/../../vendor/untek-framework/console/src/resources/config/services/main.php');

// Init utility
$loader->load(__DIR__ . '/../../vendor/untek-utility/init/src/resources/config/services/package.php');

// Database
//$loader->load(__DIR__ . '/../../vendor/untek-sandbox/common/src/Database/Migration/resources/config/services/main.php');
//$loader->load(__DIR__ . '/../../vendor/untek-sandbox/common/src/Database/Migration/resources/config/services/console.php');
//$loader->load(__DIR__ . '/../../vendor/untek-sandbox/common/src/Database/Seed/resources/config/services/main.php');
//$loader->load(__DIR__ . '/../../vendor/untek-sandbox/common/src/Database/Seed/resources/config/services/console.php');

// Package utility
//$loader->load(__DIR__ . '/../../vendor/untek-develop/package/src/resources/config/services/package.php');

$loader->load(__DIR__ . '/../../vendor/untek-framework/telegram/src/resources/config/services/console.php');
