<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\Snippet;
use App\Observers\PostObserver;
use App\Observers\SnippetObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Post::observe(PostObserver::class);
        Snippet::observe(SnippetObserver::class);
    }
}
