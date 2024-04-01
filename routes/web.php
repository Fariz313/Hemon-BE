<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\ConsultController;
use App\Http\Controllers\ChatbotController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('assessment', AssessmentController::class);
Route::resource('chatbot', ChatbotController::class);
Route::resource('consult', ConsultController::class);

Route::post('/consult/start', [ConsultController::class, 'start']);