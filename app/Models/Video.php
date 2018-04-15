<?php

namespace Empire\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'videos';

    public function belongsToLessons()
    {
        return $this->belongsTo('Empire\Models\Lesson');
    }
}
