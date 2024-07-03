<?php

namespace BeeDelivery\LaravelIfood\Providers;

use BeeDelivery\LaravelIfood\LaravelIfood;
use Illuminate\Support\ServiceProvider;

class LaravelIfoodServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/laravelifood.php' => config_path('laravelifood.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/laravelifood.php', 'laravelifood');

        // Register the service the package provides.
        $this->app->singleton('laravelifood', function ($app) {
            return new LaravelIfood;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laraifood'];
    }
}
