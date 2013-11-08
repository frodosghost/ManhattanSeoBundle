<?php

/*
 * This file is part of the SEOBundle package.
 *
 * (c) Frodosghost <http://frodosghost.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Manhattan\SEOBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SEOType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pageTitle', 'text', array(
                'label' => 'Page Title',
                'help_block' =>  'Use this field to specify a HTML Page title, which is displayed in the top of the browser.'
            ))
            ->add('metaKeywords', 'textarea', array(
                'label' => 'Meta Keywords',
                'help_block' => 'Meta Keywords are comma separated phrases that are used within the templates to assist with Google Adwords.'
            ))
            ->add('metaDescription', 'textarea', array(
                'label' => 'Meta Description',
                'help_block' => 'Use this field to specify a Meta Description for the page.'
            ))
        ;
    }

    public function getName()
    {
        return 'seo_fields';
    }

}
