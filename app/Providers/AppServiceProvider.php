<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Dao Registration
        $this->app->bind('App\Contracts\Dao\Department\DepartmentDaoInterface', 'App\Dao\Department\DepartmentDao');

        // Business logic registration
        $this->app->bind('App\Contracts\Services\Department\DepartmentServiceInterface', 'App\Services\Department\DepartmentService');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
