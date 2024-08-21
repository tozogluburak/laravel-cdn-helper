<?php

namespace tozogluburak\CdnHelper\Discovery;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Foundation\PackageManifest;

class CdnHelperDiscovery extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../Helpers/CdnHelpers.php' => app_path('Http/Helpers/CdnHelpers.php'),
        ]);

        // Get the package manifest instance
        $manifest = new PackageManifest($this->app);

        // Register the package
        $manifest->packages()->push('tozogluburak/cdn-helper');
    }
}