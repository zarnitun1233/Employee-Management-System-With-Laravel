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
        $this->app->bind('App\Contracts\Dao\Employee\EmployeeDaoInterface', 'App\Dao\Employee\EmployeeDao');
        $this->app->bind('App\Contracts\Dao\Salary\SalaryDaoInterface', 'App\Dao\Salary\SalaryDao');

        // Business logic registration
        $this->app->bind('App\Contracts\Services\Salary\SalaryServiceInterface', 'App\Services\Salary\SalaryService');
        $this->app->bind('App\Contracts\Dao\Leaves\LeavesDaoInterface', 'App\Dao\Leaves\LeavesDao');

        // Business logic registration
        $this->app->bind('App\Contracts\Services\Employee\EmployeeServiceInterface', 'App\Services\Employee\EmployeeService');
        $this->app->bind('App\Contracts\Services\Leaves\LeavesServiceInterface', 'App\Services\Leaves\LeavesService');
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
