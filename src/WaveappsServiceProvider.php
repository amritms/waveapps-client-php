<?php


namespace Amritms\WaveappsClientPhp;


use Illuminate\Support\ServiceProvider;

class WaveappsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/config.php' => config_path('waveapps.php'),
        ]);
    }

    public function register()
    {
        parent::register();

        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'waveapps');

        // Register the main class to use with the facade
        $this->app->singleton('waveapps', function () {
            return new Amritms\WaveappsClientPhp\Waveapps;
        });
    }
}
