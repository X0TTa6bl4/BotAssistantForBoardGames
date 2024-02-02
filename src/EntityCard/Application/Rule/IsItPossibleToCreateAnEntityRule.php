<?php

declare(strict_types=1);

namespace src\EntityCard\Application\Rule;

use src\EntityCard\Domain\Entity\Group;
use src\EntityCard\Domain\Rule\IsItPossibleToCreateAnEntityRuleContract;

class IsItPossibleToCreateAnEntityRule implements IsItPossibleToCreateAnEntityRuleContract
{
    /**
     * @throws \Exception
     */
    public function __invoke(Group $group, int $userId): bool
    {
        return $group->getOwnerId() === $userId || count($group->findUserById($userId)?->getEntities()) === 0;
    }
}
