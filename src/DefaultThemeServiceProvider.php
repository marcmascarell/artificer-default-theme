<?php namespace Mascame\Artificer;

use Illuminate\Support\ServiceProvider;

class DefaultThemeServiceProvider extends ServiceProvider {

	use AutoPublishable;
	
    protected $name = 'artificer-default-theme';

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
	    Artificer::registerTheme($this->name, function() {
            require_once __DIR__ . '/../resources/views/macros/table.php';
            require_once __DIR__ . '/../resources/views/macros/field.php';

            $this->loadViewsFrom(__DIR__.'/../resources/views', $this->name);

            $this->autoPublishes(function() {
                $this->publishes([
                    __DIR__.'/../public' => public_path('packages/mascame/' . $this->name),
                ], 'public');
            });

            Artificer::assetManager()->add([
                'font-awesome-cdn',
                'bootstrap-css-cdn',

                'https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                'https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-minimal.min.css',

                'packages/mascame/artificer-default-theme/css/app.css',
                'packages/mascame/artificer-default-theme/css/style.css',

                'bootstrap-js-cdn',
                'packages/mascame/artificer-default-theme/js/app.js',
                'packages/mascame/artificer-default-theme/js/artificer.js',
            ]);
        });
    }
}
