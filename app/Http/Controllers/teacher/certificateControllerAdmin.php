<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\accessMeeting;
use App\Models\Courses;
use App\Models\CourseSchedule;
use App\Models\Enrollments;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class certificateControllerAdmin extends Controller
{
    public function index(Courses $course)
    {
        $schedules = CourseSchedule::where('courses_id', $course->id)->get();
        return view('adminCourse.schedules.index', compact('course', 'schedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Courses $course)
    {
        $day = request('day');
        return view('adminCourse.schedules.create', compact('course', 'day'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Courses $course)
    {
        $data = $request->except('_token');
        $data['courses_id'] = $course->id;
        CourseSchedule::create($data);
        return redirect()->route('admin.course-schedules.index', $course)->with('success', 'Schedule created successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseSchedule $courseSchedule)
    {
        $courseSchedule->delete();
        return redirect()->back()->with('success', 'Schedule deleted successfully!');
    }

    public function students(Courses $course)
    {
        $day = request('day');
        $enrollments = Enrollments::where('courses_id', $course->id)->pluck('user_id');
        $users = User::whereIn('id', $enrollments)->get();
        $access = accessMeeting::where('day', $day)->where('courses_id', $course->id)->get();
        return view('adminCourse.schedules.assigns', compact('course', 'users', 'day', 'access'));
    }


    public function access(Courses $course, $day)
    {
        $userIds = request('users', []); // مصفوفة المستخدمين المختارين

        foreach ($userIds as $userId) {
            accessMeeting::create([
                'user_id' => $userId,
                'teacher_id' => Auth::id(),
                'courses_id' => $course->id,
                'access' => true,
                'day' => $day,
            ]);
        }

        return redirect()->back()->with('success', 'Access granted successfully!');
    }

    public function revoke(accessMeeting $access)
    {
        $access->delete();
        return redirect()->back()->with('success', 'Access removed successfully');
    }


}