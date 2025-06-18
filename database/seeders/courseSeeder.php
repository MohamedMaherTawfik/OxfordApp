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
                'categorey_id' => 1,
                'title' => 'Laravel for Beginners',
                'description' => 'Learn the basics of Laravel, a powerful PHP framework.',
                'cover_photo' => 'courses/laravel.jpg',
                'price' => 29.99,
                'duration' => '40',
                'rating' => 4.5,
                'start_date' => '2023-11-01',
                'slug' => 'laravel-for-beginners',
                'user_id' => 1,
            ],
            [
                'categorey_id' => 2,
                'title' => 'Advanced JavaScript',
                'description' => 'Deep dive into advanced JavaScript concepts and techniques.',
                'cover_photo' => 'courses/javascript.jpg',
                'price' => 39.99,
                'duration' => '60',
                'rating' => 4.8,
                'start_date' => '2023-12-01',
                'slug' => 'advanced-javascript',
                'user_id' => 1,
            ],
            [
                'categorey_id' => 1,
                'title' => 'Python Data Science',
                'description' => 'Explore data science using Python, including libraries like Pandas and NumPy.',
                'cover_photo' => 'courses/DataScience.png',
                'price' => 49.99,
                'duration' => '80',
                'rating' => 4.7,
                'start_date' => '2024-01-15',
                'slug' => 'python-data-science',
                'user_id' => 1,
            ],
            [
                'categorey_id' => 2,
                'title' => 'Web Development Bootcamp',
                'description' => 'A comprehensive bootcamp covering HTML, CSS, and JavaScript.',
                'cover_photo' => 'courses/bootcamp.png',
                'price' => 59.99,
                'duration' => '100',
                'rating' => 4.9,
                'start_date' => '2024-02-01',
                'slug' => 'web-development-bootcamp',
                'user_id' => 1,
            ],
            [
                'categorey_id' => 1,
                'title' => 'Flutter for Mobile Apps',
                'description' => 'Learn to build beautiful mobile applications using Flutter.',
                'cover_photo' => 'courses/flutter.png',
                'price' => 34.99,
                'duration' => '50',
                'rating' => 4.6,
                'start_date' => '2024-03-01',
                'slug' => 'flutter-for-mobile-apps',
                'user_id' => 1,
            ]
        ];

        foreach ($courses as $course) {
            Courses::create($course);
        }


    }
}
