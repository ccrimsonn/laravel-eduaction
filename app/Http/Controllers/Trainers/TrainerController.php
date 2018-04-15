<?php

namespace Empire\Http\Controllers\Trainers;

use Empire\Models\Trainer;
use Illuminate\Http\Request;
use Empire\Http\Controllers\Controller;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/trainer/trainer_search');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/trainer/create');

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
            'optional_id' => 'required|unique:trainers',
            'email' => 'required|unique:trainers',
        ]);

        $trainer = new Trainer();
        $trainer->first_name = $request->get('first_name');
        $trainer->surname = $request->get('surname');
        $trainer->dob = $request->get('dob');
        $trainer->gender = $request->get('gender');
        $trainer->phone = $request->get('phone');
        $trainer->address = $request->get('address');
        $trainer->email = $request->get('email');
        $trainer->campus = $request->get('campus');
        $trainer->nationality = $request->get('nationality');
        $trainer->optional_id = $request->get('optional_id');

        if($trainer->save()) {
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
        $data = Trainer::find($id);
        return view('admin/trainer/trainer_update')->with(['data' => $data]);
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
        $trainer = Trainer::find($id);
        $trainer->first_name = $request->get('first_name');
        $trainer->surname = $request->get('surname');
        $trainer->dob = $request->get('dob');
        $trainer->gender = $request->get('gender');
        $trainer->phone = $request->get('phone');
        $trainer->address = $request->get('address');
        $trainer->email = $request->get('email');
        $trainer->campus = $request->get('campus');
        $trainer->nationality = $request->get('nationality');
        $trainer->optional_id = $request->get('optional_id');

        if($trainer->save()) {
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
        Trainer::find($id)->delete();
        return redirect('/');
    }

    public function search(Request $request)
    {
        $optional_id = $request->get('id');
        $data = Trainer::where('optional_id', $optional_id)->get();
        return view('admin/trainer/trainer_manage')->with(['datas' => $data]);
    }
}
