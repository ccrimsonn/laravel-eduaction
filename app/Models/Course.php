<?php

namespace Empire\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';

    public function hasManyUnits()
    {
        return $this->hasMany('Empire\Models\Unit');
    }
}
