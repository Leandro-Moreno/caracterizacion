<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /* Solución a la migración del –users_email_unique(email)-- */
        Schema::defaultStringLength(191);
        
        if($this->app->environment('production')) {
            \URL::forceScheme('https');
        }
    }
}
