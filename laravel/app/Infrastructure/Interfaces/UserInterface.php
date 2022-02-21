<?php

namespace App\Infrastructure\Interfaces;

use App\Models\User;

interface UserInterface
{
    public function find(int $id): User;
    public function fetchAll(): array;
    public function createUser(array $request): User;
    public function updateUser(array $request): bool;
    public function deleteUser(int $id): bool;
    public function fetchLoginUser(): User;
}
