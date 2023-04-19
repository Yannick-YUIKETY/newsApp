<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        $newsModel = News::orderBy('created_at','desc')->paginate(10) ;
        return view ('news',compact('newsModel')) ;
    }

    public function detail($id = 0){

        $newsModel =News::findOrFail($id) ;

        return view(('detail'))  ;
    }
}

