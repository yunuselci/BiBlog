<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SnippetUpdatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $snippet;
    public $publish_to_dev_to;


    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($snippet,$publish_to_dev_to = null)
    {
        $this->snippet = $snippet;
        $this->publish_to_dev_to = $publish_to_dev_to;

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
