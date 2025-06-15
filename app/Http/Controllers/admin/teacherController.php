<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\courseRequest;
use App\Http\Requests\lessonRequest;
use App\Interfaces\CoursesInterface;
use App\Interfaces\LessonInterface;
use App\Models\Courses;
use App\Models\Enrollments;

class teacherController extends Controller
{
    private $courseRepository;
    private $lessonRepository;
    /**
     * Create a new interface instance.
     *
     * @param CoursesInterface $courseRepository
     * @param LessonInterface $lessonRepository
     */
    public function __construct(CoursesInterface $courseRepository, LessonInterface $lessonRepository)
    {
        $this->courseRepository = $courseRepository;
        $this->lessonRepository = $lessonRepository;
    }
    public function dashboard()
    {
        $courses = Courses::with('lessons')->where('user_id', auth()->user()->id)->get();
        return view('teacherDashboard.index', compact('courses'));
    }

    public function showCourse()
    {
        $course = Courses::where('slug', request('slug'))->first();
        $enrollments = Enrollments::where('courses_id', $course->id)->count();
        $price = $enrollments * $course->price;
        return view('teacherDashboard.courses.showCourse', compact('course', 'enrollments', 'price'));
    }

    public function createCourse()
    {
        return view('teacherDashboard.courses.createCourse');
    }

    public function storeCourse(courseRequest $request)
    {
        $fields = $request->validated();
        $this->courseRepository->createCourse($fields);
        return redirect()->route('dashboard')->with('success', 'Course created successfully!');
    }

    public function editCourse()
    {
        $course = $this->courseRepository->getCourseBySlug(request('slug'));
        return view('teacherDashboard.courses.editCourse', compact('course'));
    }

    public function updateCourse()
    {
        $course = $this->courseRepository->getCourseBySlug(request('slug'));
        if (request()->hasFile('cover_photo')) {
            $fields = request()->all();
            $fields['cover_photo'] = request()->file('cover_photo')->store('courses', 'public');
        }
        $fields['slug'] = str_replace(' ', '-', strtolower($fields['title']));
        $this->courseRepository->updateCourse($course->id, $fields);
        return redirect()->route('dashboard')->with('success', 'Course updated successfully!');
    }

    public function deleteCourse()
    {
        $course = $this->courseRepository->getCourse(request('id'));
        $this->courseRepository->deleteCourse($course->id);
        return redirect()->route('dashboard')->with('success', 'Course deleted successfully!');
    }

    public function createLesson()
    {
        $course = $this->courseRepository->getCourseBySlug(request('slug'));
        return view('teacherDashboard.lessons.createLesson', compact('course'));
    }

    public function storeLesson(lessonRequest $request)
    {
        $fields = $request->validated();
        $fields['image'] = request()->file('image')->store('lessonsImage', 'public');
        $course = $this->courseRepository->getCourseBySlug(request('slug'));
        $fields['video'] = request()->file('video')->store('lessonsVideo', 'public');
        $this->lessonRepository->createLesson($fields, $course->id);
        return redirect()->route('teacher.courses.show', ['slug' => $course->slug])->with('success', 'Lesson created successfully!');
    }

    public function showLesson()
    {
        $lesson = $this->lessonRepository->getLessonBySlug(request('slug'));
        $course = $this->courseRepository->getCourse($lesson->courses_id);
        return view('teacherDashboard.lessons.showLesson', compact('lesson', 'course'));
    }

    public function editLesson()
    {
        $lesson = $this->lessonRepository->getLessonBySlug(request('slug'));
        $course = $this->courseRepository->getCourse($lesson->courses_id);
        return view('teacherDashboard.lessons.editLesson', compact('lesson', 'course'));
    }
    public function updateLesson()
    {
        $fields = request()->all();
        $lesson = $this->lessonRepository->getLessonBySlug(request('slug'));
        if (request()->hasFile('image')) {
            $fields['image'] = request()->file('image')->store('lessonsImage', 'public');
        }
        if (request()->hasFile('video')) {
            $fields['video'] = request()->file('video')->store('lessonsVideo', 'public');
        }
        $this->lessonRepository->updateLesson($fields, $lesson->id);
        $course = $this->courseRepository->getCourse($lesson->courses_id);
        return redirect()->route('teacher.courses.show', ['slug' => $course->slug])->with('success', 'Lesson updated successfully!');
    }
    public function deleteLesson()
    {
        $lesson = $this->lessonRepository->getLesson(request('id'));
        $course = $this->courseRepository->getCourse($lesson->courses_id);
        $this->lessonRepository->deleteLesson($lesson->id);
        return redirect()->route('teacher.courses.show', ['slug' => $course->slug])->with('success', 'Lesson deleted successfully!');
    }
}
