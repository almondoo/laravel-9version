<?php

namespace App\Infrastructure\Interfaces;

interface UserInterface
{
    public function find(int $id);
    public function fetchAll();
    public function createUser($request);
    public function updateUser($request);
    public function deleteUser(int $id);
}
