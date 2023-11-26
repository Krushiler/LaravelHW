<?php

namespace App\Interactor;

use App\Models\User;
use App\Repository\Interface\AuthRepository;

class AuthInteractor {
    private AuthRepository $authRepository;

    public function __construct(AuthRepository $authRepository) {
        $this->authRepository = $authRepository;
    }

    public function register(array $userData): User {
        return $this->authRepository->register($userData);
    }

    public function login(array $credentials): User {
        return $this->authRepository->login($credentials);
    }
}