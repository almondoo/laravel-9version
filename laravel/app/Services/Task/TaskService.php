<?php

namespace App\Services\Task;

use App\Infrastructure\Interfaces\TaskInterface;

class TaskService
{

    private TaskInterface $taskRepo;

    /**
     * 初期化
     */
    public function __construct(TaskInterface $taskRepo)
    {
        $this->taskRepo = $taskRepo;
    }

    public function fetchTask(): object
    {
        return $this->taskRepo->fetchAll();
    }

    public function findTask(int $id = null): object
    {
        return $this->taskRepo->find($id);
    }

    public function paginate(int $count): object
    {
        return $this->taskRepo->paginate($count);
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
