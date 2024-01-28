<?php

declare(strict_types=1);

namespace src\Group\Application\UseCase\Request;

class RenameRequest
{
    public function __construct(
        public readonly int    $ownerId,
        public readonly string $newName
    )
    {
    }
}
