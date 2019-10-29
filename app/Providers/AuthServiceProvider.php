<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        'App\User' => 'Modules\Admin\Policies\UserPolicy',
        'App\Post' => 'Modules\Admin\Policies\PostPolicy',
        'Spatie\Permission\Models\Role' => 'Modules\Admin\Policies\RolePolicy',
        'Spatie\Permission\Models\Permission' => 'Modules\Admin\Policies\PermissionPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
