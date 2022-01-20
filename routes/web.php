<?php

use App\Http\Controllers\Employee\EmployeeController;
use App\Models\Employee;
use Illuminate\Support\Facades\Route;

Route::get('/employee/list', [EmployeeController::class, 'index']);
Route::get('/employee/create', [EmployeeController::class, 'create']);
Route::post('/employee/create', [EmployeeController::class, 'store']);
Route::get('/employee/edit/{id}', [EmployeeController::class, 'edit']);
Route::post('/employee/edit/{id}', [EmployeeController::class, 'update']);
Route::delete('/employee/delete/{id}', [EmployeeController::class, 'delete']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
