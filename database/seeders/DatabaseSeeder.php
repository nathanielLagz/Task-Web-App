<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\UserCredentials;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        UserCredentials::factory()->create([
            'username' => 'abc',
            'password' => Hash::make('123'),
            'email' => 'abc@example.com',
        ]);
        UserCredentials::factory(2)->create();
        
        Task::factory(2)->create();
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
