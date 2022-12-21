<?php

namespace Domain\Shared\Actions;

use Domain\Shared\DataTransferObjects\UserData;
use Domain\Shared\Events\UpsertUserEvent;
use Domain\Shared\Models\User;

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
        event(new UpsertUserEvent($user));
        return $user;
    }
}
