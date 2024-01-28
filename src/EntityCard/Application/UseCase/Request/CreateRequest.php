<?php

declare(strict_types=1);

namespace src\EntityCard\Application\UseCase\Request;

class CreateRequest
{
    public function __construct(
        public readonly int $userId,
        public readonly int $healthPoints,
        public readonly int $power,
        public readonly int $initiative,
        public readonly int $speed,
        public readonly int $lvl,
        public readonly int $protection,
    )
    {
    }
}
