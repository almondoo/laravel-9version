<?php

namespace App\UseCases;

use App\Services\Task\TaskService;

class UpdateTaskUseCase extends UseCase
{
    protected TaskService $task;

    /**
     * 必要なものは先にinjectionする
     */
    public function __construct(TaskService $task)
    {
        $this->task = $task;
    }

    /**
     * 処理実行
     */
    public function execute(): array
    {
        return $this->commit();
    }
}
