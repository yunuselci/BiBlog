<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SnippetController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localize', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ],
    function()
{
    Route::get('/', [HomeController::class,'index'])->name('home');
//articles ( posts )
    Route::get(LaravelLocalization::transRoute('routes.articles'),[PostController::class,'index'])->name('articles');
    Route::get(LaravelLocalization::transRoute('routes.article'),[PostController::class,'show'])->name('article');
//snippets
    Route::get(LaravelLocalization::transRoute('routes.snippets'),[SnippetController::class,'index'])->name('snippets');
    Route::get(LaravelLocalization::transRoute('routes.snippet'),[SnippetController::class,'show'])->name('snippet');
//about page
    Route::get(LaravelLocalization::transRoute('routes.about'),[AboutController::class,'index'])->name('about');
});


