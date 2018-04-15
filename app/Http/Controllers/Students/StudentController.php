<?php

namespace Empire\Http\Controllers\Students;

use Illuminate\Http\Request;
use Empire\Http\Controllers\Controller;
use Empire\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
            'optional_id' => 'required|unique:students',
            'email' => 'required|unique:students',
            'passport' => 'required|unique:students',
            'password' => 'required|string|min:6',
        ]);

        $student = new Student;
        $student->password =  bcrypt($request->get('password'));
        $student->first_name = $request->get('first_name');
        $student->surname = $request->get('surname');
        $student->dob = $request->get('dob');
        $student->gender = $request->get('gender');
        $student->passport = $request->get('passport');
        $student->phone = $request->get('phone');
        $student->address = $request->get('address');
        $student->email = $request->get('email');
        $student->type = $request->get('type');
        $student->campus = $request->get('campus');
        $student->nationality = $request->get('nationality');
        $student->optional_id = $request->get('optional_id');
        $student->note = $request->get('note');

        if($student->save()) {
            return redirect('/');
        }else {
            return redirect()->back()->withInput()->withErrors('Save failed!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $optional_id = $request->get('id');
        $data = Student::where('optional_id', $optional_id)->get();
        return view('admin/student/student_delete')->with(['datas' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Student::find($id);
        return view('admin/student/student_show')->with(['data' => $data]);
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
        $student = Student::find($id);
        $student->first_name = $request->get('first_name');
        $student->surname = $request->get('surname');
        $student->dob = $request->get('dob');
        $student->gender = $request->get('gender');
        $student->passport = $request->get('passport');
        $student->phone = $request->get('phone');
        $student->address = $request->get('address');
        $student->email = $request->get('email');
        $student->type = $request->get('type');
        $student->campus = $request->get('campus');
        $student->nationality = $request->get('nationality');
        $student->optional_id = $request->get('optional_id');
        $student->note = $request->get('note');

        if($student->save()) {
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
        Student::find($id)->delete();
        return redirect('/');
    }

    public function redirect($value)
    {
        if($value == "new")
        {
            return view('admin/student/newstudent');
        }
        elseif($value == "search")
        {
            return view('admin/student/student_info');
        }
    }
}
