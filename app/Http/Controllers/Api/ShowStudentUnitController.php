<?php

namespace Empire\Http\Controllers\Api;

use Empire\Models\Student;
use Empire\Http\Resources\StudentUnit;
use Empire\Models\StudentsCoursesInfo;
use Illuminate\Http\Request;
use Empire\Http\Controllers\Controller;

class ShowStudentUnitController extends Controller
{
    public function showStudentUnit(Request $request)
    {
        $studentEmail = $request['email'];
        $courseCode = $request['courseCode'];

        if(Student::where('email', $studentEmail)->first() != null)
        {
            StudentUnit::withoutWrapping();
            $data = new StudentUnit(StudentsCoursesInfo::where('email', $studentEmail)->where('course_code', $courseCode)->first());
            return response()->json($data,200,[],JSON_PRETTY_PRINT);

        }else{
            return "fail";
        }

    }
}
