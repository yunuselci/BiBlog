<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localize', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {
        Route::get('/', [PostController::class, 'index'])->name('home');

        // TODO: Aşağıdaki senaryonun fixlenmesi gerekiyor.
        // Siteyi ingilizce olarak açalım.
        // Türkçe bir makaleye link üzerinden açalım.
        // Makaleyi göstermek yerinde İngilizce sitenin anasayfasına yönlendiriyor.
        Route::get(LaravelLocalization::transRoute('routes.posts.show'), [PostController::class, 'show'])->name('posts.show');
    }
);
