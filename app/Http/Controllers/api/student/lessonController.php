<?php

namespace App\Http\Controllers\api\student;

use App\Http\Controllers\Controller;
use App\Interfaces\LessonInterface;
use Illuminate\Http\Request;

class lessonController extends Controller
{
    use apiResponse;
    private $lessonRepository;

    public function __construct(LessonInterface $lessonInterface)
    {
        $this->lessonRepository = $lessonInterface;
    }

    /**
     * Display of a lesson details.s
     *
     */
    public function lessonDetails()
    {
        $data = $this->lessonRepository->getLesson(request('id'));
        try {
            if (!empty($data)) {
                return $this->success($data, __('messages.show_Message'));
            } else {
                return $this->notFound(__('messages.notFound_Message'));
            }
        } catch (\Throwable $th) {
            return $this->serverError($th->getMessage());
        }
    }

}
