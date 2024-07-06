<?php

use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Untek\Core\App\DependencyInjection\Factories\LoggerFactory;

return static function (ContainerConfigurator $configurator): void {
    $services = $configurator->services()->defaults()->public();
    $parameters = $configurator->parameters();

    $services
        ->set(LoggerInterface::class)
        ->factory([LoggerFactory::class, 'createJsonFileLogger'])
        ->args([
            getenv('APP_CONTEXT')
        ]);
};