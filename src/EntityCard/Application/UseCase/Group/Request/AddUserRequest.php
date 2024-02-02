<?php

declare(strict_types=1);

namespace src\EntityCard\Application\UseCase\Group\Request;

class AddUserRequest
{
    public function __construct(
        public readonly int $groupId,
        public readonly int $userId,
    )
    {
    }
}
