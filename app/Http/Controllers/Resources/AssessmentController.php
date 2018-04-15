<?php

namespace Empire\Http\Controllers\Resources;

use Illuminate\Http\Request;
use Empire\Http\Controllers\Controller;
use Empire\Models\Lesson;
use Empire\Models\Assessment;
use Illuminate\Support\Facades\Storage;

class AssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Assessment::orderBy('created_at', 'DESC')->get();
        return view('admin/learning_src/assessment/assessmentmanage')->with('infos', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/learning_src/assessment/assessment_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Lesson::where('code', $request->get('lesson_code'))->count() != 0)
        {
            $path = Storage::putFile('assessments', $request->file('assessment_file'));
            $lessonId = Lesson::where('code', $request->get('lesson_code'))->first()->id;
        }else{
            return redirect()->back()->withInput()->withErrors('Course Code not found!');
        }

        $assessment = new Assessment();
        $assessment->lessons_id =  $lessonId;
        $assessment->name =  $request->get('name');
        $assessment->description = $request->get('description');
        $assessment->status = $request->get('status');
        $assessment->dir = $path;

        if($assessment->save()) {
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
        $info = Assessment::where('id', $id)->first();
        $lessonId = $info->lessons_id;
        $lessonCode = Lesson::where('id', $lessonId)->first();
        return view('admin/learning_src/assessment/assessment_update')->with(['assessment_id' => $id, 'info' => $info, 'lessoncode' => $lessonCode->code]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if(Lesson::where('code', $request->get('lesson_code'))->count() != 0)
        {
            $path = Storage::putFile('assessments', $request->file('assessment_file'));
            $lessonId = Lesson::where('code', $request->get('lesson_code'))->first()->id;
        }else{
            return redirect()->back()->withInput()->withErrors('Course Code not found!');
        }

        $id = $request->get('id');
        $assessment = Assessment::find($id);
        $assessment->lessons_id =  $lessonId;
        $assessment->name =  $request->get('name');
        $assessment->description = $request->get('description');
        $assessment->status = $request->get('status');
        $assessment->dir = $path;

        if($assessment->save()) {
            return redirect('/');
        }else {
            return redirect()->back()->withInput()->withErrors('Save failed!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Assessment::find($id)->delete();
        return redirect('/');
    }
}
