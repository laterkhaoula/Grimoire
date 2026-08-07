<?php

namespace App\Listeners;

use App\Events\MemberAdded;
use App\Notifications\MemberAddedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendMemberNotification implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Handle the event.
     */
    public function handle(MemberAdded $event): void
    {
        $event->user->notify(
            new MemberAddedNotification($event->project)
        );
    }
}