<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class teacherController extends Controller
{
    public function dashboard()
    {
        return view('teacherDashboard.index');
    }

    public function showCourse()
    {

    }

    public function createCourse()
    {
        return view('admin.teachers.create');
    }

    public function storeCourse()
    {

    }

    public function editCourse()
    {

    }

    public function updateCourse()
    {

    }

    public function deleteCourse()
    {

    }
}