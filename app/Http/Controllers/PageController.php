<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show($slug)
    {
        // Fetch the page by its slug
        $page = Page::where('slug', $slug)->firstOrFail();

        // You can then pass this $page to a view
        // For example:
        return view('pages', compact('page'));

        // Or you can directly return a JSON response
        // return response()->json($page);
    }
}
