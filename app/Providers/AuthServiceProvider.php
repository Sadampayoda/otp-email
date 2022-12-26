<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
// use Illuminate\Auth\Access\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
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

        Gate::define('siswa',function(User $user){
            return $user->level === 'siswa';
        });

        Gate::define('admin',function(User $user){
            return $user->level === 'admin';
        });

        Gate::define('guru',function(User $user){
            return $user->level === 'guru';
        });

        Gate::define('TU',function(User $user){
            return $user->level === 'TU';
        });
    }
}
