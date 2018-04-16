<?php

namespace Empire\Http\Controllers\Units;

use Illuminate\Http\Request;
use Empire\Http\Controllers\Controller;
use Empire\Models\Unit;
use Empire\Models\Course;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/unit/unit_search');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/unit/create');
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
            'course_code' => 'required',
            'name' => 'required|unique:units',
            'code' => 'required|unique:units',
            'duration' => 'required|integer|min:0',
            'fee' => 'required|min:0',
            'description' => 'required',
        ]);
        if(Course::where('code', $request->get('course_code'))->count() != 0)
        {
            $course_id = Course::where('code', $request->get('course_code'))->first()->id;
        }else{
            return redirect()->back()->withInput()->withErrors('Unit Code not found!');
        }

        $unit = new Unit();
        $unit->course_id =  $course_id;
        $unit->name =  $request->get('name');
        $unit->code = $request->get('code');
        $unit->duration = $request->get('duration');
        $unit->cost = $request->get('fee');
        $unit->description = $request->get('description');

        if($unit->save()) {
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
        $data = Unit::find($id);
        return view('admin/unit/unit_update')->with(['data' => $data]);
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
        $unit = Unit::find($id);
        $unit->name =  $request->get('name');
        $unit->code = $request->get('code');
        $unit->duration = $request->get('duration');
        $unit->cost = $request->get('fee');
        $unit->description = $request->get('description');

        if($unit->save()) {
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
        Unit::find($id)->delete();
        return redirect('/');
    }

    public function search(Request $request)
    {
        $code = $request->get('code');
        $data = Unit::where('code', $code)->get();
        $course_id = Unit::where('code', $code)->first()->course_id;
        $course_name = Course::find($course_id)->first()->name;
        return view('admin/unit/unit_manage')->with(['datas' => $data, 'course_name' => $course_name]);
    }
}
