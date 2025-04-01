<?php

use Illuminate\Support\Facades\Route;
use Mortezamollaie\TasksManagement\ApiResponse\Facades\ApiResponse;

Route::get('/test', function (){
    return ApiResponse::withMessage("package works successfully")->build()->response();
});
