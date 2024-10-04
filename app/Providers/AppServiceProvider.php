<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        Gate::define('admin', function (User $user) {
            return $user && $user->is_admin;
        });

        // Gate::define('view-blog', function (User $user, Blog $blog) {
            // return $user->id == $blog->user_id;
            // return $user->is($blog->author);
            // return $user->isNot($blog->author);
        // });
    }
}
