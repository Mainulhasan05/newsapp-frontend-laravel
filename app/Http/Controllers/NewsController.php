<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Posts;

class NewsController extends Controller
{
    public function show($slug)
    {
        $news = Posts::where('slug', $slug)->firstOrFail();
        $news->increment('views');
        
        $trending_news=Posts::orderBy('views','desc')->take(5)->get();
        return view('news', compact('news','trending_news'));
    }
}
