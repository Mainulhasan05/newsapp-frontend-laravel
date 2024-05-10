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
        
        $shareButtons = [
            'facebook' => 'https://www.facebook.com/sharer/sharer.php?u=' . url()->current(),
            'twitter' => 'https://twitter.com/intent/tweet?url=' . url()->current(),
            'linkedin' => 'https://www.linkedin.com/shareArticle?mini=true&url=' . url()->current(),
            'whatsapp' => 'https://api.whatsapp.com/send?text=' . url()->current(),
        ];
        // Fetch trending news
        $trending_news = Posts::orderBy('views', 'desc')->take(5)->get();
        
        return view('news', compact('news', 'trending_news', 'shareButtons'));
        // return response()->json(['news' => $news, 'trending_news' => $trending_news]);
    }
}
