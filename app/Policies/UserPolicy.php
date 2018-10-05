<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the admin can view the model.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the admin can create the model.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the admin can deactivate the model.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function deactivate(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the admin can activate the model.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function activate(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the admin can view the Teacher model.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function applied(User $user)
    {
        return $user->isAdmin();
    }
}
