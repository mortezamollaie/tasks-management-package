<?php

use Illuminate\Support\Facades\Route;
use Mortezamollaie\TasksManagement\Http\Controllers\AssignRoleController;
use Mortezamollaie\TasksManagement\Http\Controllers\RoleController;
use Mortezamollaie\TasksManagement\Http\Controllers\TaskController;

Route::middleware('auth:sanctum')->apiResource('tasks', TaskController::class);
Route::middleware('auth:sanctum')->apiResource('roles', RoleController::class);

Route::middleware('auth:sanctum')->group(function (){
   Route::post('/user/{user}/assign-roles', AssignRoleController::class);
});
