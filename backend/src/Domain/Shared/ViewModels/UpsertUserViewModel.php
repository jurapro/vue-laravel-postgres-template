<?php
namespace Domain\Shared\ViewModels;

use Domain\Shared\Models\User;

class UpsertUserViewModel extends ViewModel
{

    public function __construct(private readonly ?User $user)
    {
    }

    public function message(): string
    {
        return "Пользователь создан или обновлен";
    }
    public function userId(): string
    {
        return $this->user->id;
    }
}
