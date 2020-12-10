<?php

namespace App\Policies;

use App\Models\Concert;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConcertPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(?User $user)
    {

        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Concert  $concert
     * @return mixed
     */
    public function view(User $user, Concert $concert)
    {
        return $user->hasRole('user');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Concert  $concert
     * @return mixed
     */
    public function update(User $user, Concert $concert)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Concert  $concert
     * @return mixed
     */
    public function delete(User $user, Concert $concert)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Concert  $concert
     * @return mixed
     */
    public function restore(User $user, Concert $concert)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Concert  $concert
     * @return mixed
     */
    public function forceDelete(User $user, Concert $concert)
    {
        //
    }
}
