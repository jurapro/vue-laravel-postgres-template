<?php

namespace Domain\Shared\Listeners;


use Domain\Shared\Events\UpsertUserEvent;
use Illuminate\Support\Facades\Log;

class UpsertUserListener
{
    public function handle(UpsertUserEvent $event)
    {
        Log::info('UpsertUserEvent');
    }
}
