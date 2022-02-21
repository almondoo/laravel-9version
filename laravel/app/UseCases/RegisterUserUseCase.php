<?php

namespace App\UseCases;

use App\Services\User\UserService;
use Illuminate\Support\Facades\DB;

class RegisterUserUseCase extends UseCase
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
     * 処理実行
     * 
     * @param array $where 条件
     */
    public function execute(array $request): array
    {
        DB::beginTransaction();
        try {
            $user = $this->user->createUser(
                $request['name'],
                $request['email'],
                $request['password']
            );
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            $this->addErrorMessage('create_user', $e->getMessage());
            return $this->fail();
        }
        if ($this->user->authenticate($user->email, $request['password'], $request['is_remember'])) {
            return $this->user->fetchLoginUser();
        }
        return $this->commit(['user' => $user]);
    }
}
