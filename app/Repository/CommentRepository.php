<?php

namespace App\Repository;

use App\Models\Comments;
use App\Interfaces\CommentInterface;
use Illuminate\Support\Facades\Auth;

class CommentRepository implements CommentInterface
{
    public function getComments($id)
    {
        return Comments::where('lesson_id', $id)->get();
    }

    public function getComment($id)
    {
        return Comments::find($id);
    }

    public function storeComment($data, $id)
    {
        return Comments::create([
            'lesson_id' => $id,
            'comment' => $data['comment'],
            'user_id' => Auth::user()->id
        ]);
    }

    public function updateComment($data, $id)
    {
        $comment = Comments::find($id);
        $comment->update($data);
        return $comment;
    }

    public function deleteComment($id)
    {
        $data = Comments::find($id);
        $data->delete();
        return $data;
    }
}