<?php

namespace App\Services\User;

use App\Infrastructure\Interfaces\UserInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserService
{
    private UserInterface $userRepo;

    public function __construct(UserInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    /**
     * 認証を行う
     */
    public function authenticate(string $email, string $password, $remember_me): bool
    {
        if (Auth::attempt(['name' => $email, 'password' => $password], $remember_me)) {
            return true;
        }
        return false;
    }

    /**
     * ログアウト
     */
    public function logout(): void
    {
        Auth::logout();
    }

    /**
     * ログインユーザー取得
     */
    public function fetchLoginUser(): User
    {
        return $this->userRepo->fetchLoginUser();
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
