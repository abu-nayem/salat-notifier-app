<?php

namespace SalatNotifier;

use Illuminate\Support\ServiceProvider;

class SalatNotifierServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/Config/salat-notifier.php', 'salat-notifier');
    }

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/Database/Migrations');
        $this->publishes([
            __DIR__.'/Config/salat-notifier.php' => config_path('salat-notifier.php'),
        ]);
    }
}
