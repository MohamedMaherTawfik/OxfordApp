<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Interfaces\CategoryInterface;
use App\Interfaces\CourseInterface;
use App\Interfaces\EnrollmentInterface;
use App\Interfaces\LessonInterface;
use App\Models\Courses;
use App\Models\Enrollments;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    private $coursesRepository;
    private $categoreyrepository;
    private $enrollmentRepository;
    private $lessonRepository;

    public function __construct(CourseInterface $coursesRepository, CategoryInterface $categoreyInterface, EnrollmentInterface $enrollmentInterface, LessonInterface $lessonInterface)
    {
        $this->coursesRepository = $coursesRepository;
        $this->categoreyrepository = $categoreyInterface;
        $this->enrollmentRepository = $enrollmentInterface;
        $this->lessonRepository = $lessonInterface;
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
        $enrollmentUserIds = Enrollments::where('enrolled', 'yes')->where('courses_id', $course->id)->pluck('user_id');
        if ($enrollmentUserIds->contains(Auth::user()->id)) {
            return redirect()->route('myCourses');
        }
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

    public function enrollment()
    {

        $course = $this->coursesRepository->getCourseBySlug(request('slug'));
        $this->enrollmentRepository->store($course->id, $course->price);
        return redirect('/');
    }

    public function enrolledCourses()
    {
        $courseIds = Enrollments::where('user_id', Auth::user()->id)->where('enrolled', 'yes')
            ->pluck('courses_id');
        $courses = Courses::whereIn('id', $courseIds)->get();
        return view('home.myCourses', compact('courses'));
    }

    public function enrolledCourse()
    {
        $course = $this->coursesRepository->getCourseBySlug(request('slug'));
        $relatedCourses = Courses::where('categorey_id', $course->categorey_id)->take(3)->get();

        return view('home.courses.enrolledCourse', compact('course', 'relatedCourses'));
    }

    public function showLesson()
    {
        $lesson = $this->lessonRepository->getLessonBySlug(request('slug'));
        return view('home.courses.lessons.show', compact('lesson'));
    }
}
