<?php

namespace tozogluBurak\CdnHelper\Providers;

use Illuminate\Support\ServiceProvider;
use tozogluburak\CdnHelper\Discovery\CdnHelperDiscovery;

class CdnHelperServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/cdn.php', 'cdn'
        );
        $this->app->singleton(CdnHelperDiscovery::class);
    }
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/cdn.php' => config_path('cdn.php'),
        ], 'cdn-config');
    }
}