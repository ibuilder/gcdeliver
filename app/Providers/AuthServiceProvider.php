<?php

namespace App\Providers;

use App\Models\Dashboard;
use App\Policies\DashboardPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Dashboard::class => DashboardPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('is-admin', function ($user) {
            return $user->role->name === 'admin';
        });

        Gate::define('manage-users', function ($user) {
            return $user->role->name === 'admin';
        });

        Gate::define('manage-projects', function ($user) {
            return in_array($user->role->name, ['admin', 'manager']);
        });

        Gate::define('view-reports', function ($user) {
            return in_array($user->role->name, ['admin', 'manager', 'Owner']);
        });
    }
}