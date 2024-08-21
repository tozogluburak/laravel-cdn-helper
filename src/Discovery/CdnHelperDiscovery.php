<?php

namespace tozogluburak\CdnHelper\Discovery;

use Illuminate\Foundation\PackageDiscovery\Provider;

class CdnHelperDiscovery extends Provider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../helpers/CdnHelpers.php' => app_path('Http/Helpers/CdnHelpers.php'),
        ]);
    }
}