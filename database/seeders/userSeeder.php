<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users =
            [
                [
                    'name' => 'Super Admin',
                    'email' => 'm7md@gmail.com',
                    'password' => bcrypt('12345678'),
                    'role' => 'admin',
                ]
            ];
    }
}