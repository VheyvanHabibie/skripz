<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PengumumanBroadcast implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $title;
    public $message;
    public $created_at;

    // Pass the title and message to the constructor
    public function __construct($title, $message, $created_at)
    {
        $this->title = $title;
        $this->message = $message;
        $this->created_at = $created_at;
    }

    // Define the channel the event will be broadcasted on
    public function broadcastOn()
    {
        return new Channel('pengumuman');  // All users can listen on this channel
    }

    // Broadcast the data that will be sent to the client
    public function broadcastWith()
    {
        \Log::info('Broadcasting Pengumuman Event:', ['title' => $this->title, 'message' => $this->message, 'created_at' => $this->created_at]);

        return [
            'title' => $this->title,
            'message' => $this->message,
            'created_at' => $this->created_at,
        ];
    }
}

