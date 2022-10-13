<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->reset();

        User::factory(10)->create();
        User::factory()->create([
            'name' => 'Laravel',
            'email' => 'example@example.com',
        ]);
        Task::factory(100)->create();
    }

    /**
     * データリセット
     *
     * @return void
     */
    public function reset(): void
    {
        Schema::disableForeignKeyConstraints();

        User::truncate();
        Task::truncate();

        Schema::enableForeignKeyConstraints();
    }
}
