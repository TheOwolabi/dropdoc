<?php

namespace App\Policies;

use App\Models\Filiere;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FilierePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Filiere  $filiere
     * @return mixed
     */
    public function view(User $user, Filiere $filiere)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->is_admin;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Filiere  $filiere
     * @return mixed
     */
    public function update(User $user, Filiere $filiere)
    {
        return $user->is_admin;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Filiere  $filiere
     * @return mixed
     */
    public function delete(User $user, Filiere $filiere)
    {
        return $user->is_admin;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Filiere  $filiere
     * @return mixed
     */
    public function restore(User $user, Filiere $filiere)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Filiere  $filiere
     * @return mixed
     */
    public function forceDelete(User $user, Filiere $filiere)
    {
        //
    }
}
