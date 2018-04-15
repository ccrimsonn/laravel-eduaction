<?php

namespace Empire\Http\Controllers\Api;

use Empire\Models\Course;
use Illuminate\Http\Request;
use Empire\Http\Controllers\Controller;
use Empire\Http\Resources\AllCoursesApiResource;

class AllCoursesApiController extends Controller
{
    public function getAllCourses()
    {
        AllCoursesApiResource::withoutWrapping();
        $data = new AllCoursesApiResource(Course::all());
        return response()->json($data,200,[],JSON_PRETTY_PRINT);
    }
}
