<?php


namespace App\Repository;

use App\Interfaces\EnrollmentsInterface;
use App\Models\Enrollments;
use Illuminate\Support\Facades\Auth;

class EnrollmentRepository implements EnrollmentsInterface
{
    public function index()
    {
        $enrollments = Enrollments::get();
        return $enrollments;
    }
    public function store($course_id,$price)
    {
        return Enrollments::create([
            'courses_id' => $course_id,
            'user_id' => Auth::user()->id,
            'price' => $price,
        ]);
    }

}
