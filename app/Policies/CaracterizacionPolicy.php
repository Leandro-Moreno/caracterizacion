<?php

namespace App\Policies;

use App\Model\Caracterizacion\Caracterizacion;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class CaracterizacionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any caracterizacions.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        if($user->rol_id >= 2){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the caracterizacion.
     *
     * @param  \App\User  $user
     * @param  \App\App\Model\Caracterizacion\Caracterizacion  $caracterizacion
     * @return mixed
     */
    public function view(User $user)
    {

        if($user->rol_id >= 2){
            return true;
        }
        return false;

    }

    

    /**
     * Determine whether the user can create caracterizacions.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if($user->rol_id >= 4 ||  $user->rol_id == 2){
            return true;
        }
       
        return false;
    }

    /**
     * Determine whether the user can update the caracterizacion.
     *
     * @param  \App\User  $user
     * @param  \App\App\Model\Caracterizacion\Caracterizacion  $caracterizacion
     * @return mixed
     */
    public function update(User $user)
    {
        return true;
    }
    public function edit(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function updateDashboard(User $user, $envio)
    {
        $envio = User::find($envio->id);
        if($user->rol_id >= 2){
            if($envio->unidad_id == $user->unidad_id || $user->rol_id >= 2 ){
                return true;
            }
        }
        return false;
    }


    public function viewByRoleCaracterizacion(User $user){
        if($user->rol_id == 2 || $user->rol_id == 4 ){
            return true;
        }
    return false ;
    }


    public function editPestañaGHDO(User $user)
    {
        if($user->rol_id >= 4 ){
                return true;

        }
        return false;
    }
    public function editPestañaSalud(User $user)
    {
        if($user->rol_id >= 3 ){
                return true;

        }
        return false;
    }

    public function createTab(User $user)
    {
        if($user->rol_id >= 3 ){
                return true;

        }
        return false;
    }


    public function updateu(User $user)
    {
        if($user->rol_id <= 2){
            return false;
        }
        return true;
    }

    /**
     * Determine whether the user can delete the caracterizacion.
     *
     * @param  \App\User  $user
     * @param  \App\App\Model\Caracterizacion\Caracterizacion  $caracterizacion
     * @return mixed
     */
    public function delete(User $user, Caracterizacion $caracterizacion)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the caracterizacion.
     *
     * @param  \App\User  $user
     * @param  \App\App\Model\Caracterizacion\Caracterizacion  $caracterizacion
     * @return mixed
     */
    public function restore(User $user, Caracterizacion $caracterizacion)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the caracterizacion.
     *
     * @param  \App\User  $user
     * @param  \App\App\Model\Caracterizacion\Caracterizacion  $caracterizacion
     * @return mixed
     */
    public function forceDelete(User $user, Caracterizacion $caracterizacion)
    {
        return true;
    }


    /**
     * Determine whether the user can view the caracterizacion.
     *
     * @param  \App\User  $user
     * @param  \App\App\Model\Caracterizacion\Caracterizacion  $caracterizacion
     * @return mixed
     */
    public function importar(User $user)
    {
        if($user->rol_id == 5 || $user->rol_id == 4){
            return true;
        }
        return false;
    }
}
