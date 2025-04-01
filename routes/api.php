<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use Illuminate\Support\Facades\Route;

Route::post('/signup', SignupController::class);
Route::post('/login', LoginController::class);
