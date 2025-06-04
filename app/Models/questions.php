<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class questions extends Model
{
    protected $guarded = [];
    protected $table='questions';
    public function quizes()
    {
        return $this->belongsTo(quizes::class);
    }

}
