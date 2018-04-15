<?php

namespace Empire\Models;

use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    protected $table = 'audios';

    public function belongsToLessons()
    {
        return $this->belongsTo('Empire\Models\Lesson');
    }
}
