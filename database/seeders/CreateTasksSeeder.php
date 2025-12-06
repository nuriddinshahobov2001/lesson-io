<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class CreateTasksSeeder extends Seeder
{
    public function run(): void
    {
        $tasks = [];
        for ($i = 1; $i <= 10; $i++) {
            $tasks[] = [
                'name' => fake()->name,
                'description' => fake()->text,
                'due_date' => fake()->dateTimeBetween('now +1 day', 'now +1 week'),
                'created_by' => 1,
                'priority' => rand(0, 2),
                'assigned_to' => rand(2, 10),
                'board_id' => rand(1,4),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        Task::query()->insert($tasks);
    }
}
