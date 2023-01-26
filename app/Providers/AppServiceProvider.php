<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Routing\ResourceRegistrar as BaseResourceRegistrar;
// use Illuminate\Routing\ResourceRegistrar;
// use App\ResourceRegistrar;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
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
