<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Models\Categories;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\ExtraController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;

Route::get('/get',function (){
    return Categories::all();
});
Route::get('/',[HomeController::class,'index'])->name('home');


Route::get('/contact',[ContactUsController::class,'index'])->name('contact');
Route::post('/contact',[ContactUsController::class,'store'])->name('contactpost');

Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');
// create route for categories category/slug
Route::get('/category/{slug}', [CategoriesController::class, 'show'])->name('category.show');

Route::get('/login',function(){
    return view('login');
})->name('login');

Route::post('/login',[UserController::class,'login'])->name('login.post');

Route::get('/register',function(){
    return view('register');
})->name('register');
Route::post('/register',[UserController::class,'register'])->name('register.post');

Route::get("/news",function(){
    return view('news');
});


Route::get('/logout',[UserController::class,'logout'])->name('auth.logout');
Route::get('/profile',[UserController::class,'profile'])->name('auth.profile');

Route::get('/lang/english',[ExtraController::class,'English'])->name('lang.english');
Route::get('/lang/bangla',[ExtraController::class,'Bangla'])->name('lang.bangla');

Route::get('/pages/{slug}', 'PageController@show')->name('pages.show');


