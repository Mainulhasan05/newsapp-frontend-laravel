<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Models\Categories;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ContactUsController;

Route::get('/get',function (){
    return Categories::all();
});
Route::get('/',[HomeController::class,'index'])->name('home');


Route::get('/contact',[ContactUsController::class,'index'])->name('contact');
Route::post('/contact',[ContactUsController::class,'store'])->name('contactpost');

Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');

Route::get('/login',function(){
    return view('login');
})->name('login');

Route::get("/news",function(){
    return view('news');
});
