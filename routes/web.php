<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/employee/login','employee.index')->name('employee.login');
Route::view('/employee/registration','employee.registration')->name('employee.register');
Route::post('/employee/register/post/data',[EmployeeController::class,'index'])->name('employee.registeration');
Route::post('/employee/login/post/data',[EmployeeController::class,'login'])->name('employee.login.post');
Route::view('/employee/dashboard','employee.auth.dashboard')->name('employee.dashboard')->middleware('auth');


Route::view('/employer/login','employer.index')->name('employer.login');
Route::view('/employer/registration','employer.registration')->name('employer.register');
