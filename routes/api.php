<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\WorkoutController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::resource('workouts', WorkoutController::class)->except([
        'create', 'edit'
    ]);
    Route::post('/logout', [AuthController::class, 'logout']);
});
