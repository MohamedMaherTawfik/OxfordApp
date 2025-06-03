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
                ]
            ];

        foreach ($users as $user) {
            \App\Models\User::create($user);
        }
    }
}