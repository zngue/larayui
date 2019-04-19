<?php

namespace Zngue\Login;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class LoginServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        $router->aliasMiddleware('login', \Zngue\Login\Middleware\LoginMiddleware::class);

        $this->publishes([
            __DIR__.'/Config/login.php' => config_path('login.php'),
        ], 'login_config');

        $this->loadRoutesFrom(__DIR__ . '/Routes/web.php');

        $this->loadRoutesFrom(__DIR__ . '/Routes/api.php');
        $this->loadMigrationsFrom(__DIR__ . '/Migrations');

        $this->loadTranslationsFrom(__DIR__ . '/Translations', 'login');

        $this->publishes([
            __DIR__ . '/Translations' => resource_path('lang/vendor/login'),
        ]);

        $this->loadViewsFrom(__DIR__ . '/Views', 'login');

        $this->publishes([
            __DIR__ . '/Views' => resource_path('views/vendor/login'),
        ]);

        $this->publishes([
            __DIR__ . '/Assets' => public_path('vendor/login'),
        ], 'login_assets');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/Config/login.php', 'login'
        );
    }
}
