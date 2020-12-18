<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-users', function($user){
            return $user->hasAnyRoles(['admin']);
        });
        Gate::define('edit-users', function($user){
            return $user->hasAnyRoles(['admin']);
        });
        Gate::define('delete-users', function($user){
            return $user->hasRole('admin');
        });
        Gate::define('manage-analysis', function($user){
            return $user->hasAnyRoles(['admin', 'service']);
        });
        Gate::define('manage-keywords', function($user){
            return $user->hasAnyRoles(['admin', 'service']);
        });
        Gate::define('manage-campaigns', function($user){
            return $user->hasAnyRoles(['admin', 'service']);
        });
        Gate::define('manage-competitors', function($user){
            return $user->hasAnyRoles(['admin', 'service']);
        });
        Gate::define('manage-technical', function($user){
            return $user->hasAnyRoles(['admin', 'service']);
        });
        Gate::define('manage-experiments', function($user){
            return $user->hasAnyRoles(['admin', 'service']);
        });
    }
}
