<?php

declare(strict_types=1);

namespace src\User\Application\Builder;

use App\Models\User as UserEloquentModel;
use src\User\Application\UseCase\Request\CreateRequest;
use src\User\Domain\Entity\User;

class UserBuilder
{
    public function fromCreate(CreateRequest $request): User
    {
        return new User(
            id: null,
            name: $request->name,
            chatId: $request->chatId
        );
    }

    public function fromEloquentModel(UserEloquentModel $user): ?User
    {
        return new User(
            id: $user->id,
            name: $user->name,
            chatId: $user->chat_id
        );
    }
}
