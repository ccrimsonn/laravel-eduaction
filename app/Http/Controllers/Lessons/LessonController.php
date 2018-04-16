<?php

namespace Empire\Http\Controllers\Lessons;

use Illuminate\Http\Request;
use Empire\Http\Controllers\Controller;
use Empire\Models\Unit;
use Empire\Models\Lesson;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/lesson/lesson_search');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/lesson/create');
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
            'unit_code' => 'required',
            'name' => 'required|unique:lessons',
            'code' => 'required|unique:lessons',
            'duration' => 'required|integer|min:0',
            'delivery_mode' => 'required',
            'description' => 'required',
        ]);
        if(Unit::where('code', $request->get('unit_code'))->count() != 0)
        {
            $unit_id = Unit::where('code', $request->get('unit_code'))->first()->id;
        }else{
            return redirect()->back()->withInput()->withErrors('Course Code not found!');
        }

        $lesson = new Lesson();
        $lesson->units_id =  $unit_id;
        $lesson->name =  $request->get('name');
        $lesson->code = $request->get('code');
        $lesson->duration = $request->get('duration');
        $lesson->delivery_mode = $request->get('delivery_mode');
        $lesson->start_date = $request->get('start_date');
        $lesson->end_date = $request->get('end_date');
        $lesson->description = $request->get('description');

        if($lesson->save()) {
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
        $data = Lesson::find($id);
        return view('admin/lesson/lesson_update')->with(['data' => $data]);
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
        $id = $request->get('id');
        $lesson = Lesson::find($id);
        $lesson->name =  $request->get('name');
        $lesson->code = $request->get('code');
        $lesson->duration = $request->get('duration');
        $lesson->delivery_mode = $request->get('delivery_mode');
        $lesson->start_date = $request->get('start_date');
        $lesson->end_date = $request->get('end_date');
        $lesson->description = $request->get('description');

        if($lesson->save()) {
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
        Lesson::find($id)->delete();
        return redirect('/');
    }

    public function search(Request $request)
    {
        $code = $request->get('code');
        $data = Lesson::where('code', $code)->get();
        $unit_id = Lesson::where('code', $code)->first()->units_id;
        $unit_name = Unit::find($unit_id)->first()->name;
        return view('admin/lesson/lesson_manage')->with(['datas' => $data, 'unit_name' => $unit_name]);
    }
}
