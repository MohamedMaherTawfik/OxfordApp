<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Interfaces\categoreyInterface;
use App\Interfaces\CoursesInterface;
use Illuminate\Http\Request;

class homeController extends Controller
{
    private $coursesRepository;
    private $categoreyrepository;

    public function __construct(CoursesInterface $coursesRepository, categoreyInterface $categoreyInterface)
    {
        $this->coursesRepository = $coursesRepository;
        $this->categoreyrepository = $categoreyInterface;
    }
    public function index()
    {
        $courses = $this->coursesRepository->allCourses();
        $categories = $this->categoreyrepository->getAllCategories();
        return view('welcome', compact('courses', 'categories'));
    }
}
