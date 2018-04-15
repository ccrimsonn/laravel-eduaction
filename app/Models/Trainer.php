<?php

namespace Empire\Models;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $table = 'trainers';

    public function lessons()
    {
        return $this->belongsToMany('Empire\Models\Lesson');
    }
}
