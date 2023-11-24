<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\News;
class HomeController extends Controller
{
    public function index()
    {
        $categories=Categories::all();
        // get 5 header news, is_header=1
        $header_news=News::where('is_header',1)->orderBy('id','desc')->take(5)->get();
        
        $latest_news=News::orderBy('id','desc')->take(5)->get();
        // get featured news 10
        $featured_news=News::where('is_featured',1)->orderBy('id','desc')->take(10)->get();
 
        
        return view("home",['categories'=>$categories,'latest_news'=>$latest_news,'featured_news'=>$featured_news]
        ,['header_news'=>$header_news]);
    }
}
