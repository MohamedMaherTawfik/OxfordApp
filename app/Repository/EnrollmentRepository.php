<?php


namespace App\Repository;

use App\Interfaces\EnrollmentsInterface;
use App\Models\Courses;
use App\Models\Enrollments;
use Illuminate\Support\Facades\Auth;

class EnrollmentRepository implements EnrollmentsInterface
{
    public function index($id)
    {
        $enrollments = Courses::with('enrollments')->where('id', $id)->get();
        return $enrollments;
    }
    public function store($course_id, $price)
    {
        return Enrollments::create([
            'courses_id' => $course_id,
            'user_id' => Auth::user()->id,
            'price' => $price,
            'enrolled' => 'yes',
        ]);
    }

}