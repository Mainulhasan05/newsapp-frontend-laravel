<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Posts;
class HomeController extends Controller
{
    public function index()
    {
        $categories=Categories::all();
        // get 5 header news, headline=1
        $header_news=Posts::where('headline',1)->orderBy('id','desc')->take(5)->get();
        
        $latest_news=Posts::orderBy('id','desc')->take(5)->get();
        // get featured news 10
        $first_section_thumbnail_news=Posts::where('first_section_thumbnail',1)->orderBy('id','desc')->take(10)->get();
        $big_thumbnail_news=Posts::where('big_thumbnail',1)->orderBy('id','desc')->take(10)->get();
 
        // return response()->json(['categories'=>$categories,'latest_news'=>$latest_news,'first_section_thumbnail_news'=>$first_section_thumbnail_news]);
        return view("home",['categories'=>$categories,'latest_news'=>$latest_news,'first_section_thumbnail_news'=>$first_section_thumbnail_news]
        ,['big_thumbnail_news'=>$big_thumbnail_news,'header_news'=>$header_news]);
    }
}
