<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\RateLimiter;

Route::post('/register', [userController::class, 'register']);
Route::post('/login', [userController::class, 'login'])
->middleware('throttle:login');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

