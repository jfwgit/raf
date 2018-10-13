<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @return bool
     */
    public function view(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can create the model.
     *
     * @param User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can deactivate the model.
     *
     * @param User $user
     * @return bool
     */
    public function deactivate(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can activate the model.
     *
     * @param User $user
     * @return bool
     */
    public function activate(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @return bool
     */
    public function applied(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can edit the model
     *
     * @param User $user
     * @return bool
     */
    public function edit(User $user): bool
    {
        return $user->isAdmin();
    }
}
