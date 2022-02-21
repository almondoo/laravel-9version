<?php

namespace App\UseCases;

class UseCase
{
    /**
     * エラーメッセージの箱
     * @var array
     */
    protected $error_messages = [];

    /**
     * エラーメッセージ追加
     */
    protected function addErrorMessage(string $key, string $message): void
    {
        $this->$error_messages[$key] =  $message;
    }

    /**
     * エラーが起きた
     */
    protected function error()
    {
        return [
            'is_error' => true,
            'errors' => $this->error_messages,
        ];
    }

    /**
     * ベースと返り値フォーマット
     */
    protected function commit($data = []): array
    {
        return [
            'data' => $data,
            'is_error' => false,
        ];
    }
}
