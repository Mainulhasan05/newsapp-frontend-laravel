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
        // get last 5 news
        $latest_news=News::orderBy('id','desc')->take(5)->get();
        // print $latest_news;
 
        
        return view("home",['categories'=>$categories,'latest_news'=>$latest_news]);
    }
}
