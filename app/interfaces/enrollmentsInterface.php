<?php

namespace App\Interfaces;

interface EnrollmentsInterface
{
    public function index($id);
    public function store($course_id, $price);
}