<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocalizationController;
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


Route::get('/', [HomeController::class,'index'])->name('home');
//articles ( posts )
Route::get('/articles',[PostController::class,'index'])->name('articles');
Route::get('/articles/{slug}',[PostController::class,'show'])->name('article');
//snippets
Route::get('/snippets',[SnippetController::class,'index'])->name('snippets');
Route::get('/snippets/{slug}',[SnippetController::class,'show'])->name('snippet');
//about page
Route::get('/about',[AboutController::class,'index'])->name('about');

//Localization Route
Route::get('locale/{lang}',[LocalizationController::class,'setLang']);
