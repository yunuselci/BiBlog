<?php

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

Route::get('/', function () {
    return view('home');
});

Route::get('/articles', function () {
    return view('articles');
});

Route::get('/snippets', function () {
    return view('snippets');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/snippet', function () {
    return view('snippet');
});
