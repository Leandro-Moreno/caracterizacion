<?php

namespace App\Policies;

use App\Model\Caracterizacion\Caracterizacion;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

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
        return true;
    }

    /**
     * Determine whether the user can view the caracterizacion.
     *
     * @param  \App\User  $user
     * @param  \App\App\Model\Caracterizacion\Caracterizacion  $caracterizacion
     * @return mixed
     */
    public function view(User $user, Caracterizacion $caracterizacion)
    {
        return true;
    }

    /**
     * Determine whether the user can create caracterizacions.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the caracterizacion.
     *
     * @param  \App\User  $user
     * @param  \App\App\Model\Caracterizacion\Caracterizacion  $caracterizacion
     * @return mixed
     */
    public function update(User $user, Caracterizacion $caracterizacion)
    {
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
    public function oe(User $user)
    {
        return true;
    }
}
