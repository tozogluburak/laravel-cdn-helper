# Laravel Cdn Helper

This package provides a simple way to integrate CDN support into your Laravel application.

## Installation

1. Add the package to your project via Composer:

    ```bash
    composer require tozogluburak/laravel-cdn-helper:^1.8
    ```

2. Publish the package's configuration file:

    ```bash
    php artisan vendor:publish --provider="tozogluburak\CdnHelper\Discovery\CdnHelperDiscovery"
    ```

3. After installation, the package will automatically add the CDN helper function to your project.

## Configuration

The standard `asset()` function will be called if no CDN URLs are defined in the `./config/app.php` config file.

### Define the CDN URLs in the `./config/app.php` file:

Add the following configuration to your `app.php` file:

```php
<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Application CDN domains
    |--------------------------------------------------------------------------
    |
    | Specify different domains for your assets.
    |
    */
    'cdn' => [
        "cdn.example.com" => "",
    ],
];
