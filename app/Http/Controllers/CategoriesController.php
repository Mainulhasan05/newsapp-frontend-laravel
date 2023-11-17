<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\News;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    // show will receive slug as parameter
    public function show($slug){
        // get category by slug
        $category=Categories::where('slug',$slug)->firstOrFail();
        $latest_news=News::orderBy('id','desc')->take(5)->get();
        // get featured news 10
        $featured_news=News::where('is_featured',1)->orderBy('id','desc')->take(10)->get();
        // get all news of this category
        
        // get trending news
        $trending_news=News::orderBy('views','desc')->take(5)->get();
        print_r($category);
        return view('category',compact('category','latest_news','trending_news','featured_news','trending_news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categories $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categories $categories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categories $categories)
    {
        //
    }
}
