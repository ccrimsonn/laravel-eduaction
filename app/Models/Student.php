<?php

namespace Empire\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class Student extends Model
{
    use HasApiTokens;
    protected $table = 'students';
    protected $hidden = ['password', 'remember_token'];

    public function lessons()
    {
        return $this->belongsToMany('Empire\Models\Lesson');
    }
}
