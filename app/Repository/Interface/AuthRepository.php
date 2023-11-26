<?php

namespace App\Repository\Interface;

use App\Models\User;

interface AuthRepository {
    public function register(array $userData): User;

    public function login(array $credentials): User;
}