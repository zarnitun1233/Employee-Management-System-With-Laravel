<?php

use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Salary\SalaryController;
use Illuminate\Support\Facades\Route;

Route::get('/employee/list', [EmployeeController::class, 'index']);
Route::get('/salary/list', [SalaryController::class, 'index']);
Route::get('/salary/create', [SalaryController::class, 'create']);
Route::post('/salary/create', [SalaryController::class, 'store']);
Route::get('/salary/edit/{id}', [SalaryController::class, 'edit']);