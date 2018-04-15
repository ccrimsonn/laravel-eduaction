<?php

namespace Empire\Http\Controllers\relation;

use Empire\Models\TrainerEnrol;
use Illuminate\Http\Request;
use Empire\Http\Controllers\Controller;
use Empire\Models\Student;
use Empire\Models\Trainer;
use Empire\Models\StudentEnrol;
use Empire\Models\Lesson;

class LessonManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($value)
    {
        if($value == "student")
        {
            return view('admin/lesson_relation/search')->with('value', $value);

        }elseif($value == "lesson"){

            return view('admin/lesson_relation/search')->with('value', $value);

        }else{

            return view('admin/lesson_relation/search')->with('value', $value);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request)
    {
        $optionalId = $request->get('optionalId');
        $code = $request->get('lesson_code');
        $tOptionalID = $request->get('TOptionalId');
        $studentOptionId = Student::where('optional_id', $optionalId)->first();
        $trainerOptionalId = Trainer::where('optional_id', $tOptionalID)->first();
        $classCode = Lesson::where('code', $code)->first();

        if($studentOptionId != null)
        {
            $studentLesson = StudentEnrol::where('optional_id', $optionalId)->get();
            return view('admin/lesson_relation/managestudent')->with(['infos' => $studentLesson, 'title' => 'Student Enrollment Information']);

        }elseif($trainerOptionalId != null)
        {
            $trainerLesson = TrainerEnrol::where('optional_id', $tOptionalID)->get();
            return view('admin/lesson_relation/managetrainer')->with(['infos' => $trainerLesson, 'title' => 'Trainer Enrollment Information']);

        }elseif($classCode != null)
        {
            $lessonStudent = StudentEnrol::where('code', $code)->get();
            return view('admin/lesson_relation/studentsInClass')->with(['infos' => $lessonStudent, 'title' => 'Class Information']);

        }elseif($studentOptionId == null && $trainerOptionalId == null)
        {
            return redirect()->back()->withInput()->withErrors('No ID or Code Found!');
        }
    }
}
