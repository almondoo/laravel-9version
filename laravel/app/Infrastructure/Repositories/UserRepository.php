<?php

namespace App\Infrastructure\Repositories;

use App\Infrastructure\Interfaces\UserInterface;
use App\Models\User;

class UserRepository implements UserInterface
{

    /**
     * @var \App\Models\User
     */
    private $User;

    /**
     * @param function $function
     */
    public function __construct(User $User)
    {
        $this->User = $User;
    }

    public function find(int $id)
    {
        return $this->User->find($id);
    }

    public function fetchAll()
    {
        return $this->User->get();
    }

    public function createUser($request)
    {
        return $this->User->create($request);
    }

    public function updateUser($request)
    {
        return $this->User->fill($request)->save();
    }

    public function deleteUser(int $id)
    {
        return $this->User->destroy($id);
    }
}
