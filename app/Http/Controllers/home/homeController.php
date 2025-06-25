<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Interfaces\CategoryInterface;
use App\Interfaces\CourseInterface;
use App\Interfaces\EnrollmentInterface;
use App\Interfaces\LessonInterface;
use App\Interfaces\ReviewsInterface;
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
    private $reviewRepository;

    public function __construct(CourseInterface $coursesRepository, CategoryInterface $categoreyInterface, EnrollmentInterface $enrollmentInterface, LessonInterface $lessonInterface, ReviewsInterface $reviewsInterface)
    {
        $this->coursesRepository = $coursesRepository;
        $this->categoreyrepository = $categoreyInterface;
        $this->enrollmentRepository = $enrollmentInterface;
        $this->lessonRepository = $lessonInterface;
        $this->reviewRepository = $reviewsInterface;
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

    public function courseReview()
    {
        $course = $this->coursesRepository->getCourseBySlug(request('slug'));
        $this->reviewRepository->makeReview(request('rating'), $course->id);
        return redirect()->route('myCourse', ['slug' => $course->slug]);
    }

    public function allCourses()
    {
        $courses = $this->coursesRepository->allCourses();
        return view('home.courses.allCourses', compact('courses'));
    }

    public function fromSearch()
    {
        $course = $this->coursesRepository->getCourseBySlug(request('slug'));
        if ($course) {

            return view('home.courses.show', compact('course'));
        }
        return view('home.courses.notFound');
    }

    public function about()
    {
        return view('home.inforamtions.aboutUs');
    }

    public function contact()
    {
        return view('home.inforamtions.contactUs');
    }
}