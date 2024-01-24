<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Models\Categories;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\UserController;

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
