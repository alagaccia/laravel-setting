<?php

namespace Alagaccia\LaravelSettings;

use Illuminate\Support\ServiceProvider;

class LaravelSettingsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/laravel-settings.php',
            'laravel-settings'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Publish configuration file
        $this->publishes([
            __DIR__.'/../config/laravel-settings.php' => config_path('laravel-settings.php'),
        ], 'laravel-settings-config');

        // Publish migration file
        if (! class_exists('CreateSettingsTable')) {
            $timestamp = date('Y_m_d_His', time());
            
            $this->publishes([
                __DIR__.'/../database/migrations/create_settings_table.php.stub' => database_path("migrations/{$timestamp}_create_settings_table.php"),
            ], 'laravel-settings-migrations');
        }
    }
}
