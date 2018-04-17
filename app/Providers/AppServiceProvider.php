<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Device;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('pages.devices', function($view){
            $view->with('devices', Device::findDevices());
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
