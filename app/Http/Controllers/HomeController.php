<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Posts;

class HomeController extends Controller
{
    public function index()
{
    $featured_news = Posts::where('headline', 1)
                         ->where('is_published', 1)
                         ->orderBy('id', 'desc')
                         ->take(5)
                         ->get();

    $latest_news = Posts::where('is_published', 1)
                       ->orderBy('id', 'desc')
                       ->take(5)
                       ->get();

    $parentCategoriesWithNews = Categories::whereNull('parent_id')
        ->with(['posts' => function ($query) {
            $query->where('is_published', 1)
                  ->orderBy('id', 'desc')
                  ->take(20);
        }])
        ->get();

    return view('home', compact('featured_news', 'latest_news', 'parentCategoriesWithNews'));
}
}
