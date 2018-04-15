<?php

namespace Empire\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Lesson_Student extends Pivot
{
    protected $table = 'lesson_student';
}
