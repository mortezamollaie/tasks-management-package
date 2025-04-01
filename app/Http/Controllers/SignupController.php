<?php

namespace App\Http\Controllers;

use App\ApiResponse\Facades\ApiResponse;
use App\Http\Requests\SignupRequest;
use App\Services\AuthService;

class SignupController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService){
        $this->authService = $authService;
    }
    public function __invoke(SignupRequest $request)
    {
        $result = $this->authService->signup($request->validated());
        if(!$result->ok){
            return ApiResponse::withMessage('Something went wrong. try again later...')->withStatus(500)->build()->response();
        }

        return ApiResponse::withMessage('User signed up successfully.')->withData($result->data)->withStatus(200)->build()->response();
    }
}
