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


        Gate::define('manage-users', function ($user){
            return $user-> hasRole('admin');
        });
        Gate::define('buy-ticket', function ($user){
            return $user-> hasRole('user');
        });
        Gate::define('see-stats', function ($user) {
            return $user-> hasRole('director');
        });
        Gate::define('see-table', function ($user) {
            return !$user-> hasRole('director');
        });
    }
}
