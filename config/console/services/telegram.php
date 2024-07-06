<?php

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Untek\Framework\Telegram\Domain\Services\ResponseService;
use Untek\Framework\Telegram\Domain\Services\RouteService;
use Untek\Framework\Telegram\Infrastructure\RouteServiceFactory;
use function Symfony\Component\DependencyInjection\Loader\Configurator\service;

return static function (ContainerConfigurator $configurator): void {
    $services = $configurator->services();
    $parameters = $configurator->parameters();

    $services->set(RouteService::class, RouteService::class)
        /*->args([
            service(ResponseService::class),
        ])*/
        ->call('setResponseService', [service(ResponseService::class)])
        ->factory([RouteServiceFactory::class, 'createService'])
        ->args([
            [
                __DIR__ . '/../../telegram/routes.php',
            ]
        ])
    ;
};