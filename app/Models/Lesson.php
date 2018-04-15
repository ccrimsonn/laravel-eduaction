<?php

namespace Empire\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $table = 'lessons';

    public function students()
    {
        return $this->belongsToMany('Empire\Models\Student');
    }

    public function trainers()
    {
        return $this->belongsToMany('Empire\Models\Trainer');
    }
}
