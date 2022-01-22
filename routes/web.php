<?php

use App\Http\Controllers\Employee\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Leaves\LeavesController;
use App\Http\Controllers\Auth\AuthController;
use App\Models\Employee;

Route::get('/', function() {
   return view('common.master');
});


#leave route
Route::get('/leaves/create/{id}',[LeavesController::class,'create'])->name('leaves.create');
Route::get('/leaves/list',[LeavesController::class,'index'])->name('leaves.list');
Route::get('leaves/edit/{id}',[LeavesController::class,'edit'])->name('leaves.edit');

Route::post('/leaves/store',[LeavesController::class,'store'])->name('leaves.store');
Route::post('leaves/accept/{id}',[LeavesController::class,'accept'])->name('leaves.accept');

Route::delete('leaves/delete/{id}',[LeavesController::class,'delete'])->name('leaves.delete');

Route::put('leaves/update/{id}',[LeavesController::class,'update'])->name('leaves.update');

Route::get('/employee/list', [EmployeeController::class, 'index']);
Route::get('/employee/create', [EmployeeController::class, 'create']);
Route::post('/employee/create', [EmployeeController::class, 'store']);
Route::get('/employee/edit/{id}', [EmployeeController::class, 'edit']);
Route::post('/employee/edit/{id}', [EmployeeController::class, 'update']);
Route::delete('/employee/delete/{id}', [EmployeeController::class, 'delete']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Login Logout
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');