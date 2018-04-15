<?php

namespace Empire\Http\Controllers\Courses;

use Illuminate\Http\Request;
use Empire\Http\Controllers\Controller;
use Empire\Models\Course;

class CourseController extends Controller
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
        $this->validate($request,[
            'code' => 'required|unique:courses',
            'cricos_code' => 'required|unique:courses',
            'duration' => 'required|integer|min:0',
            'fee' => 'required|min:0',
        ]);

        $course = new Course();
        $course->name =  $request->get('name');
        $course->code = $request->get('code');
        $course->cricos_code = $request->get('cricos_code');
        $course->duration = $request->get('duration');
        $course->fee = $request->get('fee');
        $course->campus = $request->get('campus');

        if($course->save()) {
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
        $data = Course::find($id);
        return view('admin/course/course_update')->with(['data' => $data]);
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
        $course = Course::find($id);
        $course->name =  $request->get('name');
        $course->code = $request->get('code');
        $course->cricos_code = $request->get('cricos_code');
        $course->duration = $request->get('duration');
        $course->fee = $request->get('fee');
        $course->campus = $request->get('campus');

        if($course->save()) {
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
        Course::find($id)->delete();
        return redirect('/');
    }

    public function redirect($value)
    {
        if($value == "new"){
            return view('admin/course/course_create');
        }else{
            return view('admin/course/course_show');
        }
    }

    public function search(Request $request)
    {
        $code = $request->get('code');
        $data = Course::where('code', $code)->get();
        return view('admin/course/course_manage')->with(['datas' => $data]);
    }
}
