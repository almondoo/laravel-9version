<?php

namespace App\UseCases\Task;

use App\UseCases\UseCase;
use App\Services\Task\TaskService;
use Illuminate\Support\Facades\DB;

class UpdateTaskUseCase extends UseCase
{
    protected TaskService $taskService;

    /**
     * 必要なものは先にinjectionする
     */
    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    /**
     * 処理実行
     */
    public function execute(array $request): array
    {
        DB::beginTransaction();
        try {
            $this->taskService->updateTask($request['task_id'], [
                'user_id' => $request['user_id'],
                'title' => $request['title'],
                'text' =>  $request['text'],
            ]);
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            $this->addErrorMessage('task', $e->getMessage());
            $this->fail();
        }
        return $this->commit();
    }
}
