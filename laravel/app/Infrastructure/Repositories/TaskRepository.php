<?php

namespace App\Infrastructure\Repositories;

use App\Infrastructure\Interfaces\TaskInterface;
use App\Models\Task;

class TaskRepository implements TaskInterface
{
    
    /**
     * @var \App\Models\Task
     */
    private $Task;

    /**
     * @param function $function
     */
    public function __construct(Task $Task)
    {
        $this->Task = $Task;
    }

    public function find(int $id)
    {
        return $this->Task->find($id);
    }

    public function fetchAll()
    {
        return $this->Task->get();
    }

    public function createTask(array $request)
    {
        return $this->Task->create($request);
    }

     public function updateTask(array $request)
    {
        return $this->Task->fill($request)->save();
    }

    public function deleteTask(int $id)
    {
        return $this->Task->destroy($id);
    }
}
