<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployerController;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/employee/login','employee.index')->name('employee.login');
Route::view('/employee/registration','employee.registration')->name('employee.register');
Route::post('/employee/register/post/data',[EmployeeController::class,'index'])->name('employee.registeration');
Route::post('/employee/login/post/data',[EmployeeController::class,'login'])->name('employee.login.post');
Route::view('/employee/dashboard','employee.auth.dashboard')->name('employee.dashboard')->middleware('auth:web');
Route::post('employee/logout',[EmployeeController::class,'logout'])->name('logout');


Route::view('/employer/login','employer.index')->name('employer.login');
Route::view('/employer/registration','employer.registration')->name('employer.register');
Route::post('/employer/register/post/data',[EmployerController::class,'index'])->name('employer.registration');
Route::post('/employer/login/post/data',[EmployerController::class,'login'])->name('employer.login.post');
Route::view('/employer/dashboard','employer.auth.dashboard')->name('employer.dashboard')->middleware('auth:employer');
Route::post('/employer/logout',[EmployerController::class,'logout'])->name('logout');
