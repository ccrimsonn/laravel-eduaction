<?php

namespace Empire\Http\Controllers\Resources;

use Illuminate\Http\Request;
use Empire\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Empire\Models\Lesson;
use Empire\Models\Audio;

class AudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Audio::orderBy('created_at', 'DESC')->get();
        return view('admin/learning_src/audio/audiomanage')->with('infos', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/learning_src/audio/audio_create');

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
            $path = Storage::putFile('audios', $request->file('audio_file'));
            $lessonId = Lesson::where('code', $request->get('lesson_code'))->first()->id;
        }else{
            return redirect()->back()->withInput()->withErrors('Course Code not found!');
        }

        $audio = new Audio();
        $audio->lessons_id =  $lessonId;
        $audio->name =  $request->get('name');
        $audio->description = $request->get('description');
        $audio->status = $request->get('status');
        $audio->dir = $path;

        if($audio->save()) {
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
        $info = Audio::where('id', $id)->first();
        $lessonId = $info->lessons_id;
        $lessonCode = Lesson::where('id', $lessonId)->first();
        return view('admin/learning_src/audio/audio_update')->with(['audio_id' => $id, 'info' => $info, 'lessoncode' => $lessonCode->code]);
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
            $path = Storage::putFile('audios', $request->file('audio_file'));
            $lessonId = Lesson::where('code', $request->get('lesson_code'))->first()->id;
        }else{
            return redirect()->back()->withInput()->withErrors('Course Code not found!');
        }

        $id = $request->get('id');
        $audio = Audio::find($id);
        $audio->lessons_id =  $lessonId;
        $audio->name =  $request->get('name');
        $audio->description = $request->get('description');
        $audio->status = $request->get('status');
        $audio->dir = $path;

        if($audio->save()) {
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
        Audio::find($id)->delete();
        return redirect('/');
    }
}
