<?php

declare(strict_types=1);

namespace App\Application\Symfony;

use App\Domain\Service\MessageService;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class FormatingCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        if ( ! $container->has(MessageService::class)) {
            return;
        }
        $messageService    = $container->findDefinition(MessageService::class);
        $formatingServices = $container->findTaggedServiceIds('app.formating_service');
        foreach ($formatingServices as $id => $tags) {
            $messageService->addMethodCall('addFormating', [new Reference($id)]);
        }
    }
}
