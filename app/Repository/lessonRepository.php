<?php

namespace App\Repository;

use App\Interfaces\LessonInterface;
use App\Models\lesson;
use Illuminate\Support\Facades\Auth;

class lessonRepository implements LessonInterface
{
    public function allLessons($id)
    {
        return lesson::where('courses_id', $id)->get();
    }

    public function getLesson($id)
    {
        return lesson::with('comments', 'assignments')->find($id);
    }

    public function createLesson($data, $id)
    {
        $lesson = lesson::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'video' => $data['video'],
            'courses_id' => $id,
            'image' => $data['image'],
            'user_id' => Auth::user()->id,
            'slug' => str_replace(' ', '-', strtolower($data['title'])),
        ]);
        return $lesson;
    }

    public function updateLesson($data, $id)
    {
        $lesson = lesson::find($id);
        $lesson->update($data);
        return $lesson;
    }

    public function deleteLesson($id)
    {
        $data = lesson::find($id)->delete();
        return $data;
    }

    public function getLessonBySlug($slug)
    {
        return lesson::with('comments')->where('slug', $slug)->first();
    }

}