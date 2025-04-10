<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobController;

Route::get('/', function () {
    return view('welcome');
});
//-----------------------------------------------------------------------------
Route::view('/employee/login','employee.index')->name('employee.login');
Route::view('/employee/registration','employee.registration')->name('employee.register');
Route::post('/employee/register/post/data',[EmployeeController::class,'index'])->name('employee.registeration');
Route::post('/employee/login/post/data',[EmployeeController::class,'login'])->name('employee.login.post');
Route::view('/employee/dashboard','employee.auth.dashboard')->name('employee.dashboard')->middleware('auth:web');
Route::post('employee/logout',[EmployeeController::class,'logout'])->name('employee.logout');
Route::view('/employee/main/content','employee.auth.layout.sections.main_content')->name('employee.main')->middleware('auth:web');
Route::view('/employee/test/content','test')->name('employee.test')->middleware('auth:web');
Route::get('/employee/listing/jobs',[JobController::class,'jobForEmployee'])->name('employee.job.list')->middleware('auth:web');








//------------------------------------------------------------------------------
Route::view('/employer/login','employer.index')->name('employer.login');
Route::view('/employer/registration','employer.registration')->name('employer.register');
Route::post('/employer/register/post/data',[EmployerController::class,'index'])->name('employer.registration');
Route::post('/employer/login/post/data',[EmployerController::class,'login'])->name('employer.login.post');
Route::get('/employer/dashboard',[JobController::class,'showJobs'])->name('employer.dashboard')->middleware('auth:employer');
Route::post('/employer/logout',[EmployerController::class,'logout'])->name('logout');
Route::get('/employer/post/new/job',[EmployerController::class,'JobType'])->name('employer.post.job')->middleware('auth:employer');
Route::post('/employer/check/authentication/job/post',[JobController::class,'store'])->name('job.store.post')->middleware('auth:employer');
Route::get('/employer/edit/job/post/{id}',[JobController::class,'updateForm'])->name('edit.job.post')->middleware('auth:employer');
Route::post('/employer/update/post/{id}',[JobController::class,'update'])->name('employer.update.post')->middleware('auth:employer');




//----------------------------------------------------------------------------
Route::view('/test','test')->name('test');
