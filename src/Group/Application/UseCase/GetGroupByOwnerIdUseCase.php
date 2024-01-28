<?php

declare(strict_types=1);

namespace src\Group\Application\UseCase;

use src\Group\Domain\Entity\Group;
use src\Group\Domain\Repository\GroupRepositoryContract;

class GetGroupByOwnerIdUseCase
{
    public function __construct(
        private readonly GroupRepositoryContract $groupRepository
    )
    {
    }

    public function __invoke(int $ownerId): ?Group
    {
        return $this->groupRepository->getByOwnerId($ownerId);
    }
}
