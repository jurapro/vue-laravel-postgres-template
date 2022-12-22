<?php

namespace Domain\Shared\Actions;

use Domain\Shared\DataTransferObjects\UserData;
use Domain\Shared\Events\UpsertUserEvent;
use Domain\Shared\Models\User;
use Illuminate\Support\Facades\Log;

class UpsertUserAction
{
    public static function execute(UserData $data): User
    {
        $user = User::updateOrCreate(
            [
                'id' => $data->id,
            ],
            [
                ...$data->all(),
            ],
        );
        Log::info('UpsertUserAction');
        event(new UpsertUserEvent($user));
        return $user;
    }
}
