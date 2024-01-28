<?php

declare(strict_types=1);

namespace src\EntityCard\Application\Rule;

use src\EntityCard\Application\Action\IsThereAGroupOwnedByTheUserContract;
use src\EntityCard\Domain\Repository\EntityCardRepositoryContract;
use src\EntityCard\Domain\Rule\IsItPossibleToCreateAnEntityRuleContract;

class IsItPossibleToCreateAnEntityRule implements IsItPossibleToCreateAnEntityRuleContract
{
    public function __construct(
        private readonly EntityCardRepositoryContract        $entityCardRepository,
        private readonly IsThereAGroupOwnedByTheUserContract $isThereAGroupOwnedByTheUser
    )
    {
    }

    public function __invoke(int $userId): bool
    {
        return ($this->isThereAGroupOwnedByTheUser)($userId)
            || count($this->entityCardRepository->getByUserId($userId)) === 0;
    }
}
