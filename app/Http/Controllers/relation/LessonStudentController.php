<?php

namespace Empire\Http\Controllers\relation;

use Empire\Models\Lesson_Student;
use Illuminate\Http\Request;
use Empire\Http\Controllers\Controller;
use Empire\Models\Lesson;
use Empire\Models\Student;

class LessonStudentController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        $lessons = Lesson::orderby('start_date', 'DESC')->get();
        return view('admin/lesson_relation/create')->with('lessons', $lessons);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'sOptionalId' => 'required',
        ]);

        $sId = Student::where('optional_id', $request->get('sOptionalId'))->first()->id;

        $sLesson = new Lesson_Student();
        $sLesson->lessons_id =  $request->get('lessonId');
        $sLesson->students_id =  $sId;

        if($sLesson->save()) {
            return redirect('/');
        }else {
            return redirect()->back()->withInput()->withErrors('Save failed!');
        }
    }

    public function destroy($id)
    {
        lesson_student::find($id)->delete();
        return redirect('/');
    }

}
