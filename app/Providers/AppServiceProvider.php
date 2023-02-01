<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Routing\ResourceRegistrar as BaseResourceRegistrar;
// use Illuminate\Routing\ResourceRegistrar;
// use App\ResourceRegistrar;
use Illuminate\Support\Facades\Auth;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // // dd(Auth::user());
        // // $role = auth()->user()->roles()->first();
        // $role = auth()->check()?auth()->user()->roles()->first():null;
        // View::share('role', $role?$role->name:'');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->app->bind(BaseResourceRegistrar::class, ResourceRegistrar::class);
    }
}
