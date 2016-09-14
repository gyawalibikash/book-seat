<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Events\Event;
use App\Models\BookSeat;

class TruncateBookSeatEvent extends Event
{
    use SerializesModels;

    public $bookseat;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(BookSeat $bookseat)
    {
        $this->bookseat = $bookseat;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
