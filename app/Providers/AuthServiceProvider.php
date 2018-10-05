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
        Gate::define('create-school', 'App\Policies\UserPolicy@create');
        Gate::define('create-teacher', 'App\Policies\UserPolicy@create');
        Gate::define('deactivate-school', 'App\Policies\UserPolicy@deactivate');
        Gate::define('activate-school', 'App\Policies\UserPolicy@activate');
        Gate::define('view-applied', 'App\Policies\UserPolicy@applied');
    }
}
