<?php

use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Salary\SalaryController;
use Illuminate\Support\Facades\Route;

Route::get('/employee/list', [EmployeeController::class, 'index']);
Route::get('/salary/list', [SalaryController::class, 'index']);