<?php

namespace Empire\Http\Controllers\relation;

use Empire\Models\Trainer;
use Illuminate\Http\Request;
use Empire\Http\Controllers\Controller;
use Empire\Models\Lesson;
use Empire\Models\Lesson_Trainer;

class LessonTrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lessons = Lesson::orderby('start_date', 'DESC')->get();
        return view('admin/lesson_relation/enroltrainer')->with('lessons', $lessons);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'tOptionalId' => 'required',
        ]);

        $tId = Trainer::where('optional_id', $request->get('tOptionalId'))->first()->id;

        $tLesson = new Lesson_Trainer();
        $tLesson->lessons_id =  $request->get('lessonId');
        $tLesson->trainers_id =  $tId;

        if($tLesson->save()) {
            return redirect('/');
        }else {
            return redirect()->back()->withInput()->withErrors('Save failed!');
        }
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
        Lesson_Trainer::find($id)->delete();
        return redirect('/');
    }
}
