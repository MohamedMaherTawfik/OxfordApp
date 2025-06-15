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
                    'email' => 'm7mdellham77@gmail.com',
                    'password' => bcrypt('M7mdmaher11'),
                    'role' => 'admin',
                ],
                [
                    'name' => 'Teacher',
                    'email' => 'teacher@gmail.com',
                    'password' => bcrypt('M7mdmaher11'),
                    'role' => 'teacher',
                ],
                [
                    'name' => 'Student',
                    'email' => 'student@gmail.com',
                    'password' => bcrypt('M7mdmaher11'),
                    'role' => 'user',
                ],
                [
                    'name' => 'Student1',
                    'email' => 'student1@gmail.com',
                    'password' => bcrypt('M7mdmaher11'),
                    'role' => 'user',
                ],
                [
                    'name' => 'Student2',
                    'email' => 'student2@gmail.com',
                    'password' => bcrypt('M7mdmaher11'),
                    'role' => 'user',
                ],
            ];

        foreach ($users as $user) {
            \App\Models\User::create($user);
        }
    }
}
