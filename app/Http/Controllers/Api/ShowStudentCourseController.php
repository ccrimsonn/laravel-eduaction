<?php

namespace Empire\Http\Controllers\Api;

use Empire\Models\Student;
use Empire\Http\Resources\StudentCourse;
use Empire\Models\StudentsCoursesInfo;
use Illuminate\Http\Request;
use Empire\Http\Controllers\Controller;

class ShowStudentCourseController extends Controller
{
    public function showStudentCourse(Request $request)
    {
        $studentEmail = $request['email'];

        if(Student::where('email', $studentEmail)->first() != null)
        {
            StudentCourse::withoutWrapping();
            $data = new StudentCourse(StudentsCoursesInfo::where('email', $studentEmail)->first());
            return response()->json($data,200,[],JSON_PRETTY_PRINT);
            //return StudentsCoursesInfo::where('email', $studentEmail)->first();

        }else{
            return "fail";
        }

    }
}
