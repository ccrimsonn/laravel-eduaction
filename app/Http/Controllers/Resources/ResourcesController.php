<?php

namespace Empire\Http\Controllers\Resources;

use Illuminate\Http\Request;
use Empire\Http\Controllers\Controller;

class ResourcesController extends Controller
{
    public function redirect($value){
        if($value == 'article')
        {
            return view('admin/learning_src/srchome')->with(['type' => 'Class Note', 'url' => 'article']);

        }elseif($value == 'assessment')
        {
            return view('admin/learning_src/srchome')->with(['type' => 'Assessment', 'url' => 'assessment']);

        }elseif($value == 'audio')
        {
            return view('admin/learning_src/srchome')->with(['type' => 'Audio', 'url' => 'audio']);

        }elseif($value == 'video')
        {
            return view('admin/learning_src/srchome')->with(['type' => 'Video', 'url' => 'video']);

        }
    }
}
