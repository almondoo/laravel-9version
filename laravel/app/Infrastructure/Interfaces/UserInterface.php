<?php

namespace App\Infrastructure\Interfaces;

use App\Models\User;

interface UserInterface
{
    public function find(int $id): object;
    public function fetchAll(): array;
    public function createUser(array $request): object;
    public function updateUser(int $id, array $request): bool;
    public function deleteUser(int $id): bool;
    public function fetchLoginUser(): object;
}
