<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\HardSkillController;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\SoftSkillController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
})->name('home');

//Auth
Route::get('/register',[CompanyController::class,'companyRegister'])->name('companyregister');
Route::post('/register',[CompanyController::class,'register'])->name('register');
Route::get('/login', function () {
    return view('Auth.login');
})->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/forgetPassword', function () {
    return view('Auth.forgetPassword');
})->name('forgetpassword');
Route::post('/forget', [AuthController::class, 'forgot'])->name('forgot');



Route::get('/resetPassword', function () {
    return view('Auth.resetPassword');
})->name('resetpassword');
Route::post('/resetPassword', [AuthController::class, 'reset'])->name('reset');


//dashboards

// Route::get('/adminDashboard', function () {
//     return view('Admin.index');
// })->name('admindashboard');
// Route::get('/interviewerdashboard', function () {
//     return view('interviewer.index');
// })->name('interviewerdashboard');
Route::get('/dashboard', [AuthController::class,'index'])->name('dashboard')->middleware('auth');


//categories
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');


//soft skills
Route::get('/softskills', [SoftSkillController::class, 'index'])->name('softskills');
Route::post('/softskills', [SoftSkillController::class, 'store'])->name('softskills.store');
Route::get('/softskills/{softSkill}/edit', [SoftSkillController::class, 'edit'])->name('softskills.edit');
Route::put('/softskills/{softSkill}', [SoftSkillController::class, 'update'])->name('softskills.update');
Route::delete('/softskills/{softSkill}', [SoftSkillController::class, 'destroy'])->name('softskills.destroy');


// Route::get('/softskills', function () {
//     return view('Admin.softSkills.index');
// })->name('softskills');
// Route::get('/editsoftskill', function () {
//     return view('Admin.softSkills.editsoftskill');
// })->name('editsoftskill');

//hard skills
Route::get('/hardskills', [HardSkillController::class, 'index'])->name('hardskills');
Route::post('/hardskills', [HardSkillController::class, 'store'])->name('hardskills.store');
Route::get('/hardskills/{hardSkill}/edit', [HardSkillController::class, 'edit'])->name('hardskills.edit');
Route::put('/hardskills/{hardSkill}', [HardSkillController::class, 'update'])->name('hardskills.update');
Route::delete('/hardskills/{hardSkill}', [HardSkillController::class, 'destroy'])->name('hardskills.destroy');
// Route::get('/hardskills', function () {
//     return view('Admin.hardSkills.index');
// })->name('hardskills');
// Route::get('/edithardskill', function () {
//     return view('Admin.hardSkills.edithardskill');
// })->name('edithardskill');


//jobs
Route::get('/jobs', [JobController::class, 'index'])->name('jobs');
Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');
Route::delete('/jobs/{id}', [JobController::class, 'destroy'])->name('jobs.destroy');
Route::get('/editjob', function () {
    return view('Admin.job.editjob');
})->name('editjob');


//candidates

// inclined candidates
Route::get('/inclined', [InterviewController::class,'acceptedCandidates'])->name('inclined');
// declined candidates
Route::get('/declined', [InterviewController::class,'declinedCandidates'])->name('declined');
// Route::get('/declined', function () {
//     return view('candidate.declined');
// })->name('declined');
//candidate informations
Route::get('/candidates/{id}', [CandidateController::class,'show'])->name('candidateinfo');
//candidate list
Route::get('/candidates', [CandidateController::class,'index'])->name('candidates');
Route::delete('/candidates/{id}', [CandidateController::class,'destroy'])->name('candidates.destroy');
Route::post('/candidates', [CandidateController::class, 'store'])->name('candidates.store');
Route::put('/candidates/{candidate}', [CandidateController::class, 'update'])->name('candidates.update');

Route::get('/candidates/{candidate}/view-resume', [CandidateController::class, 'viewResume'])->name('candidates.view-resume');



// interviewer questions
Route::get('/questions', function () {
    return view('interviewer.questions.index');
})->name('questions');

// interviewer evaluations

Route::get('/interviews', [InterviewController::class, 'index'])->name('evaluations');
Route::post('/interviews', [InterviewController::class, 'store'])->name('interviews.store');
Route::delete('/interviews/{interview}', [InterviewController::class, 'destroy'])->name('interviews.destroy');
// Route::get('/evaluations/{interview}', function(){
//     return view('interviewer.evaluations.edit');
// })->name('evaluations.show');
Route::get('/evaluations/{interview}',[InterviewController::class,'show'])->name('evaluations.show');
Route::post('/evaluations',[EvaluationController::class,'store'])->name('evaluations.store');
Route::put('/evaluations/{evaluation}',[EvaluationController::class,'update'])->name('evaluations.update');

// users
// Route::get('/users', function () {
//     return view('users.index');
// })->name('users');
Route::get('/users',[UserController::class,'index'])->name('users');
// Route::get('/profile', function () {
//     return view('users.show');
// })->name('profile');
// Route::get('/profile/{user}',[UserController::class,'show'])->name('profile');
Route::get('/profile/{id}', [UserController::class, 'show'])->name('profile');

Route::get('/editprofile/{id}',[UserController::class,'edit'])->name('editprofile');
Route::put('/editprofile/{id}',[UserController::class,'update'])->name('user.update');


// offer

Route::get('/offers',[OfferController::class,'index'])->name('offers.show');
Route::post('/offers',[OfferController::class,'store'])->name('offers.store');


// callendar
Route::get('/calendar',[CalendarController::class,'index'])->name('calendar.index');

//add new interviewer

Route::post('/interviewer',[AuthController::class,'register'])->name('interviewer.store');
Route::delete('/users/{id}',[UserController::class,'destroy'])->name('interviewer.destroy');