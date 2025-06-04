<?php

namespace App\Interfaces;

interface EnrollmentsInterface
{
    public function index();
    public function store($course_id,$price);
}


