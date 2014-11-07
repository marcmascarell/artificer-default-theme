Default theme for Artificer
=========

Default theme for [mascame/artificer](https://github.com/marcmascarell/laravel-artificer/) (Laravel Admin interface)

Usage
----
Require the package

    "mascame/artificer-default-theme": "dev-master"

Add the Service Provider to `app/config` at the bottom of Providers:
```php
'Mascame\ArtificerDefaultTheme\ArtificerDefaultThemeServiceProvider'
```
Publish assets

```sh
php artisan asset:publish mascame/artificer-default-theme
```
Changing the theme
----
Set theme to `app/config/packages/mascame/artificer/admin`.`theme` to `artificer-default-theme` 

License
----

Original theme is made by almsaeedstudio. 

MIT
