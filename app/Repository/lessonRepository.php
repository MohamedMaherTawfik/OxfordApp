<?php

namespace App\Repository;

use App\Events\NewDataEvent;
use App\Interfaces\LessonInterface;
use App\Models\Courses;
use App\Models\Lesson;
use Illuminate\Support\Facades\Auth;

class lessonRepository implements LessonInterface
{
    public function allLessons($id)
    {
        return Lesson::where('courses_id',$id)->get();
    }

    public function getLesson($id)
    {
        return Lesson::find($id);
    }

    public function createLesson($data, $id)
    {
        $lesson= Lesson::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'video' => $data['video'],
            'courses_id' => $id,
            'image' => $data['image'],
            'user_id' => Auth::user()->id
        ]);
        return $lesson;
    }

    public function updateLesson($data, $id)
    {
        $lesson = Lesson::find($id);
        $lesson->update($data);
        return $lesson;
    }

    public function deleteLesson($id)
    {
        $data= Lesson::find($id);
        $data->delete($id);
        return $data;
    }


}
