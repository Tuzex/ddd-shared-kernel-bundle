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
            'dbal' => [
                'types' => [
                    'tuzex.currency' => 'Tuzex\Ddd\SharedKernel\Infrastructure\Persistence\Doctrine\Dbal\Type\Money\CurrencyType',
                    'tuzex.measure_unit' => 'Tuzex\Ddd\SharedKernel\Infrastructure\Persistence\Doctrine\Dbal\Type\Quantity\MeasureUnitType',
                ],
            ],
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
