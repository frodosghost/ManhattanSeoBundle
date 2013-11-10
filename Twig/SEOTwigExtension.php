<?php

/*
 * This file is part of the SEOBundle package.
 *
 * (c) Frodosghost <http://frodosghost.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Manhattan\SEOBundle\Twig;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Twig Extension for displaying SEO templates for headers
 *
 * @author James Rickard <james@frodosghost.com>
 */
class SEOTwigExtension extends \Twig_Extension
{
    private $environment;

    private $template;

    private $baseValues;

    private $twig_template;

    /**
     * @param \Twig_Environment $environment
     * @param array             $baseValues
     * @param string            $template
     */
    public function __construct(\Twig_Environment $environment, array $baseValues, $template)
    {
        $this->environment = $environment;
        $this->baseValues = $baseValues;
        $this->template = $template;
    }

    public function getFunctions()
    {
        return array(
            'pageTitle' => new \Twig_Function_Method($this, 'renderPageTitle', array('is_safe' => array('html'))),
            'metaKeywords' => new \Twig_Function_Method($this, 'renderKeywords', array('is_safe' => array('html'))),
            'metaDescription' => new \Twig_Function_Method($this, 'renderDescription', array('is_safe' => array('html')))
        );
    }

    /**
     * Builds and returns Twig Template
     */
    public function getTemplate()
    {
        if (!$this->twig_template instanceof \Twig_Template) {
            $this->twig_template = $this->environment->loadTemplate($this->template);
        }

        return $this->twig_template;
    }

    /**
     * Renders Meta Keywords
     *
     * @param  array   $options
     * @return string
     */
    public function renderKeywords($entity = null, array $options = array())
    {
        $html = $this->getTemplate()->renderBlock('meta_keywords', array(
            'default' => $this->baseValues['keywords'],
            'entity' => $entity,
            'options' => $options
        ));

        return $html;
    }

    /**
     * Renders Meta Description
     *
     * @param  mixed $entity
     * @param  array $options
     * @return string
     */
    public function renderDescription($entity = null, array $options = array())
    {
        // Set reserve words
        if (is_string($entity) && !isset($options['reserve'])) {
            $options['reserve'] = $entity;
        }

        $html = $this->getTemplate()->renderBlock('meta_description', array(
            'default' => $this->baseValues['description'],
            'entity' => (is_object($entity)) ? $entity : null,
            'options' => $options
        ));

        return $html;
    }

    /**
     * Renders Page Title
     *
     * @param  mixed $entity
     * @param  array $options
     * @return string
     */
    public function renderPageTitle($entity = null, array $options = array())
    {
        // Set reserve words
        if (is_string($entity) && !isset($options['reserve'])) {
            $options['reserve'] = $entity;
        }

        $html = $this->getTemplate()->renderBlock('page_title', array(
            'default' => $this->baseValues['description'],
            'entity' => (is_object($entity)) ? $entity : null,
            'options' => $options
        ));

        return $html;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'manhattan_seo_twig';
    }

}
