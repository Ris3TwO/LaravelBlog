<?php

namespace Modules\Admin\Policies;

use App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function view(User $user, Role $role)
    {
        return $user->hasRole('Admin') || $user->hasPermissionTo('View roles');
    }

    public function create(User $user)
    {
        return $user->hasRole('Admin') || $user->hasPermissionTo('Create roles');
    }

    public function update(User $user, Role $role)
    {
        return $user->hasRole('Admin') || $user->hasPermissionTo('Update roles');
    }

    public function delete(User $user, Role $role)
    {
        if($role->id === 1)
        {
            $this->deny('No se puede eliminar este rol');
        }

        return $user->hasRole('Admin') || $user->hasPermissionTo('Delete roles');
    }
}
