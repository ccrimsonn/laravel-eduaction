<?php

namespace Empire\Http\Controllers\Api;

use Empire\Models\Student;
use Empire\Http\Resources\StudentLesson;
use Empire\Models\StudentsCoursesInfo;
use Illuminate\Http\Request;
use Empire\Http\Controllers\Controller;

class ShowStudentLessonController extends Controller
{
    public function showStudentLesson(Request $request)
    {
        $studentEmail = $request['email'];

        if(Student::where('email', $studentEmail)->first() != null)
        {
            StudentLesson::withoutWrapping();
            $data = new StudentLesson(StudentsCoursesInfo::where('email', $studentEmail)->first());
            return response()->json($data,200,[],JSON_PRETTY_PRINT);

        }else{
            return "fail";
        }

    }
}
