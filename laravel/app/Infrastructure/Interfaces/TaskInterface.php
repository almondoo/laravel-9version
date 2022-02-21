<?php

namespace App\Infrastructure\Interfaces;

interface TaskInterface
{
    public function find(int $id);
    public function fetchAll();
    public function createTask(array $request);
    public function updateTask(array $request);
    public function deleteTask(int $id);
}
