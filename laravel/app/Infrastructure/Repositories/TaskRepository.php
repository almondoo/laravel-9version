<?php

namespace App\Infrastructure\Repositories;

use App\Infrastructure\Interfaces\TaskInterface;
use App\Models\Task;

class TaskRepository implements TaskInterface
{
    public function __construct(private Task $task)
    {
    }

    public function find(int $id): ?Task
    {
        return $this->task->find($id);
    }

    public function paginate(): ?object
    {
        return $this->task->with('user')->sortLatest()->paginate(env('TASK_LIST_COUNT'));
    }

    public function conditionPaginate(array $condition = []): ?object
    {
        return $this->task->where($condition)->with('user')->sortLatest()->paginate(env('TASK_LIST_COUNT'));
    }

    public function fetchAll(): object
    {
        return $this->task->sortLatest()->get();
    }

    public function createTask(array $request): Task
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
