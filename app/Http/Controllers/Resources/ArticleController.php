<?php

namespace Empire\Http\Controllers\Resources;

use Empire\Models\Article;
use Illuminate\Http\Request;
use Empire\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Empire\Models\Lesson;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Article::orderBy('created_at', 'DESC')->get();

        return view('admin/learning_src/article/articlemanage')->with('infos', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/learning_src/article/article_create');
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
            $path = Storage::putFile('articles', $request->file('article_file'));
            $lessonId = Lesson::where('code', $request->get('lesson_code'))->first()->id;
        }else{
            return redirect()->back()->withInput()->withErrors('Course Code not found!');
        }

        $article = new Article();
        $article->lessons_id =  $lessonId;
        $article->name =  $request->get('name');
        $article->description = $request->get('description');
        $article->status = $request->get('status');
        $article->dir = $path;

        if($article->save()) {
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
        $articleInfo = Article::where('id', $id)->first();
        $lessonId = $articleInfo->lessons_id;
        $lessonCode = Lesson::where('id', $lessonId)->first();
        return view('admin/learning_src/article/article_update')->with(['articleId' => $id, 'articleInfos' => $articleInfo, 'lessoncode' => $lessonCode->code]);
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
            $path = Storage::putFile('articles', $request->file('article_file'));
            $lessonId = Lesson::where('code', $request->get('lesson_code'))->first()->id;
        }else{
            return redirect()->back()->withInput()->withErrors('Course Code not found!');
        }

        $id = $request->get('id');
        $article = Article::find($id);
        $article->lessons_id =  $lessonId;
        $article->name =  $request->get('name');
        $article->description = $request->get('description');
        $article->status = $request->get('status');
        $article->dir = $path;

        if($article->save()) {
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
        Article::find($id)->delete();
        return redirect('/');
    }
}
