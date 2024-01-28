<?php

declare(strict_types=1);

namespace src\EntityCard\Domain\Rule;

interface IsItPossibleToCreateAnEntityRuleContract
{
    public function __invoke(int $userId): bool;
}
