<?php

namespace Empire\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = 'units';

    public function hasManyLessons()
    {
        return $this->hasMany('Empire\Models\Lesson');
    }
}
