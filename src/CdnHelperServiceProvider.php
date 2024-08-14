<?php

namespace tozogluburak\CdnHelper;

use Illuminate\Support\ServiceProvider;

class CdnHelperServiceProvider extends ServiceProvider {
    public function register() {
        $this->app->singleton('cdn', function () {
            return new \tozogluburak\CdnHelper\Helpers\CdnHelpers;
        });
    }

    public function boot() { 
        
    }
}
