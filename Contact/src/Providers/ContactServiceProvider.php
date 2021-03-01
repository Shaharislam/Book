<?php

namespace Book\Contact\Providers;

use Illuminate\Support\ServiceProvider;

/**
* HelloWorldServiceProvider
*
* @copyright 2020 Webkul Software Pvt. Ltd. (http://www.webkul.com)
*/
class ContactServiceProvider extends ServiceProvider
{
    /**
    * Bootstrap services.
    *
    * @return void
    */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Http/admin-routes.php');

        $this->loadRoutesFrom(__DIR__ . '/../Http/shop-routes.php');

        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'contact_view');

        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'contact_lang');

        $this->loadMigrationsFrom(__DIR__ .'/../Database/Migrations');
    }

    /**
    * Register services.
    *
    * @return void
    */
    public function register()
    {
        $this->mergeConfigFrom(dirname(__DIR__) . '/Config/menu.php', 'menu.admin');
        $this->mergeConfigFrom(dirname(__DIR__) . '/Config/acl.php', 'acl');
    }
}