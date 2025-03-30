<?php

namespace Database\Seeders;

use App\Models\UserCredentials;
use App\Models\Task;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserCredentialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserCredentials::factory()->create([
            'username' => 'abc',
            'password' => Hash::make('123'),
            'email' => 'abc@example.com',
        ]);
    }
}
