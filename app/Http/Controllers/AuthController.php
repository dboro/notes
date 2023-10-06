<?php

namespace App\Http\Controllers;

use App\AuthService;
use App\Http\Requests\Auth\SignInRequest;
use App\Http\Requests\Auth\SignUpRequest;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function signIn(SignInRequest $request, AuthService $service): JsonResponse
    {
        $service->signIn($request->getDto());

        return new JsonResponse();
    }

    public function signUp(SignUpRequest $request, AuthService $service): JsonResponse
    {
        $service->signUp($request->getDto());

        return new JsonResponse();
    }
}
