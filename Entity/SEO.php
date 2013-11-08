<?php

/*
 * This file is part of the SEOBundle package.
 *
 * (c) Frodosghost <http://frodosghost.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Manhattan\SEOBundle\Entity;

use Manhattan\PublishBundle\Entity\Publish;

/**
 * Manhattan\SEOBundle\Entity\SEO
 *
 * This abstract class is for easy addition of the SEO fields to be used in Entities.
 */
abstract class SEO extends Publish
{

    /**
     * @var string
     */
    protected $pageTitle;

    /**
     * @var text
     */
    protected $metaKeywords;

    /**
     * @var text
     */
    protected $metaDescription;


    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Set SEO fields
     */
    public function getSeo()
    {
        return array(
            'pageTitle' => $this->getPageTitle(),
            'metaKeywords' => $this->getMetaKeywords(),
            'metaDescription' => $this->getMetaDescription()
        );
    }

    /**
     * Set SEO fields
     *
     * @param  array $seo
     * @return SEO
     */
    public function setSeo(array $seo)
    {
        $this->setPageTitle(isset($seo['pageTitle']) ? $seo['pageTitle'] : null);
        $this->setMetaKeywords(isset($seo['metaKeywords']) ? $seo['metaKeywords'] : null);
        $this->setMetaDescription(isset($seo['metaDescription']) ? $seo['metaDescription'] : null);

        return $this;
    }

    /**
     * Set pageTitle
     *
     * @param  string $pageTitle
     * @return SEO
     */
    public function setPageTitle($pageTitle)
    {
        $this->pageTitle = $pageTitle;
        return $this;
    }

    /**
     * Get pageTitle
     *
     * @return string
     */
    public function getPageTitle()
    {
        return $this->pageTitle;
    }

    /**
     * Set metaKeywords
     *
     * @param  string $metaKeywords
     * @return SEO
     */
    public function setMetaKeywords($metaKeywords)
    {
        $this->metaKeywords = $metaKeywords;
        return $this;
    }

    /**
     * Get metaKeywords
     *
     * @return string
     */
    public function getMetaKeywords()
    {
        return $this->metaKeywords;
    }

    /**
     * Set metaDescription
     *
     * @param  string $metaDescription
     * @return SEO
     */
    public function setMetaDescription($metaDescription)
    {
        $this->metaDescription = $metaDescription;
        return $this;
    }

    /**
     * Get metaDescription
     *
     * @return string
     */
    public function getMetaDescription()
    {
        return $this->metaDescription;
    }

}
