<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SnippetController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/laravel', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class,'index'])->name('home');

Route::get('/articles',[PostController::class,'index'])->name('articles');
Route::get('/articles/{slug}',[PostController::class,'show'])->name('article');

Route::get('/snippets',[SnippetController::class,'index'])->name('snippets');
Route::get('/snippets/{slug}',[SnippetController::class,'show'])->name('snippet');

Route::get('/about',[AboutController::class,'index'])->name('about');


