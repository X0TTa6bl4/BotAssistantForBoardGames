<?php

declare(strict_types=1);

namespace src\EntityCard\Application\Builder;

use App\Models\User as UserEloquentModel;
use src\EntityCard\Application\UseCase\User\Request\CreateRequest;
use src\EntityCard\Domain\Entity\User;

class UserBuilder
{
    public function __construct(
        private readonly EntityCardBuilder $entityBuilder
    )
    {
    }

    public function fromCreate(CreateRequest $request): User
    {
        return new User(
            id: null,
            name: $request->name
        );
    }

    public function fromEloquentModel(?UserEloquentModel $user): ?User
    {
        if (!$user) {
            return null;
        }
        return new User(
            id: $user->id,
            name: $user->name,
            entities: $user
            ->entities
            ?->map(fn($entity) => $this->entityBuilder->fromEloquentModel($entity))
            ->toArray() ?? []
        );
    }
}
