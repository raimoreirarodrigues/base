<?php

namespace App\Repositories\Contracts;

interface AuthRepositoryInterface{

    public function login(string $email, string $password);
    public function logout();
}