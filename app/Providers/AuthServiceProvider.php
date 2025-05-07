<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\User;
use App\Policies\CategoryPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Category::class => CategoryPolicy::class,
    ];
    
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Gate::define('isAdmin',function(User $user){
            return $user->role==='admin';
        });
        Gate::define('isInterviewer',function(User $user){
            return $user->role==='interviewer';
        });
        Gate::define('isCompany',function(User $user){
            return $user->role==='company';
        });

        Gate::define('canAccessCandidatesAndInterviews',function(User $user){
            return $user->role === 'admin' || $user->role === 'interviewer';
        });
    }
}
