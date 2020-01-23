<?php

namespace FondOfSpryker\Yves\AssetsManifest\Twig;

use FondOfSpryker\Shared\AssetsManifest\AssetsManifestConstants;
use Spryker\Shared\Twig\TwigExtension;
use Spryker\Shared\Config\Config;
use Twig\Environment;
use Twig_SimpleFunction;

class AssetsManifestTwigExtension extends TwigExtension
{
    const FUNCTION_GET_ASSETS_MANIFEST_PATH = 'assetsManifest';
    const MANIFEST_FILE = 'manifest.json';

    /**
     * @return array
     */
    public function getFunctions()
    {
        return [
            $this->createAssetsManifestFunction(),
        ];
    }

    /**
     * @return \Twig_SimpleFunction
     */
    protected function createAssetsManifestFunction()

    {
        return new Twig_SimpleFunction(
            static::FUNCTION_GET_ASSETS_MANIFEST_PATH, function ($relativePath) {
            return $this->getAssetsPath($relativePath);
        },[
            $this,
            self::FUNCTION_GET_ASSETS_MANIFEST_PATH,
        ]);
    }

    /**
     * @return string
     */
    protected function getPublicFolderPath(): string
    {
        return '/assets/' .  Config::get(AssetsManifestConstants::PACKAGE);
    }

    /**
     * return string;
     */
    public function getAssetsPath($relativePath)
    {
        $assetsPath = "";
        $manifestFilePath = sprintf(
            '%s/public/Yves%s/%s',
            APPLICATION_ROOT_DIR,
            $this->getPublicFolderPath(),
            self::MANIFEST_FILE
        );


        if (!file_exists($manifestFilePath)) {
            return $assetsPath;
        }

        $manifest = json_decode(file_get_contents($manifestFilePath), true);

        if (!array_key_exists($relativePath, $manifest)) {
            return $assetsPath;
        }

        return $manifest[$relativePath];
    }
}
