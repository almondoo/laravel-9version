<?php

namespace App\Infrastructure\Repositories;

use App\Infrastructure\Interfaces\TaskInterface;
use App\Models\Task;

class TaskRepository implements TaskInterface
{
    private Task $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    public function find(int $id): object
    {
        return $this->task->find($id);
    }

    public function paginate(int $count)
    {
        return $this->task->paginate($count);
    }

    public function fetchAll(): object
    {
        return $this->task->get();
    }

    public function createTask(array $request): object
    {
        return $this->task->create($request);
    }

    public function updateTask(int $id, array $request): int
    {
        $task = $this->find($id);
        return $task->fill($request)->save();
    }

    public function deleteTask(int $id): int
    {
        return $this->task->destroy($id);
    }
}
