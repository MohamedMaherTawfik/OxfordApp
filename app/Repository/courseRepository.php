<?php

namespace app\Repository;

use App\Events\NewDataEvent;
use App\Interfaces\CourseInterface;
use App\Models\Courses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;

class CourseRepository implements CourseInterface
{
    public function allCourses()
    {
        return Courses::paginate(10);
    }

    public function allCoursesPaginated()
    {
        return Courses::paginate(3);
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
            'categorey_id' => $data['category_id'],
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
