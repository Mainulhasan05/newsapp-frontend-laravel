<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function show($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();
        $news->increment('views');
        // get trending news
        $trending_news=News::orderBy('views','desc')->take(5)->get();
        return view('news', compact('news','trending_news'));
    }
}
