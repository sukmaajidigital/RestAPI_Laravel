<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'email' => 'admin@example.com',
                'username' => 'admin',
                'password' => Hash::make('123'),
                'firstname' => 'Admin',
                'lastname' => 'User',
            ],
            [
                'email' => 'test1@example.com',
                'username' => 'test1',
                'password' => Hash::make('123'),
                'firstname' => 'John',
                'lastname' => 'Doe',
            ],
            [
                'email' => 'test2@example.com',
                'username' => 'test2',
                'password' => Hash::make('123'),
                'firstname' => 'Jane',
                'lastname' => 'Doe',
            ],
        ]);
    }
}
