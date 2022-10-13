<?php

namespace App\Services\Task;

use App\Infrastructure\Interfaces\TaskInterface;
use App\Models\Task;

/**
 * TODO: 貧血になってる
 */
class TaskService
{
    /**
     * 初期化
     */
    public function __construct(private TaskInterface $taskRepo)
    {
    }

    /**
     * @return object
     */
    public function fetchTask()
    {
        return $this->taskRepo->fetchAll();
    }

    public function findTask(int $id = null): ?Task
    {
        return $this->taskRepo->find($id);
    }

    public function paginate(): ?object
    {
        return $this->taskRepo->paginate();
    }

    public function searchPaginate(string $keyword): ?object
    {
        return $this->taskRepo->conditionPaginate([['title', 'like', "%{$keyword}%"]]);
    }

    public function createTask(array $data): Task
    {
        return $this->taskRepo->createTask($data);
    }

    public function updateTask(int $id, array $data): bool
    {
        return $this->taskRepo->updateTask($id, $data);
    }

    public function deleteTask(int $id): bool
    {
        return $this->taskRepo->deleteTask($id);
    }
}
