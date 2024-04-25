<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Posts;

class NewsController extends Controller
{
    public function show($slug)
    {
        // Fetch the post along with its associated category
        $news = Posts::where('slug', $slug)->with('category')->firstOrFail();
        
        // Increment the views count
        $news->increment('views');
        
        // Fetch trending news
        $trending_news = Posts::orderBy('views', 'desc')->take(5)->get();
        
        return view('news', compact('news', 'trending_news'));
        // return response()->json(['news' => $news, 'trending_news' => $trending_news]);
    }
}
