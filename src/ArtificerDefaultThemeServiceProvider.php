<?php namespace Mascame\ArtificerDefaultTheme;

use Illuminate\Support\ServiceProvider;

class ArtificerDefaultThemeServiceProvider extends ServiceProvider {

    protected $name = 'artificer-default-theme';

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
        require_once __DIR__ . '/../resources/views/macros/table.php';
        require_once __DIR__ . '/../resources/views/macros/field.php';

		$this->loadViewsFrom(__DIR__.'/../resources/views', $this->name);

        $this->publishes([
            __DIR__.'/../public' => public_path('packages/mascame/' . $this->name),
        ], 'public');
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
		return array();
	}

}
