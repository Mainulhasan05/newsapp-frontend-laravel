<?php

use Illuminate\Support\Facades\Route;
use App\Models\Categories;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ContactUsController;


Route::get('/', function () {
    return view('home');
    // return Categories::query()->where('id',1)->select('name')->first();
});
// Route::get('/', function () {
//     return Categories->all();
//     // return view('home');
// });

Route::get('/contact',[ContactUsController::class,'index'])->name('contact');
Route::post('/contact',[ContactUsController::class,'store'])->name('contactpost');

Route::get('/get',function (){
    return Categories::all();
});
Route::get('/login',function(){
    return view('login');
})->name('login');