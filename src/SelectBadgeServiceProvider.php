<?php

Namespace Wame\SelectBadge;

use Closure;
use Illuminate\Support\ServiceProvider;

class SelectBadgeServiceProvider extends ServiceProvider
{

    public function boot()
    {

        if ($this->app->runningInConsole()) {
            //export config
            $this->publishes([__DIR__.'/../config' => config_path('')], 'config');
            // Export Model
            $this->publishes([__DIR__.'/../app/Models/Traits/BadgeStatuses.php' => app_path('Models/Traits/BadgeStatuses.php')], 'traits');
            // Export css
            $this->publishes([__DIR__ . '/../resources/css' => resource_path('css')], ['css', 'select-badge']);
            // Export Utils
            $this->publishes([__DIR__ . '/../Utils/Helpers/SelectBadge.php' => app_path('Utils/Helpers/SelectBadge.php')], ['utils', 'select-badge']);
        }

    }

    public function register()
    {

    }

}
