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
                    'name' => 'Admin',
                    'email' => 'admin@gmail.com',
                    'password' => bcrypt('Oxford11'),
                    'role' => 'admin',
                ],
                [
                    'name' => 'طالب 1',
                    'email' => 'student1@oxford.com',
                    'password' => bcrypt('password'),
                    'role' => 'user',
                ],
                [
                    'name' => 'طالب 2',
                    'email' => 'student2@oxford.com',
                    'password' => bcrypt('password'),
                    'role' => 'user',
                ],
                [
                    'name' => 'طالب 3',
                    'email' => 'student3@oxford.com',
                    'password' => bcrypt('password'),
                    'role' => 'user',
                ],
                [
                    'name' => 'معلم 1',
                    'email' => 'teacher1@oxford.com',
                    'password' => bcrypt('password'),
                    'role' => 'teacher',
                ],
                [
                    'name' => 'معلم 2',
                    'email' => 'teacher2@oxford.com',
                    'password' => bcrypt('password'),
                    'role' => 'teacher',
                ],
            ];

        foreach ($users as $user) {
            \App\Models\User::firstOrCreate(
                ['email' => $user['email']],
                $user
            );
        }
    }
}
