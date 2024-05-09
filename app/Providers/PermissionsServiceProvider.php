<?php

namespace App\Providers;

use App\Models\CurrentUser;
use App\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class PermissionsServiceProvider extends ServiceProvider
{
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
        View::composer('*', function ($view) {
            $Permission = new Permission();
            $view->with('userPermission', $Permission);
        });
    }
}
