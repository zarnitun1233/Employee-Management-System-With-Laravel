<?php

use App\Http\Controllers\Department\DepartmentController;
use App\Models\Department;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Salary\SalaryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Leaves\LeavesController;
use App\Http\Controllers\Auth\AuthController;
use App\Models\Employee;

Route::get('/department/list', [DepartmentController::class, 'index'])->middleware('auth', 'admin');
Route::get('/department/create', [DepartmentController::class, 'create'])->middleware('auth', 'admin');
Route::post('/department/create', [DepartmentController::class, 'store'])->middleware('auth', 'admin');
Route::get('/department/edit/{id}', [DepartmentController::class, 'edit'])->middleware('auth', 'admin');
Route::post('/department/edit/{id}', [DepartmentController::class, 'update'])->middleware('auth', 'admin');
Route::delete('/department/delete/{id}', [DepartmentController::class, 'delete'])->middleware('auth', 'admin');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth', 'admin');
Route::get('/salary/list', [SalaryController::class, 'index'])->middleware('auth', 'admin');
Route::get('/salary/create', [SalaryController::class, 'create'])->middleware('auth', 'admin');
Route::post('/salary/create', [SalaryController::class, 'store'])->middleware('auth', 'admin');
Route::get('/salary/edit/{id}', [SalaryController::class, 'edit'])->middleware('auth', 'admin');
Route::post('/salary/edit/{id}', [SalaryController::class, 'update'])->middleware('auth', 'admin');
Route::delete('/salary/delete/{id}', [SalaryController::class, 'delete'])->middleware('auth', 'admin');
Route::get('/', function() {
   return view('common.master');
})->middleware('auth', 'admin');


#leave route
Route::get('/leaves/create/{id}',[LeavesController::class,'create'])->name('leaves.create')->middleware('auth');
Route::get('/leaves/list',[LeavesController::class,'index'])->name('leaves.list')->middleware('auth', 'admin');
Route::get('leaves/edit/{id}',[LeavesController::class,'edit'])->name('leaves.edit')->middleware('auth', 'admin');

Route::post('/leaves/store',[LeavesController::class,'store'])->name('leaves.store')->middleware('auth', 'admin');
Route::post('leaves/accept/{id}',[LeavesController::class,'accept'])->name('leaves.accept')->middleware('auth', 'admin');

Route::delete('leaves/delete/{id}',[LeavesController::class,'delete'])->name('leaves.delete')->middleware('auth', 'admin');

Route::put('leaves/update/{id}',[LeavesController::class,'update'])->name('leaves.update')->middleware('auth', 'admin');

Route::get('/employee/list', [EmployeeController::class, 'index'])->middleware('auth', 'admin');
Route::get('/employee/create', [EmployeeController::class, 'create'])->middleware('auth', 'admin');
Route::post('/employee/create', [EmployeeController::class, 'store'])->middleware('auth', 'admin');
Route::get('/employee/edit/{id}', [EmployeeController::class, 'edit'])->middleware('auth', 'admin');
Route::post('/employee/edit/{id}', [EmployeeController::class, 'update'])->middleware('auth', 'admin');
Route::delete('/employee/delete/{id}', [EmployeeController::class, 'delete'])->middleware('auth', 'admin');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth', 'admin');

//Login Logout
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
