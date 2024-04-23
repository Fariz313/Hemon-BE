<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\ConsultController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\API\UserAuthController;
use App\Http\Controllers\KlinikController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('template');
});


Route::get('login', [UserController::class,'login'])->name('login');
Route::post('login', [UserAuthController::class,'login']);
Route::get('logout', [UserAuthController::class,'logout']);

Route::get('register', [UserController::class,'register']);
Route::middleware('auth')->group(function () {
    Route::get('logged', [UserController::class,'logged']);
    Route::resource('assessment', AssessmentController::class);
    Route::resource('assessment', AssessmentController::class);
    Route::resource('chatbot', ChatbotController::class);
    Route::resource('consult', ConsultController::class);
    Route::resource('senam', WorkoutController::class);
    Route::resource('klinik', KlinikController::class);
    Route::resource('tracking', TrackingController::class);
});

Route::post('/consult/start', [ConsultController::class, 'start']);
