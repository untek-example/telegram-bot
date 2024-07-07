<?php

namespace Untek\Example\TelegramBot\Shared\Infrastructure\Bootstrap;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\EventDispatcher\DependencyInjection\RegisterListenersPass;
use Untek\Core\App\Bootstrap\AbstractAppKernel;
use Untek\Core\App\Bootstrap\ConfigDirectory;
use Untek\Framework\Console\Infrastructure\DependencyInjection\ConsoleCommandPass;
use Untek\Model\Cqrs\Infrastructure\DependencyInjection\CqrsPass;

class Kernel extends AbstractAppKernel
{

    public function __construct(
        ConfigDirectory $configDirectory,
        string $context,
        string $environment,
        string $cacheDirectory,
        bool $isImportLocalConfig = false,
        bool $isDebug = false,
        bool $isTest = false,
    )
    {
        parent::__construct(
            $configDirectory,
            $context,
            ($environment == 'prod' ? 'dev' : $environment),
            $cacheDirectory,
            $isImportLocalConfig,
            $isDebug,
            $isTest,
        );
    }

    protected function build(ContainerBuilder $container): void
    {
        $container->addCompilerPass(new CqrsPass());
        $container->addCompilerPass(new RegisterListenersPass());
        $container->addCompilerPass(new ConsoleCommandPass());
    }
}
