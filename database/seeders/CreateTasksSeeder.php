<?php

namespace Database\Seeders;

use App\Enums\TaskStatusEnum;
use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Random\RandomException;

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
                'status' => fake()->randomElement(TaskStatusEnum::values()),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        Task::query()->insert($tasks);
    }
}
