<?php

namespace App\Http\Controllers\api\student;

use App\Http\Controllers\Controller;
use App\Interfaces\CourseInterface;
use Illuminate\Http\Request;

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
        $courses = $this->courseRepository->allCourses();
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
        try {
            if (!$course) {
                return $this->notFound(__('messages.Error_show_Message'));
            }
            return $this->success($course, __('messages.show_Message'));
        } catch (\Throwable $th) {
            return $this->serverError($th);
        }
    }

}
