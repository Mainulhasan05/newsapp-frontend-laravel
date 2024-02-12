<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
class ExtraController extends Controller
{
    public function English()
    {
        Session::get('lang');
        session()->forget('lang');
        Session()->put('lang','english');
        return redirect()->back();
    }
    public function Bangla()
    {
        Session::get('lang');
        session()->forget('lang');
        Session()->put('lang','bangla');
        return redirect()->back();
    }
}
