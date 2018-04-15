<?php

namespace Empire\Http\Controllers\Resources;

use Illuminate\Http\Request;
use Empire\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Empire\Models\Lesson;
use Empire\Models\Video;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Video::orderBy('created_at', 'DESC')->get();
        return view('admin/learning_src/video/videomanage')->with('infos', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/learning_src/video/video_create');
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
            $path = Storage::putFile('videos', $request->file('video_file'));
            $lessonId = Lesson::where('code', $request->get('lesson_code'))->first()->id;
        }else{
            return redirect()->back()->withInput()->withErrors('Course Code not found!');
        }

        $video = new Video();
        $video->lessons_id =  $lessonId;
        $video->name =  $request->get('name');
        $video->description = $request->get('description');
        $video->status = $request->get('status');
        $video->dir = $path;

        if($video->save()) {
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
        $info = Video::where('id', $id)->first();
        $lessonId = $info->lessons_id;
        $lessonCode = Lesson::where('id', $lessonId)->first();
        return view('admin/learning_src/video/video_update')->with(['video_id' => $id, 'info' => $info, 'lessoncode' => $lessonCode->code]);
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
            $path = Storage::putFile('videos', $request->file('video_file'));
            $lessonId = Lesson::where('code', $request->get('lesson_code'))->first()->id;
        }else{
            return redirect()->back()->withInput()->withErrors('Course Code not found!');
        }

        $id = $request->get('id');
        $video = Video::find($id);
        $video->lessons_id =  $lessonId;
        $video->name =  $request->get('name');
        $video->description = $request->get('description');
        $video->status = $request->get('status');
        $video->dir = $path;

        if($video->save()) {
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
        Video::find($id)->delete();
        return redirect('/');
    }
}
