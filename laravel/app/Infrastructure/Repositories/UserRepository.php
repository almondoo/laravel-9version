<?php

namespace App\Infrastructure\Repositories;

use App\Infrastructure\Interfaces\UserInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRepository implements UserInterface
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function find(int $id): object
    {
        return $this->user->find($id);
    }

    public function fetchAll(): array
    {
        return $this->user->get();
    }

    public function createUser(array $request): object
    {
        return $this->user->create($request);
    }

    public function updateUser(int $id, array $request): bool
    {
        $user = $this->find($id);
        return $user->fill($request)->save();
    }

    public function deleteUser(int $id): bool
    {
        return $this->user->destroy($id);
    }

    public function fetchLoginUser(): object
    {
        return Auth::user();
    }
}
