# Asserts Manifest for Spryker
[![Build Status](https://travis-ci.org/fond-of/spryker-assets-manifest.svg?branch=master)](https://travis-ci.org/fond-of/spryker-assets-manifest)
[![PHP from Travis config](https://img.shields.io/travis/php-v/symfony/symfony.svg)](https://php.net/)
[![license](https://img.shields.io/github/license/mashape/apistatus.svg)](https://packagist.org/packages/fond-of-spryker/assets-manifest)

Use the Assets Manifest JSON File in Spryker for cache busting


## Installation

```
composer require fond-of-spryker/assets-mannifest
```

## 1. Add neccessary npm package in the package.json and install the package

```
 "webpack-assets-manifest"
```

## 2. trigger the console command to build yves
```
vendor/bin/console frontend:yves:build
```

## 3. add the webpack-assets-manifest package in the webpack configuration file "development.js"
```
  const WebpackAssetsManifest = require('webpack-assets-manifest');
  
  new WebpackAssetsManifest({
        publicPath: true
    })
    
```

## 4. Add twig service provider to YvesBootstrap.php in registerServiceProviders()

```
$this->application->register(new AssetsManifestTwigServiceProvider());
```

## 4. Add the Twig Extension in the neccessary Twig Templates

```
  {{ assetsManifest('app.js') }}
```