<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\OfferController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout',[AuthController::class,'logout'])->middleware('auth:sanctum');

Route::post('forgot',[AuthController::class,'forgot']);
Route::post('reset',[AuthController::class,'reset']);

// to fetch job details

Route::get('jobs/{id}', [JobController::class, 'show']);
Route::get('offers/{id}', [OfferController::class, 'show']);
Route::put('/offers/{id}',[OfferController::class,'update']);


Route::get('/interviews/{id}', [InterviewController::class, 'interviewInfo']);

Route::get('/jobs', [JobController::class, 'search']);
Route::get('/offers', [OfferController::class, 'search']);