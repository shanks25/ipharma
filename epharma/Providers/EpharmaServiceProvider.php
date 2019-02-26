<?php

namespace Epharma\Providers;

use Illuminate\Support\ServiceProvider;
use Epharma\Lib\Theme;
use Illuminate\Foundation\AliasLoader;

class EpharmaServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        require_once __DIR__ . '/../Lib/Helper.php';
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Theme', function($app)
        {
            return new Theme;
        });

        if (class_exists('Illuminate\Foundation\AliasLoader')) {
            AliasLoader::getInstance()->alias('Theme','Epharma\Lib\ThemeFacade');
        } else {
            class_alias('Epharma\Lib\ThemeFacade', 'Theme');
        }
    }
}
