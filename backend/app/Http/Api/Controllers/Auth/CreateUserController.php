<?php

namespace App\Http\Api\Controllers\Auth;

use Domain\Shared\Actions\UpsertUserAction;
use Domain\Shared\DataTransferObjects\UserData;

use Domain\Shared\ViewModels\UpsertUserViewModel;
use Illuminate\Http\Request;


class CreateUserController
{
    public function __invoke(UserData $data, Request $request): UpsertUserViewModel
    {
        return new UpsertUserViewModel(UpsertUserAction::execute($data));
    }
}
