<?php

namespace Database\Seeders;

use App\Models\lesson;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class lessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lessons = [
            [
                'title' => 'Introduction to Laravel',
                'description' => 'Learn the basics of Laravel, a powerful PHP framework.',
                'video' => 'laravel_intro.mp4',
                'courses_id' => 1,
                'image' => 'laravel_intro.jpg',
                'user_id' => 1,
            ],
            [
                'title' => 'Routing in Laravel',
                'description' => 'Understand how routing works in Laravel applications.',
                'video' => 'laravel_routing.mp4',
                'courses_id' => 1,
                'image' => 'laravel_routing.jpg',
                'user_id' => 1,
            ],
            [
                'title' => 'Eloquent ORM Basics',
                'description' => 'Learn how to use Eloquent ORM for database interactions.',
                'video' => 'eloquent_basics.mp4',
                'courses_id' => 1,
                'image' => 'eloquent_basics.jpg',
                'user_id' => 1,
            ],
            [
                'title' => 'Advanced JavaScript Concepts',
                'description' => 'Deep dive into advanced JavaScript concepts and techniques.',
                'video' => 'javascript_advanced.mp4',
                'courses_id' => 2,
                'image' => 'javascript_advanced.jpg',
                'user_id' => 1,
            ],
            [
                'title' => 'Asynchronous JavaScript',
                'description' => 'Learn about callbacks, promises, and async/await in JavaScript.',
                'video' => 'async_javascript.mp4',
                'courses_id' => 2,
                'image' => 'async_javascript.jpg',
                'user_id' => 1,
            ],
            [
                'title' => 'Python Data Analysis with Pandas',
                'description' => 'Explore data analysis using the Pandas library in Python.',
                'video' => 'pandas_data_analysis.mp4',
                'courses_id' => 3,
                'image' => 'pandas_data_analysis.jpg',
                'user_id' => 1,
            ],
        ];

        foreach ($lessons as $lesson) {
            lesson::create($lesson);
        }
    }
}
