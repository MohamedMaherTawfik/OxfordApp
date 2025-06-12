<?php

namespace Database\Seeders;

use App\Models\Courses;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class courseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'title' => 'Laravel for Beginners',
                'description' => 'Learn the basics of Laravel, a powerful PHP framework.',
                'cover_photo' => 'laravel.jpg',
                'price' => 29.99,
                'duration' => '4 weeks',
                'rating' => 4.5,
                'start_date' => '2023-11-01',
                'video' => 'laravel_intro.mp4',
                'slug' => 'laravel-for-beginners',
                'user_id' => 1,
            ],
            [
                'title' => 'Advanced JavaScript',
                'description' => 'Deep dive into advanced JavaScript concepts and techniques.',
                'cover_photo' => 'javascript.jpg',
                'price' => 39.99,
                'duration' => '6 weeks',
                'rating' => 4.8,
                'start_date' => '2023-12-01',
                'video' => 'javascript_advanced.mp4',
                'slug' => 'advanced-javascript',
                'user_id' => 1,
            ],
            [
                'title' => 'Python Data Science',
                'description' => 'Explore data science using Python, including libraries like Pandas and NumPy.',
                'cover_photo' => 'python_data_science.jpg',
                'price' => 49.99,
                'duration' => '8 weeks',
                'rating' => 4.7,
                'start_date' => '2024-01-15',
                'video' => 'python_data_science_intro.mp4',
                'slug' => 'python-data-science',
                'user_id' => 1,
            ],
        ];

        foreach ($courses as $course) {
            Courses::create($course);
        }


    }
}