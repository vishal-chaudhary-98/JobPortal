<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\PersonalDetailsController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[WelcomeController::class,'index']);
//---------------------------   EMPLOYEE   --------------------------------------------------
Route::view('/employee/login','employee.index')->name('employee.login');
Route::view('/employee/registration','employee.registration')->name('employee.register');
Route::post('/employee/register/post/data',[EmployeeController::class,'index'])->name('employee.registeration');
Route::post('/employee/login/post/data',[EmployeeController::class,'login'])->name('employee.login.post');
Route::post('employee/logout',[EmployeeController::class,'logout'])->name('employee.logout');
Route::view('/employee/main/content','employee.auth.layout.sections.main_content')->name('employee.main')->middleware('auth:web');
Route::get('/employee/dashboard',[JobController::class,'jobForEmployee'])->name('employee.dashboard')->middleware('auth:web');
Route::view('/employee/add/personal/details','employee.auth.layout.sections.personal_details')->name('employee.personal.info')->middleware('auth:web');
Route::get('/employee/update/profile/details',[EmployeeController::class, 'showUpdateForm'])->name('employee.usdate.profile.details')->middleware('auth:web');
Route::post('/employee/update/profile',[EmployeeController::class, 'updateProfile'])->name('employee.update.profile')->middleware('auth:web');
Route::post('/employee/professional/detail/form',[PersonalDetailsController::class,'index'])->name('employee.profesional.details')->middleware('auth:web');
Route::get('/employee/profile',[PersonalDetailsController::class,'show'])->name('employee.profile')->middleware('auth:web');
Route::put('/employee/edit/personal/details',[PersonalDetailsController::class,'updateProfile'])->name('employee.edit.personal.details')->middleware('auth:web');
Route::put('/employee/edit/education',[PersonalDetailsController::class,'updateEducation'])->name('employee.edit.education')->middleware('auth:web');
Route::put('/employee/edit/certification',[PersonalDetailsController::class,'updateCertification'])->name('employee.edit.certification')->middleware('auth:web');
Route::put('/employee/edit/experience',[PersonalDetailsController::class,'updateExperience'])->name('employee.edit.experience')->middleware('auth:web');
Route::get('/employee/view/job/{id}',[JobController::class, 'jobPost'])->name('employee.view.job')->middleware('auth:web');


//------------------------------------------------------------------------------
// Route::post('/employee/test',[PersonalDetailsController::class,'index'])->name('employee.test')->middleware('auth:web');
// Route::view('/employee/view/profile', 'employee.auth.layout.sections.view_profile')->name('employee.view.profile')->middleware('auth:web');
Route::get('/employee/apply/job/{id}',[JobController::class, 'applyJob'])->name('employee.apply.job')->middleware('auth:web');





















//----------------------------------    EMPLOYER    --------------------------------------------
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
Route::view('/employer/view/full/job/post', 'employer.auth.layout.sections.view_job')->name('employer.view.job')->middleware('auth:employer');
Route::get('/employer/single/post',[JobController::class,'singleJobPost'])->name('single.job.post')->middleware('auth:employer');





//----------------------------------------------------------------------------
Route::view('/test','test')->name('test')->middleware('auth:web');
Route::view('/test','test')->name('test')->middleware('auth:employer');


//--------------------------    ADMIN   ---------------------------------------------------

Route::view('/admin/dashboard','admin.index');