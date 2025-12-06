<?php

namespace Database\Seeders;

use App\Models\Board;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateBoardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $boards = [
            [
                'user_id' => 1,
                'name' => 'Todo',
                'color' => '#fee685',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'name' => 'In progress',
                'color' => '#bedbff',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'name' => 'Completed',
                'color' => '#b9f8cf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'name' => 'Failed',
                'color' => '#ffc9c9',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        Board::query()->insert($boards);
    }
}
