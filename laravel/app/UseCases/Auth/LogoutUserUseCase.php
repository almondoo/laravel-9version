<?php

namespace App\UseCases\Auth;

use App\UseCases\UseCase;
use App\Services\Auth\AuthService;

class LogoutUserUseCase extends UseCase
{
    /**
     * 必要なものは先にinjectionする
     */
    public function __construct(protected AuthService $authService)
    {
    }

    /**
     * 処理実行
     * 
     * @param array $where 条件
     */
    public function execute(): array
    {
        $this->authService->logout();
        return $this->commit();
    }
}
