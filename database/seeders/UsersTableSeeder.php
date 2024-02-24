<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Create user1 (related to Admin)
        User::create([
            'uuid' => \Illuminate\Support\Str::uuid(),
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);

        // Create user2 (related to John Doe)
        User::create([
            'uuid' => \Illuminate\Support\Str::uuid(),
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}

