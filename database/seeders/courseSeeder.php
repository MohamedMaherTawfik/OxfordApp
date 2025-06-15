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
                'categorey' => 'Programming',
                'title' => 'Laravel for Beginners',
                'description' => 'Learn the basics of Laravel, a powerful PHP framework.',
                'cover_photo' => 'laravel.jpg',
                'price' => 29.99,
                'duration' => '4 weeks',
                'rating' => 4.5,
                'start_date' => '2023-11-01',
                'slug' => 'laravel-for-beginners',
                'user_id' => 1,
            ],
            [
                'categorey' => 'Programming',
                'title' => 'Advanced JavaScript',
                'description' => 'Deep dive into advanced JavaScript concepts and techniques.',
                'cover_photo' => 'javascript.jpg',
                'price' => 39.99,
                'duration' => '6 weeks',
                'rating' => 4.8,
                'start_date' => '2023-12-01',
                'slug' => 'advanced-javascript',
                'user_id' => 1,
            ],
            [
                'categorey' => 'Data Science',
                'title' => 'Python Data Science',
                'description' => 'Explore data science using Python, including libraries like Pandas and NumPy.',
                'cover_photo' => 'python_data_science.jpg',
                'price' => 49.99,
                'duration' => '8 weeks',
                'rating' => 4.7,
                'start_date' => '2024-01-15',
                'slug' => 'python-data-science',
                'user_id' => 2,
            ],
            [
                'categorey' => 'Web Development',
                'title' => 'Web Development Bootcamp',
                'description' => 'A comprehensive bootcamp covering HTML, CSS, and JavaScript.',
                'cover_photo' => 'web_dev_bootcamp.jpg',
                'price' => 59.99,
                'duration' => '10 weeks',
                'rating' => 4.9,
                'start_date' => '2024-02-01',
                'slug' => 'web-development-bootcamp',
                'user_id' => 2,
            ]
        ];

        foreach ($courses as $course) {
            Courses::create($course);
        }


    }
}
