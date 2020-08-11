<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         'App\Model\Caracterizacion\Caracterizacion' => 'App\Policies\CaracterizacionPolicy',
         'App\User' => 'App\Policies\UserPolicy',
         'App\Model\Reporte\Reporte' => 'App\Policies\ReportePolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
