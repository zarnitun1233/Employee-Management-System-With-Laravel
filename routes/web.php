<?php

use App\Http\Controllers\Employee\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/employee/list', [EmployeeController::class, 'index']);
Route::get('/employee/create', [EmployeeController::class, 'create']);