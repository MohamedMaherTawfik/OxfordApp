<?php

namespace App\Interfaces;

interface CoursesInterface{
    public function allCourses();
    public function newCourses();
    public function getCourse($id);
    public function createCourse($data);
    public function updateCourse($id,$data);
    public function deleteCourse($id);
}