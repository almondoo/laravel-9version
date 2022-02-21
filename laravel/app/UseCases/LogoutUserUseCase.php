<?php

namespace App\UseCases;

use App\Services\User\UserService;

class LogoutUserUseCase extends UseCase
{
    protected UserService $userService;

    /**
     * 必要なものは先にinjectionする
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * 処理実行
     * 
     * @param array $where 条件
     */
    public function execute(): array
    {
        $this->userService->logout();
        return $this->commit();
    }
}
