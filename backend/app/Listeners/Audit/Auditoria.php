<?php

namespace App\Listeners\Audit;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class Auditoria
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
     * @param object $event
     * @return void
     */
    public function handle($event)
    {
        \App\Models\Auditoria::create([
            'user_id' => $event->user->id,
            'acao' => 'create',
            'ip' => 'O usário ' . $event->user->name . ' registrou'
        ]);

        Log::info($event->user());
    }
}
