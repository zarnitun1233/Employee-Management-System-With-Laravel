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

//Department
Route::get('/department/list', [DepartmentController::class, 'index'])->name('department-list');
Route::get('/department/create', [DepartmentController::class, 'create'])->name('department-create');
Route::post('/department/create', [DepartmentController::class, 'store'])->name('department-store');
Route::get('/department/edit/{id}', [DepartmentController::class, 'edit'])->name('department-edit');
Route::post('/department/edit/{id}', [DepartmentController::class, 'update'])->name('department-update');
Route::delete('/department/delete/{id}', [DepartmentController::class, 'delete'])->name('department-delete');

//Salary
Route::get('/salary/list', [SalaryController::class, 'index'])->name('salary-list');
Route::get('/salary/create', [SalaryController::class, 'create'])->name('salary-create');
Route::post('/salary/create', [SalaryController::class, 'store'])->name('salary-store');
Route::get('/salary/edit/{id}', [SalaryController::class, 'edit'])->name('salary-edit');
Route::post('/salary/edit/{id}', [SalaryController::class, 'update'])->name('salary-update');
Route::get('/salary/detail/{id}', [SalaryController::class, 'detail'])->name('salary-detail');
Route::delete('/salary/delete/{id}', [SalaryController::class, 'delete'])->name('salary-delete');


#leave route
<<<<<<< HEAD
Route::get('/leaves/create/{id}',[LeavesController::class,'create'])->name('leaves.create');
Route::get('/leaves/list/{name}',[LeavesController::class,'index'])->name('leaves.list');
Route::get('leaves/edit/{id}',[LeavesController::class,'edit'])->name('leaves.edit');
Route::get('/leaves/list',[LeavesController::class,'index'])->name('leaves.list');
Route::get('leaves/reason/{id}',[LeavesController::class,'reason'])->name('leaves.reason');
Route::get('/leaves/user/{id}',[LeavesController::class,'leavesByUser']);
=======
Route::get('/leaves/create/{id}',[LeavesController::class,'create'])->name('leaves-create')->middleware('auth');
Route::get('/leaves/list/{name}',[LeavesController::class,'index'])->name('leaves-list');
Route::get('leaves/edit/{id}',[LeavesController::class,'edit'])->name('leaves-edit');
Route::get('/leaves/list',[LeavesController::class,'index'])->name('leaves-list');
Route::get('leaves/reason/{id}',[LeavesController::class,'reason'])->name('leaves-reason');
Route::get('/leaves/user/{id}',[LeavesController::class,'leavesByUser'])->name('leaves-user');
>>>>>>> 145486d18ec01eef53324d345a1a835cb3c1a793

Route::post('/leaves/store',[LeavesController::class,'store'])->name('leaves-store');
Route::post('leaves/accept/{id}',[LeavesController::class,'accept'])->name('leaves-accept');
Route::post('leaves/search',[LeavesController::class,'searchByName'])->name('leaves-searchByName');
Route::delete('leaves/delete/{id}',[LeavesController::class,'delete'])->name('leaves-delete');
Route::put('leaves/update/{id}',[LeavesController::class,'update'])->name('leaves-update');

//Employee
Route::get('/employee/list/', [EmployeeController::class, 'index'])->name('employee-list')->middleware('auth', 'admin');
Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employee-create');
Route::post('/employee/create', [EmployeeController::class, 'store'])->name('employee-store');
Route::get('/employee/edit/{id}', [EmployeeController::class, 'edit'])->name('employee-edit');
Route::post('/employee/edit/{id}', [EmployeeController::class, 'update'])->name('employee-update');
Route::delete('/employee/delete/{id}', [EmployeeController::class, 'delete'])->name('employee-delete');
Route::get('/employee/search', [EmployeeController::class, 'search'])->name('employee-search');
Route::post('/employee/search', [EmployeeController::class, 'postSearch'])->name('employee-post-search');

//auth route
<<<<<<< HEAD
Route::get('auth/reset-password',[ForgotPasswordController::class,'index'])->name('reset.password');
Route::get('auth/change-password/{token}',[ForgotPasswordController::class,'changePassword'])
->name('change.password');
Route::post('auth/change-password',[ForgotPasswordController::class,'postChangePassword'])
->name('post.change.password');
Route::post('auth/mail-send',[ForgotPasswordController::class,'postMail'])->name('post.mail');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
=======
Route::get('auth/reset-password',[ForgotPasswordController::class,'index'])->name('reset-password');
Route::get('auth/change-password/{token}',[ForgotPasswordController::class,'changePassword'])->name('change-password');
Route::post('auth/change-password',[ForgotPasswordController::class,'postChangePassword'])->name('post.change-password');
Route::post('auth/mail-send',[ForgotPasswordController::class,'postMail'])->name('post-mail');
>>>>>>> 145486d18ec01eef53324d345a1a835cb3c1a793

//Login Logout
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('login-post'); 
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

//Export
Route::get('/export', [EmployeeController::class, 'export'])->name('export');

//Employee Profile
Route::get('/employee/list/{id}', [EmployeeController::class, 'profile'])->name('employee-profile')->middleware('auth');