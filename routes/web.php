<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localizationRedirect', 'localeViewPath'],
    ],
    function () {
        Route::get('/', [PostController::class, 'index'])->name('home');
        Route::get(LaravelLocalization::transRoute('routes.posts.show'), [PostController::class, 'show'])->name('posts.show');
    }
);
