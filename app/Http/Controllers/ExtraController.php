<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExtraController extends Controller
{
    public function English()
    {
        $lang=session()->get('lang');
        if($lang=='en'){
            session()->put('lang','en');
        }else{
            session()->put('lang','en');
        }
        return redirect()->back();
    }
    public function Bangla()
    {
        $lang=session()->get('lang');
        if($lang=='bn'){
            session()->put('lang','bn');
        }else{
            session()->put('lang','bn');
        }
        return redirect()->back();
    }
}
