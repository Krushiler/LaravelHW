<?php

namespace App\Repository;

use App\Repository\Interface\AuthRepository;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RealAuthRepository implements AuthRepository {
    public function register(array $userData): User
    {
        if (!isset($userData['password'])) {
            throw new \Exception('Password is required');
        }
        if (!isset($userData['name'])) {
            throw new \Exception('Name is required');
        }
        $name = $userData['name'];
        $password = Hash::make($userData['password']);
        $user = User::create(
            [
                'name' => $name,
                'password' => $password
            ]
        );
        Auth::login($user, remember: true);
        return $user;
    }

    public function login(array $credentials): User
    {
        if (Auth::attempt($credentials, remember: true)) {
            $user = Auth::user();
            return $user;
        }

        throw new \Exception('Invalid credentials');
    }
}