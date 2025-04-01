<?php

use Illuminate\Support\Facades\Route;
use Mortezamollaie\TasksManagement\ApiResponse\Facades\ApiResponse;
use Mortezamollaie\TasksManagement\Http\Controllers\TaskController;

Route::middleware('auth:sanctum')->apiResource('tasks', TaskController::class);
