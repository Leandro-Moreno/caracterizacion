<?php

namespace App\Policies;

use App\Reporte;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ReportePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any reportes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return false; 
    }

    /**
     * Determine whether the user can view the reporte.
     *
     * @param  \App\User  $user
     * @param  \App\Reporte  $reporte
     * @return mixed
     */
    public function view(User $user)
    {
        
        if($user->rol_id == 5 || $user->rol_id == 4  ){
            return true;  
        }
        return false; 
    }

    /**
     * Determine whether the user can create reportes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false; 
    }

    /**
     * Determine whether the user can update the reporte.
     *
     * @param  \App\User  $user
     * @param  \App\Reporte  $reporte
     * @return mixed
     */
    public function update(User $user, Reporte $reporte)
    {
        return true; 
    }

    /**
     * Determine whether the user can delete the reporte.
     *
     * @param  \App\User  $user
     * @param  \App\Reporte  $reporte
     * @return mixed
     */
    public function delete(User $user, Reporte $reporte)
    {
        return false; 
    }

    /**
     * Determine whether the user can restore the reporte.
     *
     * @param  \App\User  $user
     * @param  \App\Reporte  $reporte
     * @return mixed
     */
    public function restore(User $user, Reporte $reporte)
    {
        return false; 
    }

    /**
     * Determine whether the user can permanently delete the reporte.
     *
     * @param  \App\User  $user
     * @param  \App\Reporte  $reporte
     * @return mixed
     */
    public function forceDelete(User $user, Reporte $reporte)
    {
        return false; 
    }
}
