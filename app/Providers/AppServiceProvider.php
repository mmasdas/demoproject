<?php

namespace App\Providers;

use App\Models\Vehicle;
use App\Observers\VehicleObserver;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Vehicle::observe(VehicleObserver::class);

        Blade::if('admin', function () {
            return auth()->user()?->is_admin;
        });
    }
}
