<?php

namespace App\Repository;

use App\Events\NewDataEvent;
use App\Interfaces\CoursesInterface;
use App\Models\Courses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;

class CourseRepository implements CoursesInterface
{
    public function allCourses()
    {
        return Courses::all();
    }

    public function newCourses()
    {
        // Get the newest 3 courses
        return Courses::all()->reverse()->take(3);
    }

    public function getCourse($id)
    {
        $data = Courses::with('lessons')->find($id);
        return $data;
    }

    public function getCourseBySlug($slug)
    {
        $data = Courses::with('lessons')->where('slug', $slug)->first();
        return $data;
    }
    public function createCourse($data)
    {
        $data = Courses::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'price' => $data['price'],
            'categorey' => $data['categorey'],
            'duration' => $data['duration'],
            'start_date' => $data['start_date'],
            'slug' => str_replace(' ', '-', strtolower($data['title'])),
            'cover_photo' => $data['cover_photo']->store('courses', 'public'),
            'rating' => 4,
            'user_id' => Auth::user()->id
        ]);
        return $data;
    }

    public function updateCourse($id, $data)
    {
        $data = Courses::find($id)->update($data);
        return $data;
    }

    public function deleteCourse($id)
    {
        $data = Courses::findOrFail($id);
        $data->delete();
        return $data;
    }
}
