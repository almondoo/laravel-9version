<?php

namespace App\Services\Auth;

use Illuminate\Support\Facades\Auth;


class AuthService
{
    /**
     * 認証を行う
     */
    public function authenticate(string $email, string $password, $remember_me): bool
    {
        if (Auth::attempt(['email' => $email, 'password' => $password], $remember_me)) {
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
}
