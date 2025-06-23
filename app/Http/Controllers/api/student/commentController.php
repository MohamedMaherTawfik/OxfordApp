<?php

namespace App\Http\Controllers\api\student;

use App\Http\Controllers\Controller;
use App\Interfaces\commentInterface;
use Illuminate\Http\Request;

class commentController extends Controller
{
    use apiResponse;
    private $commentRepository;

    public function __construct(commentInterface $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function addComment()
    {
        $comment = request()->validate([
            'comment' => 'required|string|max:255',
        ]);
        try {
            return $this->success(
                $this->commentRepository->storeComment($comment, request('lessonId')),
                __('messages.store_Message')
            );
        } catch (\Throwable $th) {
            return $this->serverError($th);
        }
    }

    public function allComments()
    {
        $comments = $this->commentRepository->getComments(request('lessonId'));
        try {
            if ($comments->isEmpty()) {
                return $this->notFound(__('messages.Empty_Message'));
            }
            return $this->success($comments, __('messages.index_Message'));
        } catch (\Throwable $th) {
            return $this->serverError($th);
        }
    }

    public function updateComment()
    {
        $comment = request()->validate([
            'comment' => 'nullable|string|max:255',
        ]);
        try {
            $data = $this->commentRepository->updateComment($comment, request('id'));
            return $this->success($data, __('messages.update_Message'));
        } catch (\Throwable $th) {
            return $this->serverError($th);
        }
    }

    public function deleteComment()
    {
        try {
            return $this->success($this->commentRepository->deleteComment(request('id')), __('messages.delete_Message'));
        } catch (\Throwable $th) {
            return $this->serverError($th);
        }
    }
}