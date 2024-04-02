<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\ConsultController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\WorkoutController;

Route::get('/', function () {
    return view('template');
});

Route::resource('assessment', AssessmentController::class);
Route::resource('chatbot', ChatbotController::class);
Route::resource('consult', ConsultController::class);
Route::resource('senam', WorkoutController::class);

Route::post('/consult/start', [ConsultController::class, 'start']);