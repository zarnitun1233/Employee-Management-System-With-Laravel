<?php

use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Leaves\LeavesController;

use Illuminate\Support\Facades\Route;

Route::get('/',function(){
   return view('welcome');
});

Route::get('/employee/list', [EmployeeController::class, 'index']);

#leave route
Route::get('/leaves/create/{id}',[LeavesController::class,'create'])->name('leaves.create');
Route::get('/leaves/list',[LeavesController::class,'index'])->name('leaves.list');
Route::get('leaves/edit/{id}',[LeavesController::class,'edit'])->name('leaves.edit');

Route::post('/leaves/store',[LeavesController::class,'store'])->name('leaves.store');
Route::post('leaves/accept/{id}',[LeavesController::class,'accept'])->name('leaves.accept');

Route::delete('leaves/delete/{id}',[LeavesController::class,'delete'])->name('leaves.delete');

Route::put('leaves/update/{id}',[LeavesController::class,'update'])->name('leaves.update');



