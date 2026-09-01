<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Facades\Auth;
class UserLoginService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    public function login(array $data):array{

        $user = User::where('email',$data['email'])->first();

        if(!$user){
            throw new Exception("Email ou mot de passe incorrect", 401);
        }
         if(!Hash::check($data['password'],$user->password)){
            throw new Exception(" mot de passe incorrect", 401);
         }
         $token = $user->createToken('api_token')->plainTextToken;

         return [
            "user" => $user,
            "token" => $token,
         ];

    }
}
