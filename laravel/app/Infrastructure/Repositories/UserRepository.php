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

    public function find(int $id): User
    {
        return $this->user->find($id);
    }

    public function fetchAll(): array
    {
        return $this->user->get();
    }

    public function createUser(array $request): User
    {
        return $this->user->create($request);
    }

    public function updateUser(array $request): bool
    {
        return $this->user->fill($request)->save();
    }

    public function deleteUser(int $id): bool
    {
        return $this->user->destroy($id);
    }

    public function fetchLoginUser(): User
    {
        return Auth::user();
    }
}
