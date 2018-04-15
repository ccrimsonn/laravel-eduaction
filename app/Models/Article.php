<?php

namespace Empire\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';

    public function belongsToLessons()
    {
        return $this->belongsTo('Empire\Models\Lesson');
    }
}
