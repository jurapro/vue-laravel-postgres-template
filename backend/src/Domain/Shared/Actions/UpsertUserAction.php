<?php

namespace Domain\Shared\Actions;

use Domain\Shared\DataTransferObjects\UserData;
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

        return $user;
    }
}
