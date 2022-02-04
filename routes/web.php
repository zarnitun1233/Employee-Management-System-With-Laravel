<?php

use App\Http\Controllers\Department\DepartmentController;
use App\Models\Department;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Salary\SalaryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Leaves\LeavesController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\AuthController;
use App\Models\Employee;

Route::get('/department/list', [DepartmentController::class, 'index']);
Route::get('/department/create', [DepartmentController::class, 'create']);
Route::post('/department/create', [DepartmentController::class, 'store']);
Route::get('/department/edit/{id}', [DepartmentController::class, 'edit']);
Route::post('/department/edit/{id}', [DepartmentController::class, 'update']);
Route::delete('/department/delete/{id}', [DepartmentController::class, 'delete']);

//Salary
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/salary/list', [SalaryController::class, 'index']);
Route::get('/salary/create', [SalaryController::class, 'create']);
Route::post('/salary/create', [SalaryController::class, 'store']);
Route::get('/salary/edit/{id}', [SalaryController::class, 'edit']);
Route::post('/salary/edit/{id}', [SalaryController::class, 'update']);
Route::get('/salary/detail/{id}', [SalaryController::class, 'detail']);
Route::delete('/salary/delete/{id}', [SalaryController::class, 'delete']);
Route::get('/', function() {
   return view('common.master');
});


#leave route
Route::get('/leaves/create/{id}',[LeavesController::class,'create'])->name('leaves.create')->middleware('auth');
Route::get('/leaves/list/{name}',[LeavesController::class,'index'])->name('leaves.list')->middleware('auth','admin');
Route::get('leaves/edit/{id}',[LeavesController::class,'edit'])->name('leaves.edit')->middleware('auth');
Route::get('/leaves/list',[LeavesController::class,'index'])->name('leaves.list')->middleware('auth');
Route::get('leaves/reason/{id}',[LeavesController::class,'reason'])->name('leaves.reason')->middleware('auth','admin');
Route::get('/leaves/user/{id}',[LeavesController::class,'leavesByUser'])->middleware('auth');

Route::post('/leaves/store',[LeavesController::class,'store'])->name('leaves.store')->middleware('auth');
Route::post('leaves/accept/{id}',[LeavesController::class,'accept'])->name('leaves.accept')->middleware('auth','admin');
Route::post('leaves/search',[LeavesController::class,'searchByName'])->name('leaves.searchByName')->middleware('auth','admin');


Route::delete('leaves/delete/{id}',[LeavesController::class,'delete'])->name('leaves.delete')->middleware('auth');

Route::put('leaves/update/{id}',[LeavesController::class,'update'])->name('leaves.update');

Route::get('/employee/list/', [EmployeeController::class, 'index'])->middleware('auth', 'admin');
Route::get('/employee/create', [EmployeeController::class, 'create']);
Route::post('/employee/create', [EmployeeController::class, 'store']);
Route::get('/employee/edit/{id}', [EmployeeController::class, 'edit']);
Route::post('/employee/edit/{id}', [EmployeeController::class, 'update']);
Route::delete('/employee/delete/{id}', [EmployeeController::class, 'delete']);
Route::get('/employee/search', [EmployeeController::class, 'search'])->name('employee.search');
Route::post('/employee/search', [EmployeeController::class, 'postSearch'])->name('employee.post.search');

//auth route
Route::get('auth/reset-password',[ForgotPasswordController::class,'index'])->name('reset.password');
Route::get('auth/change-password/{token}',[ForgotPasswordController::class,'changePassword'])->name('change.password');
Route::post('auth/change-password',[ForgotPasswordController::class,'postChangePassword'])->name('post.change.password');
Route::post('auth/mail-send',[ForgotPasswordController::class,'postMail'])->name('post.mail');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Login Logout
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

//Export
Route::get('/export', [EmployeeController::class, 'export']);

//Employee Profile
Route::get('/employee/list/{id}', [EmployeeController::class, 'profile'])->middleware('auth');