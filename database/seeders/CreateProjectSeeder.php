<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [];
        for ($i = 1; $i <= 5; $i++) {
            $projects[] = [
                'name' => fake()->name,
                'description' => fake()->text,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        Project::query()->insert($projects);
    }
}
