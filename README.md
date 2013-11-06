ManhattanSeoBundle
==================

Enable SEO editable fields to bundles within the Manhattan System.

## How

1. Add this bundle to the composer file:

        {
            "require": {
                ...
                "manhattan/seo-bundle": "dev-master"
            }
        }

2. Add this bundle to your app kernel:

        // app/AppKernel.php
        public function registerBundles()
        {
            return array(
                // ...
                new Manhattan\Bundle\ConsoleBundle\ManhattanConsoleBundle(),
                new Manhattan\PublishBundle\ManhattanPublishBundle(),
                new Manhattan\SEOBundle\ManhattanSEOBundle(),
                // ...
            );
        }
