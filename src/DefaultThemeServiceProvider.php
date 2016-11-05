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
                    __DIR__.'/../public' => public_path('vendor/admin/extensions/' . $this->name),
                ], 'public');
            });

            Artificer::assetManager()->add([
                'font-awesome-cdn',
                'bootstrap-css-cdn',

                'https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                'https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-minimal.min.css',

                Artificer::getExtensionsAssetsPath('artificer-default-theme/css/skin-blue.min.css'),
                Artificer::getExtensionsAssetsPath('artificer-default-theme/css/AdminLTE.min.css'),
                Artificer::getExtensionsAssetsPath('artificer-default-theme/css/artificer.css'),

                'bootstrap-js-cdn',
                Artificer::getExtensionsAssetsPath('artificer-default-theme/js/AdminLTE.min.js'),
                Artificer::getExtensionsAssetsPath('artificer-default-theme/js/artificer.js'),
            ]);
        });
    }
}
