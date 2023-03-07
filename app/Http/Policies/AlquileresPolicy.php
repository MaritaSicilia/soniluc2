<?php

namespace App\Policies;

use App\Models\Alquileres;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LibrosPolicy
{

    use HandlesAuthorization;
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Alquileres $alquileres)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Alquileres $alquileres)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Alquileres $alquileres)
    {
        return in_array($alquileres->rol, ['usuario']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Alquileres $alquileres)
    {
        return in_array($user->rol, ['usuario']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Alquileres $alquileres)
    {
        return in_array($user->rol, ['usuario']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Alquileres $alquileres)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Alquileres $alquileres)
    {
        //
    }
}
