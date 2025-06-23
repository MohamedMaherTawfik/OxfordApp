<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $guarded = [];
    protected $table = 'courses';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lessons()
    {
        return $this->hasMany(lesson::class);
    }

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollments::class);
    }

    public function category()
    {
        return $this->belongsTo(categories::class, 'categorey_id', 'id');
    }

    public function review()
    {
        return $this->hasMany(Reviews::class);
    }
}