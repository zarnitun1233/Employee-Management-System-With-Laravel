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
        $this->app->bind('App\Contracts\Dao\Employee\EmployeeDaoInterface', 'App\Dao\Employee\EmployeeDao');
        $this->app->bind('App\Contracts\Dao\Leaves\LeavesDaoInterface', 'App\Dao\Leaves\LeavesDao');
        $this->app->bind('App\Contracts\Dao\Auth\PasswordResetDaoInterface','App\Dao\Auth\PasswordResetDao');

        // Business logic registration
        $this->app->bind('App\Contracts\Services\Employee\EmployeeServiceInterface', 'App\Services\Employee\EmployeeService');
        $this->app->bind('App\Contracts\Services\Leaves\LeavesServiceInterface', 'App\Services\Leaves\LeavesService');
        $this->app->bind('App\Contracts\Services\Auth\PasswordResetServiceInterface','App\Services\Auth\PasswordResetService');

        
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
