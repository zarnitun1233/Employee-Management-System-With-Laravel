<?php

use App\Http\Controllers\Department\DepartmentController;
use App\Models\Department;
use Illuminate\Support\Facades\Route;

Route::get('/department/list', [DepartmentController::class, 'index']);
Route::get('/department/create', [DepartmentController::class, 'create']);
Route::post('/department/create', [DepartmentController::class, 'store']);
Route::get('/department/edit/{id}', [DepartmentController::class, 'edit']);
Route::post('/department/edit/{id}', [DepartmentController::class, 'update']);
Route::delete('/department/delete/{id}', [DepartmentController::class, 'delete']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');