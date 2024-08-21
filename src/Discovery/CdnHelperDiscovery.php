<?php

namespace tozogluburak\CdnHelper\Discovery;

use Illuminate\Support\ServiceProvider;
use Illuminate\Filesystem\Filesystem;


class CdnHelperDiscovery extends ServiceProvider
{
    public function boot(Filesystem $filesystem)
    {
        // Publish the CdnHelpers.php file to the app/Http/Helpers directory
        $this->publishes([
            __DIR__.'/../Helpers/CdnHelpers.php' => app_path('Http/Helpers/CdnHelpers.php'),
        ]);
    }
}