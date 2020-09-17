<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Auth;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return false;
    }


    public function updateByRol(User $user)
    {
        if($user->rol_id >= 4){

                return true;
        }

        return false;
    }
    public function update_status(User $user)
    {
        if($user->rol_id >= 4){

                return true;
        }

        return false;
    }

    public function viewbyRolUser(User $user, User $userview)
    {
        if($user->rol_id >= 2){
            if($userview->unidad_id == $user->unidad_id || $user->rol_id >= 3 ){

                return true;
            }
        }

        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function view(User $user)
    {
        if($user->rol_id > 4){

            return true;
        }
        Response::deny('You do not own this post.');
        return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function updateDashboard(User $user, $ultimousuario)
    {
        $ultimousuario = Auth::User();
        if($user->rol_id >= 2){
            if($ultimousuario->unidad_id == $user->unidad_id || $user->rol_id >= 2 ){
                return true;
            }
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function delete(User $user, User $model)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function restore(User $user, User $model)
    {
        return false;
    }

    /**
     * Determine whether the user can view the caracterizacion.
     *
     * @param  \App\User  $user
     * @param  \App\App\Model\Caracterizacion\Caracterizacion  $caracterizacion
     * @return mixed
     */
    public function viewSidebarAdmin(User $user)
    {

        if($user->rol_id >= 3){
            return true;
        }
        return false;


    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function forceDelete(User $user, User $model)
    {
        return false;
    }
}
