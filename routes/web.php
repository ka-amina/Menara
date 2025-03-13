<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Route::get('/', function () {
//     return view('welcome');
// });

//Auth
Route::get('/login', function () {
    return view('Auth.login');
})->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/forgetPassword', function () {
    return view('Auth.forgetPassword');
})->name('forgetpassword');
Route::post('/forget', [AuthController::class, 'forgot'])->name('forgot');



Route::get('/resetPassword', function () {
    return view('Auth.resetPassword');
})->name('resetpassword');
Route::post('/resetPassword', [AuthController::class, 'reset'])->name('reset');


//dashboards

Route::get('/adminDashboard', function () {
    return view('Admin.index');
})->name('admindashboard');
Route::get('/interviewerdashboard', function () {
    return view('interviewer.index');
})->name('interviewerdashboard');

//categories
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');


//soft skills

Route::get('/softskills', function () {
    return view('Admin.softSkills.index');
})->name('softskills');
Route::get('/editsoftskill', function () {
    return view('Admin.softSkills.editsoftskill');
})->name('editsoftskill');

//hard skills
Route::get('/hardskills', function () {
    return view('Admin.hardSkills.index');
})->name('hardskills');
Route::get('/edithardskill', function () {
    return view('Admin.hardSkills.edithardskill');
})->name('edithardskill');


//jobs
Route::get('/jobs', function () {
    return view('Admin.job.index');
})->name('jobs');
Route::get('/editjob', function () {
    return view('Admin.job.editjob');
})->name('editjob');


//candidates

// inclined candidates
Route::get('/inclined', function () {
    return view('candidate.inclined');
})->name('inclined');
// declined candidates
Route::get('/declined', function () {
    return view('candidate.declined');
})->name('declined');
//candidate informations
Route::get('/candidate', function () {
    return view('candidate.show');
})->name('candidateinfo');
//candidate list
Route::get('/candidates', function () {
    return view('candidate.index');
})->name('candidates');


// interviewer questions
Route::get('/questions', function () {
    return view('interviewer.questions.index');
})->name('questions');

// interviewer evaluations

Route::get('/evaluations', function () {
    return view('interviewer.evaluations.index');
})->name('evaluations');

// users
Route::get('/users', function () {
    return view('users.index');
})->name('users');
Route::get('/profile', function () {
    return view('users.show');
})->name('profile');
Route::get('/editprofile', function () {
    return view('users.edit');
})->name('editprofile');
