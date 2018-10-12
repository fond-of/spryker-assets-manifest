<?php

namespace FondOfSpryker\Yves\AssetsManifest;

use FondOfSpryker\Yves\AssetsManifest\Twig\AssetsManifestTwigExtension;
use Spryker\Yves\Kernel\AbstractFactory;


class AssetsManifestFactory extends AbstractFactory
{
    /**
     * @return \FondOFSpryker\Yves\AssetsManifest\Twig\AssetsManifestTwigExtension
     */
    public function createAssetsManifestTwigExtension(): AssetsManifestTwigExtension
    {
        return new AssetsManifestTwigExtension();
    }

}