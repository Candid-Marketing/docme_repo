<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Insert a few dummy users
        DB::table('users')->insert([
            [
                'first_name' => 'Cyrel',
                'last_name' => 'Camson',
                'email' => 'cyrel@example.com',
                'is_verified' => 1,
                'status'=> 0,
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'user_status'=> 1,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'John Doe',
                'last_name' => 'Doe',
                'email' => 'john@example.com',
                'is_verified' => 1,
                'status'=> 0,
                'email_verified_at' => now(),
                'user_status'=> 2,
                'password' => Hash::make('password123'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Jane',
                'last_name' => 'Doe',
                'email' => 'jane@example.com',
                'is_verified' => 1,
                'status'=> 0,
                'email_verified_at' => now(),
                'user_status'=> 3,
                'password' => Hash::make('password123'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Candid',
                'last_name' => 'Marketing',
                'email' => 'candidmarketing@gmail.com',
                'is_verified' => 1,
                'email_verified_at' => now(),
                'status'=> 1,
                'password' => Hash::make('password123'),
                'user_status'=> 1,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Cassandra',
                'last_name' => 'Cadorin',
                'email' => 'cassandra@candidmarketing.com.au',
                'is_verified' => 1,
                'status'=> 1,
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'user_status'=> 2,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Bobby',
                'last_name' => 'Paler',
                'email' => 'frontender@candidmarketing.com.au',
                'is_verified' => 1,
                'status'=> 1,
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'user_status'=> 3,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
