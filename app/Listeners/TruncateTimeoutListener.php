<?php

namespace App\Listeners;

use App\Events\TruncateBookSeatEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TruncateTimeoutListener
{
    protected $bookseat;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  TruncateBookSeatEvent  $event
     * @return void
     */
    public function handle(TruncateBookSeatEvent $event)
    {
        $this->bookseat = $event->bookseat;
        $this->bookseat->truncate();
    }
}
