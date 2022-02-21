<?php

namespace App\UseCases;

use App\Services\User\UserService;

class LoginUserUseCase extends UseCase
{
    protected UserService $user;

    /**
     * 必要なものは先にinjectionする
     */
    public function __construct(UserService $user)
    {
        $this->user = $user;
    }

    /**
     * ユースケースに合った処理を行う
     * 返り値で失敗の場合は全てfalseを返す
     */
    public function execute(array $request): array
    {
        if ($this->user->authenticate($request['email'], $request['password'], $request['is_remember'])) {
            return $this->commit([
                'user' => $this->user->fetchLoginUser()
            ]);
        }
        $this->addErrorMessage('login', 'メールアドレスかパスワードが違います。');
        return $this->fail();
    }
}
