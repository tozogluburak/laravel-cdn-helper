<?php

namespace tozogluburak\CdnHelper\Discovery;

use Illuminate\Support\ServiceProvider;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\PackageManifest;

class CdnHelperDiscovery extends ServiceProvider
{
    public function boot(Filesystem $filesystem)
    {
        $this->publishes([
            __DIR__.'/../Helpers/CdnHelpers.php' => app_path('Http/Helpers/CdnHelpers.php'),
        ]);

        // Get the package manifest instance
        $manifest = new PackageManifest($filesystem);

        // Register the package
        $manifest->packages()->push('tozogluburak/cdn-helper');
    }
}