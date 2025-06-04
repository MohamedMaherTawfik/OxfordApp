<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class quizes extends Model
{
    protected $guarded = [];
    protected $table = 'quizes';
    public function lesson()
    {
        return $this->belongsTo(lesson::class);
    }

    public function questions()
    {
        return $this->hasMany(questions::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
