<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Interfaces\CategoryInterface;
use App\Interfaces\CourseInterface;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    private $coursesRepository;
    private $categoreyrepository;

    public function __construct(CourseInterface $coursesRepository, CategoryInterface $categoreyInterface)
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

    public function showCourse()
    {
        $course = $this->coursesRepository->getCourseBySlug(request('slug'));
        return view('home.courses.show', compact('course'));
    }

    public function showCategorey()
    {
        $category = $this->categoreyrepository->getCategoryBySlug(request('slug'));
        return view('home.categorey.show', compact('category'));
    }

    public function profile()
    {
        $user = Auth::user()->load('applyTeacher', 'course');
        return view('home.profile', compact('user'));
    }
}
