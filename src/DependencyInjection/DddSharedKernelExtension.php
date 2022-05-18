<?php

declare(strict_types=1);

namespace Tuzex\Bundle\Ddd\SharedKernel\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;

final class DddSharedKernelExtension extends Extension implements PrependExtensionInterface
{
    public function prepend(ContainerBuilder $container): void
    {
        $container->prependExtensionConfig('doctrine', [
            'orm' => [
                'mappings' => [
                    'DddSharedKernelBundle' => [
                        'type' => 'xml',
                        'prefix' => 'Tuzex\Ddd\SharedKernel\Domain',
                    ],
                ],
            ],
        ]);
    }

    public function load(array $configs, ContainerBuilder $container): void
    {
    }
}
