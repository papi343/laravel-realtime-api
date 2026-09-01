<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserRegisterService;
use App\Http\Requests\registerRequest;
use App\Http\Resources\registerResource;

class userController extends Controller
{
    public function __construct(private UserRegisterService $userRegisterService)
    {
    }

    public function register(registerRequest $request)
    { 
        $result = $this->userRegisterService->Register($request->validated());

        return response()->json([
            "message" => "Utilisateur enregistré avec succès",
            "user" => new registerResource($result['user']),
            "token" => $result['token'],
        ], 201);
    }
}

