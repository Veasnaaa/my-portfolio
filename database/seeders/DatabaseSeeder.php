<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
//        User::factory()->create([
//            'username' => 'Admin',
//            'password' => 'password',
//            'email' => 'admin@example.com',
//        ]);

        $this->call([
//            ContactSeeder::class,
            UserSeeder::class,
        ]);
    }
}
