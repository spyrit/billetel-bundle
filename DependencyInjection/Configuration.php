<?php

namespace Spyrit\BilletelBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $treeBuilder->root('billetel', 'array')
            ->children()
            ->scalarNode('api_authorization')->cannotBeEmpty()->isRequired()->end()
            ->scalarNode('api_desk')->cannotBeEmpty()->isRequired()->end()
            ->scalarNode('api_url')->cannotBeEmpty()->isRequired()->end()
            ->scalarNode('api_booking_url')->cannotBeEmpty()->isRequired()->end()
            ->end();
        return $treeBuilder;
    }
}
