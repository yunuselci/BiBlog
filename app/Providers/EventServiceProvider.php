<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\Snippet;
use App\Observers\PostObserver;
use App\Observers\SnippetObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\PostCreatedEvent;
use App\Listeners\PostCreatedListener;
use App\Events\PostUpdatedEvent;
use App\Listeners\PostUpdatedListener;
use App\Events\SnippetCreatedEvent;
use App\Listeners\SnippetCreatedListener;
use App\Events\SnippetUpdatedEvent;
use App\Listeners\SnippetUpdatedListener;

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
        PostCreatedEvent::class => [
            PostCreatedListener::class,
        ],
        PostUpdatedEvent::class => [
            PostUpdatedListener::class,
        ],
        SnippetCreatedEvent::class => [
            SnippetCreatedListener::class,
        ],
        SnippetUpdatedEvent::class => [
            SnippetUpdatedListener::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
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
