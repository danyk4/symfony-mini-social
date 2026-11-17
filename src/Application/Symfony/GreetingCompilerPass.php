<?php

declare(strict_types=1);

namespace App\Application\Symfony;

use App\Domain\Service\MessageService;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class GreetingCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        if ( ! $container->has(MessageService::class)) {
            return;
        }
        $messageService   = $container->findDefinition(MessageService::class);
        $greetingServices = $container->findTaggedServiceIds('app.greeting_service');
        uasort($greetingServices, static fn(array $tag1, array $tag2) => $tag1[0]['priority'] - $tag2[0]['priority']);
        foreach ($greetingServices as $id => $tags) {
            $messageService->addMethodCall('addGreeting', [new Reference($id)]);
        }
    }
}
