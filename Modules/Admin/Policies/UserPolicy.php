<?php

namespace Modules\Admin\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
        if ( $user->hasRole('Admin') )
        {
            return true;
        }
    }

    /**
     * Determine whether the user can view the model
     *
     * @param \App\User $authUser
     * @param \App\User $user
     * @return mixed
     */
    public function view(User $authUser, User $user)
    {
        return $authUser->id === $user->id
        || $user->hasPermissionTo('View users');
    }

    /**
     * Determine whether the user can create posts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('Create users');
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param \App\User $authUser
     * @param \App\User $user
     * @return mixed
     */
    public function update(User $authUser, User $user)
    {
        return $authUser->id === $user->id
        || $user->hasPermissionTo('Update users');
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param \App\User $authUser
     * @param \App\User $user
     * @return mixed
     */
    public function delete(User $authUser, User $user)
    {
        return $authUser->id === $user->id
        || $user->hasPermissionTo('Delete users');
    }
}
