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
use App\Http\Middleware\BrowserBack;

Route::middleware(BrowserBack::class)->group(function(){
      //Department
   Route::get('/department/list', [DepartmentController::class, 'index'])->name('department-list')->middleware('auth', 'admin');
   Route::get('/department/create', [DepartmentController::class, 'create'])->name('department-create')->middleware('auth', 'admin');
   Route::post('/department/create', [DepartmentController::class, 'store'])->name('department-store')->middleware('auth', 'admin');
   Route::get('/department/{id}/edit', [DepartmentController::class, 'edit'])->name('department-edit')->middleware('auth', 'admin');
   Route::post('/department/{id}/edit', [DepartmentController::class, 'update'])->name('department-update')->middleware('auth', 'admin');
   Route::delete('/department/{id}/delete', [DepartmentController::class, 'delete'])->name('department-delete')->middleware('auth', 'admin');

   //Salary
   Route::get('/salary/list', [SalaryController::class, 'index'])->name('salary-list')->middleware('auth', 'admin');
   Route::get('/salary/create', [SalaryController::class, 'create'])->name('salary-create')->middleware('auth', 'admin');
   Route::post('/salary/create', [SalaryController::class, 'store'])->name('salary-store')->middleware('auth', 'admin');
   Route::get('/salary/{id}/edit', [SalaryController::class, 'edit'])->name('salary-edit')->middleware('auth', 'admin');
   Route::post('/salary/{id}/edit', [SalaryController::class, 'update'])->name('salary-update')->middleware('auth', 'admin');
   Route::get('/salary/{id}/detial', [SalaryController::class, 'detail'])->name('salary-detail')->middleware('auth', 'admin');
   Route::delete('/salary/{id}/delete', [SalaryController::class, 'delete'])->name('salary-delete')->middleware('auth', 'admin');

   #leave route
   Route::get('/leaves/{id}/create',[LeavesController::class,'create'])->name('leaves-create')->middleware('auth','userId');
   Route::get('/leaves/list',[LeavesController::class,'index'])->name('leaves-list')->middleware('auth', 'admin');
   Route::get('leaves/{id}/edit',[LeavesController::class,'edit'])->name('leaves-edit')->middleware('auth');
   Route::get('leaves/{id}/reason',[LeavesController::class,'reason'])->name('leaves-reason')->middleware('auth');
   Route::get('/leaves/{id}/user',[LeavesController::class,'leavesByUser'])->name('leaves-user')->middleware('auth','userId');

   Route::post('/leaves/store',[LeavesController::class,'store'])->name('leaves-store')->middleware('auth');
   Route::post('leaves/accept/{id}',[LeavesController::class,'accept'])->name('leaves-accept')->middleware('auth', 'admin');
   Route::post('leaves/search',[LeavesController::class,'searchByName'])->name('leaves-searchByName')->middleware('auth', 'admin');
   Route::delete('leaves/delete/{id}',[LeavesController::class,'delete'])->name('leaves-delete')->middleware('auth');
   Route::put('leaves/update/{id}',[LeavesController::class,'update'])->name('leaves-update')->middleware('auth');

   //Employee
   Route::get('/employee', [EmployeeController::class, 'index'])->name('employee-list')->middleware('auth', 'admin');
   Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employee-create')->middleware('auth', 'admin');
   Route::post('/employee/create', [EmployeeController::class, 'store'])->name('employee-store')->middleware('auth', 'admin');
   Route::get('/employee/{id}/edit', [EmployeeController::class, 'edit'])->name('employee-edit')->middleware('auth','admin');
   Route::post('/employee/{id}/edit', [EmployeeController::class, 'update'])->name('employee-update')->middleware('auth', 'admin');
   Route::delete('/employee/{id}/delete', [EmployeeController::class, 'delete'])->name('employee-delete')->middleware('auth', 'admin');
   Route::get('/employee/search', [EmployeeController::class, 'search'])->name('employee-search')->middleware('auth', 'admin');
   Route::post('/employee/search', [EmployeeController::class, 'postSearch'])->name('employee-post-search')->middleware('auth', 'admin');

   //auth route
   Route::get('auth/reset-password',[ForgotPasswordController::class,'index'])->name('reset-password');
   Route::get('auth/change-password/{token}',[ForgotPasswordController::class,'changePassword'])->name('change-password');
   Route::post('auth/change-password',[ForgotPasswordController::class,'postChangePassword'])->name('post-change-password');
   Route::post('auth/mail-send',[ForgotPasswordController::class,'postMail'])->name('post-mail');

   //Login Logout
   Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('login');
   Route::post('/login', [AuthController::class, 'postLogin'])->name('login-post'); 
   Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

   //Export
   Route::get('/export', [EmployeeController::class, 'export'])->name('export')->middleware('auth', 'admin');

   //Employee Profile
   Route::get('/employee/{id}/list', [EmployeeController::class, 'profile'])->name('employee-profile')->middleware('auth','userId');
});