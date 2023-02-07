<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Routing\ResourceRegistrar as BaseResourceRegistrar;
// use Illuminate\Routing\ResourceRegistrar;
// use App\ResourceRegistrar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $setting = DB::table('settings')->get();
        $settingArray = [];
        foreach($setting as $s){
            $settingArray[$s->option] = $s->value;
        }
        View::share('setting', $settingArray);
        // $this->app->bind(BaseResourceRegistrar::class, ResourceRegistrar::class);
    }
}
