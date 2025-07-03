<?php

namespace App\Http\Controllers\api\student;

use App\Http\Controllers\Controller;
use App\Http\Requests\courseRequest;
use App\Interfaces\CourseInterface;
use App\Models\Courses;
use App\Models\Enrollments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    use apiResponse;
    private $courseRepository;

    public function __construct(CourseInterface $coursesInterface)
    {
        $this->courseRepository = $coursesInterface;
    }

    public function allCourses()
    {
        $courses = $this->courseRepository->allCoursesPaginated();
        try {
            if (count($courses) == 0) {
                return $this->noContent();
            }
            return $this->success($courses, __('messages.index_Message'));
        } catch (\Throwable $th) {
            return $this->serverError($th);
        }
    }

    public function courseDetail()
    {
        $course = $this->courseRepository->getCourse(request('id'));
        $enrollments = Enrollments::where('user_id', Auth::guard('api')->user()->id)->where('courses_id', $course->id)->get();
        try {
            if (!$course) {
                return $this->notFound(__('messages.Error_show_Message'));
            }
            if ($enrollments) {
                return response()->json([
                    'status' => true,
                    'message' => 'single Course Fetched Successfully',
                    'data' => [
                        'course' => $course,
                        'enrolled' => true,
                    ]
                ], 200);
            }
            return $this->success($course, 'Course Fetched Successfully');

        } catch (\Throwable $th) {
            return $this->serverError($th);
        }
    }

    public function createCourse(courseRequest $courseRequest)
    {
        $fields = $courseRequest->validated();
        try {
            $course = $this->courseRepository->createCourseApi($fields);
            return $this->success($course, 'Course created Successfully');
        } catch (\Throwable $th) {
            return $this->serverError($th);
        }

    }

    public function updateCourse()
    {
        $fields = request()->all();
        $course = $this->courseRepository->updateCourseApi(request('id'), $fields);
        if (!$course) {
            return $this->serverError('not updated');
        }
        return $this->success($course, 'Updated Course');
    }

    public function deleteCourse()
    {
        $this->courseRepository->deleteCourse(request('id'));
        return $this->noContent();
    }

    public function searchCourses()
    {
        $data = request()->all();

        $courses = Courses::query();

        if ($data['name']) {
            $courses->where('title', 'like', '%' . $data['name'] . '%');
        }

        if ($data['min'] !== null) {
            $courses->where('price', '>=', $data['min']);
        }

        if ($data['max'] !== null) {
            $courses->where('price', '<=', $data['max']);
        }

        $results = $courses->get();

        return response()->json([
            'status' => true,
            'data' => $results
        ]);
    }
}