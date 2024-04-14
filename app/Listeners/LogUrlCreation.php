<?php

namespace App\Listeners;

use App\Events\UrlCreation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class LogUrlCreation
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     */
    public function handle(UrlCreation $event): void
    {

        // dd($event->url);
        Log::info($event->url);
    }
}
