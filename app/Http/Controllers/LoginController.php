<?php

namespace App\Http\Controllers;

use App\ApiResponse\Facades\ApiResponse;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    protected $authService;
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }
    public function __invoke(LoginRequest $request)
    {
        $result = $this->authService->login($request->validated());
        if(!$result->ok){
            return ApiResponse::withMessage('Something went wrong. try again later...')->withStatus(500)->build()->response();
        } else if ($result->data == 'failed'){
            return ApiResponse::withMessage('Email or password was wrong')->withStatus(400)->build()->response();
        }
        return ApiResponse::withMessage('User logged in successfully.')->withStatus(200)->withData($result->data)->build()->response();
    }
}
