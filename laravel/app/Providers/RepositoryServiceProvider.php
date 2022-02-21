<?php

namespace App\Providers;

use App\Infrastructure\Interfaces\UserInterface;
use App\Infrastructure\Repositories\UserRepository;
use App\Infrastructure\Interfaces\TaskInterface;
use App\Infrastructure\Repositories\TaskRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserInterface::class, UserRepository::class);
        $this->app->bind(TaskInterface::class, TaskRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
