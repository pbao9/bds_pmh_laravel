<?php

namespace App\Listeners\Auth;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogSuccessfulLogout
{
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        //
        $event->user->loginLog()->create([
            'time' => now(),
            'content' => __('Đã đăng xuất khỏi hệ thống.')
        ]);
    }
}
