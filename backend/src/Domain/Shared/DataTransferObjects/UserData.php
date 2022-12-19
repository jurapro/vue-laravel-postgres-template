<?php
namespace Domain\Shared\DataTransferObjects;

use Illuminate\Validation\Rule;
use Spatie\LaravelData\Data;

class UserData extends Data
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $email,
        public readonly string $name,
        public readonly ?string $password,
    ) {}

    public static function rules(): array
    {
        return [
            'email' => [
                'required',
                'email',
               // Rule::unique('users', 'email'),
            ],
            'name' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }
}
