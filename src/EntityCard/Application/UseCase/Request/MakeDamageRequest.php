<?php

declare(strict_types=1);

namespace src\EntityCard\Application\UseCase\Request;

class MakeDamageRequest
{
    public function __construct(
        public readonly int $entityIdThatDealsDamage,
        public readonly int $entityIdThatTakesDamage,
    )
    {
    }
}
