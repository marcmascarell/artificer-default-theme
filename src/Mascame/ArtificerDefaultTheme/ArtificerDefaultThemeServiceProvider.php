<?php

namespace Mascame\ArtificerDefaultTheme;

use Illuminate\Support\ServiceProvider;

class ArtificerDefaultThemeServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('mascame/artificer-default-theme');

        require_once __DIR__.'/../../views/macros/table.php';
        require_once __DIR__.'/../../views/macros/field.php';
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
