<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create an admin user
        User::create([
            'username' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
            'email_verified_at' => now(),
        ]);

        // Create regular users
        User::create([
            'username' => 'member',
            'email' => 'user@example.com',
            'password' => Hash::make('user123'),
            'email_verified_at' => now(),
        ]);
    }
}
