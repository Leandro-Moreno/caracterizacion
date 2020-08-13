<?php

namespace App\Policies;

use App\Model\Caracterizacion\Caracterizacion;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

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
        if($user->rol_id == 5 || $user->rol_id == 4 || $user->rol_id == 3 || $user->rol_id == 2){
            Response::allow();
            return true;  
        }
        Response::deny('You do not own this Caracterizacion.');
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
        if($user->rol_id == 5 || $user->rol_id == 4 || $user->rol_id == 3 || $user->rol_id == 2){
            Response::allow();
            return true;  
        }
        Response::deny('You do not own this Caracterizacion.');
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
        if($user->rol_id == 5 || $user->rol_id == 4 ||  $user->rol_id == 2){
            Response::allow();
            return true;  
        }
        Response::deny('You do not own this Caracterizacion.');
        return false;
    }

    /**
     * Determine whether the user can update the caracterizacion.
     *
     * @param  \App\User  $user
     * @param  \App\App\Model\Caracterizacion\Caracterizacion  $caracterizacion
     * @return mixed
     */
    public function update(User $user , $envio)
    {
        $unidaduser = User::find($envio->user_id);
        if($user->rol_id == 5 || $user->rol_id == 4 || $user->rol_id == 3 || $user->rol_id == 2){
            if($unidaduser->unidad_id == $user->unidad_id || $user->rol_id == 5 ||  $user->rol_id == 4 || $user->rol_id == 3 ){
                Response::allow();
                return true;  
            }
        }
        Response::deny('You do not own this Caracterizacion.');
        return false;
    }

    public function editTab(User $user)
    {
        if($user->rol_id == 5 || $user->rol_id == 4 || $user->rol_id == 3 ){
                Response::allow();
                return true;  

        }
        Response::deny('You do not own this Caracterizacion.');
        return false;
    }

    public function createTab(User $user)
    {
        if($user->rol_id == 5 || $user->rol_id == 4 || $user->rol_id == 3 ){
                Response::allow();
                return true;  

        }
        Response::deny('You do not own this Caracterizacion.');
        return false;
    }


    public function updateu(User $user )
    {

        if($user->rol_id == 5 || $user->rol_id == 4 ||  $user->rol_id == 2){
            Response::allow();
                return true;  
        }
        Response::deny('You do not own this Caracterizacion.');
        return false;
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
            Response::allow();
            return true;  
        }
        Response::deny('You do not own this Caracterizacion.');
        return false;
    }
}
