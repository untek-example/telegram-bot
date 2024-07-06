<?php

use Forecast\Map\Packages\Component\Translator\Infrastructure\DependencyInjection\TranslatorFactory;
use Psr\Container\ContainerInterface;
use Symfony\Component\Cache\Adapter\AdapterInterface;
use Symfony\Component\Cache\Adapter\ArrayAdapter;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\Translation\Translator;
use Symfony\Contracts\Translation\TranslatorInterface;
use Untek\Component\Relation\Libs\RelationLoader;
use Untek\Core\App\Bootstrap\ContainerFactory;
use Untek\Core\App\DependencyInjection\Factories\CacheFactory;
use function Symfony\Component\DependencyInjection\Loader\Configurator\service;

return static function (ContainerConfigurator $configurator): void {
    $services = $configurator->services()->defaults()->public();
    $parameters = $configurator->parameters();

    $services
        ->set(ContainerInterface::class)
        ->factory([ContainerFactory::class, 'create'])
        ->public();

    $isTest = getenv('APP_ENV') === 'test';
    if ($isTest) {
        $services->set(AdapterInterface::class, ArrayAdapter::class);
    } else {
        $services->set(CacheFactory::class, CacheFactory::class);
        $services->set(AdapterInterface::class)
            ->factory([service(CacheFactory::class), 'create']);
    }

    $services->set(TranslatorInterface::class, Translator::class)
        ->args([
            'en_US',
        ]);

    $services->set(RelationLoader::class, RelationLoader::class)
        ->args([
            service(ContainerInterface::class),
        ]);
};