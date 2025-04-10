<?php

namespace FathihFaiz\MapsSuite;

use Illuminate\Support\ServiceProvider;
use FathihFaiz\MapsSuite\Components\Leaflet;
use FathihFaiz\MapsSuite\Components\Google;
use FathihFaiz\MapsSuite\Components\Mapbox;

class MapsSuiteServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/mapsuite.php', 'mapsuite');

        // Register the main class to use with the facade
        $this->app->singleton('mapsuite', function () {
            return new MapsSuite;
        });
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/mapsuite.php' => config_path('mapsuite.php'),
            ], 'maps-config');

            // Publishing the views.
            $this->publishes([
                __DIR__ . '/../resources/views/components' => resource_path('views/vendor/maps/components'),
            ], 'maps-views');
        }
        $this->loadViewComponentsAs('maps', [
            Leaflet::class,
            Google::class,
            Mapbox::class,
        ]);

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'maps');
        $this->mergeConfigFrom(__DIR__ . '/../config/mapsuite.php', 'maps');
    }
}
