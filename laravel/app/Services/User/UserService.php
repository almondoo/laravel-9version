<?php

namespace App\Services\User;

use App\Infrastructure\Interfaces\UserInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserService
{
    public function __construct(private UserInterface $userRepo)
    {
    }

    /**
     * ユーザー作成
     */
    public function createUser(string $name, string $email, string $password): User
    {
        return $this->userRepo->createUser([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);
    }
}
