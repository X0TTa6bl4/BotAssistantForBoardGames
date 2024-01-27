<?php

declare(strict_types=1);

namespace src\EntityCard\Application\UseCase\Request;

class UpdateProtectionRequest
{
    public function __construct(
        public readonly int $userId,
        public readonly int $protection,
    )
    {
    }
}
