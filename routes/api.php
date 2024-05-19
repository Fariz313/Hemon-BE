<?php

use App\Http\Controllers\API\UserAuthController;
use App\Http\Controllers\ConsultController;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\KlinikController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\ChatbotController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('login', [UserAuthController::class,'login']);
Route::post('register', [UserAuthController::class,'register']);


Route::get('consultDetail', [ConsultController::class, 'get_consult_detail']);
Route::resource('assessment', AssessmentController::class);
Route::resource('chatbot', ChatbotController::class);
Route::resource('consult', ConsultController::class);
Route::resource('senam', WorkoutController::class);
Route::resource('klinik', KlinikController::class);
Route::resource('tracking', TrackingController::class);
Route::post('/consult/start', [ConsultController::class, 'start']);
