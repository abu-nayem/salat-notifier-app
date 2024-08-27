<?php

namespace SalatNotifier;

use Illuminate\Support\ServiceProvider;
use SalatNotifier\Interfaces\SalatTimeManagerInterface;
use SalatNotifier\Repositories\SalatTimeManagerRepository;

class SalatNotifierServiceProvider extends ServiceProvider
{

    public function register()
    {
        // Bind the interface to the concrete implementation
        $this->app->bind(SalatTimeManagerInterface::class, SalatTimeManagerRepository::class);

        $this->commands([
            Commands\SendSalatNotifications::class,
        ]);
    }

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/Database/Migrations');
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'SalatNotifier');

        $this->publishes([
            __DIR__ . '/Config/salat-notifier.php' => config_path('salat-notifier.php'),
            __DIR__ . '/resources/views' => resource_path('views/vendor/SalatNotifier')
        ]);
    }
}
