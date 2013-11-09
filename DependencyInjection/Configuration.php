<?php

/*
 * This file is part of the SEOBundle package.
 *
 * (c) Frodosghost <http://frodosghost.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Manhattan\SEOBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('manhattan_seo');

        $rootNode
            ->addDefaultsIfNotSet()
            ->children()
                ->scalarNode('keywords')
                    ->defaultValue('default, keywords')
                    ->info('Sets default keywords to be used as fall back for meta keywords.')
                    ->end()
                ->scalarNode('description')
                    ->defaultValue('Meta Description')
                    ->info('Sets default description to be used as fall back for meta keywords.')
                    ->end()
                ->scalarNode('title')
                    ->defaultValue('Page Title')
                    ->info('Sets default title to be used as fall back for meta title.')
                    ->end()
            ->end()
        ->end();

        return $treeBuilder;
    }
}
