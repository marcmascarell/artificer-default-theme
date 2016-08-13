<?php namespace Mascame\Artificer;

use Illuminate\Support\ServiceProvider;

class DefaultThemeServiceProvider extends ServiceProvider {

	use AutoPublishable;
	
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

        Artificer::assetManager()->add([
            '//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css',
            '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css',
            'packages/mascame/artificer-default-theme/css/app.css',
            'packages/mascame/artificer-default-theme/css/style.css',

            'packages/mascame/artificer-default-theme/js/bootstrap.min.js',
            'packages/mascame/artificer-default-theme/js/app.js',
            'packages/mascame/artificer-default-theme/js/artificer.js',
        ]);
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{

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
