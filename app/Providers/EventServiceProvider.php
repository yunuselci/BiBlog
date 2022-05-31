<?php

namespace App\Providers;

use App\Models\Post;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;


class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen('routes.translation', function ($locale, $attributes) {

            $post = Post::query()
                ->whereRelation('translations', 'slug', $attributes)
                ->first();
            $relatedPost = Post::query()
                ->whereRelation('translations', 'post_id', $post->id)
                ->whereRelation('translations', 'locale', $locale)
                ->firstOrFail();

            logger()->info($relatedPost->slug);
            return $relatedPost->slug;
        });
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
