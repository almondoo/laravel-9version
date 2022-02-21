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

    public function find(int $id)
    {
        return $this->task->find($id);
    }

    public function fetchAll()
    {
        return $this->task->get();
    }

    public function createTask(array $request)
    {
        return $this->task->create($request);
    }

    public function updateTask(array $request)
    {
        return $this->task->fill($request)->save();
    }

    public function deleteTask(int $id)
    {
        return $this->task->destroy($id);
    }
}
