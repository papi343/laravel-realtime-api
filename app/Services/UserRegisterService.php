<?php

namespace App\Services;

use App\Models\User;
use App\Events\UserRegistered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Event;

class UserRegisterService
{
    public function Register(array $data): array
    {
        $user = User::create([
            "name" => $data['name'],
            "email" => $data["email"],
            "password" => Hash::make($data['password']),
        ]);
        //Dispatch event 
        event(new UserRegistered($user));
        $token = $user->createToken('api_token')->plainTextToken;
        return [
            "user" => $user,
            "token" => $token,
        ];
    }
}
