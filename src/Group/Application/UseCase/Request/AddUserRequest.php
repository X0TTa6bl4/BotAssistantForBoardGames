<?php

declare(strict_types=1);

namespace src\Group\Application\UseCase\Request;

class AddUserRequest
{
    public function __construct(
        public readonly int $groupId,
        public readonly int $userId,
    )
    {
    }
}
