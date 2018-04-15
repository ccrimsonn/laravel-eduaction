<?php

namespace Empire\Models;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    protected $table = 'assessments';

    public function belongsToLessons()
    {
        return $this->belongsTo('Empire\Models\Lesson');
    }
}
