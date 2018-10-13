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
        'App\Model' => 'App\Policies\ModelPolicy',
        'App\User' => 'App\Policies\UserPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('view-school', 'App\Policies\UserPolicy@view');
        Gate::define('view-teacher', 'App\Policies\UserPolicy@view');
        Gate::define('view-applied', 'App\Policies\UserPolicy@applied');
        Gate::define('create-school', 'App\Policies\UserPolicy@create');
        Gate::define('create-teacher', 'App\Policies\UserPolicy@create');
        Gate::define('edit-school', 'App\Policies\UserPolicy@edit');
        Gate::define('edit-teacher', 'App\Policies\UserPolicy@edit');
        Gate::define('activate-school', 'App\Policies\UserPolicy@activate');
        Gate::define('activate-teacher', 'App\Policies\UserPolicy@activate');
        Gate::define('deactivate-school', 'App\Policies\UserPolicy@deactivate');
        Gate::define('deactivate-teacher', 'App\Policies\UserPolicy@deactivate');
    }
}
