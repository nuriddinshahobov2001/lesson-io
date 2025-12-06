<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        $users = [];
        for ($i = 0; $i < 10; $i++) {
            $imageUrl = 'https://i.pravatar.cc/300?img=' . rand(1, 70);
            $imageName = 'user_' . $i . '.jpg';
            $imageContent = file_get_contents($imageUrl);
            Storage::put('avatars/' . $imageName, $imageContent);
            $users[] = [
                'name' => fake()->name,
                'email' => fake()->email,
                'password' => bcrypt('password'),
                'role' => 'user',
                'avatar' => 'storage/avatars/' . $imageName,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        User::query()->insert($users);
    }
}
