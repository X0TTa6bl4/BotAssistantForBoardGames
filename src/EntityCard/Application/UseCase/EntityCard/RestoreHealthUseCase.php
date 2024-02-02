<?php

declare(strict_types=1);

namespace src\EntityCard\Application\UseCase\EntityCard;

use src\EntityCard\Application\UseCase\EntityCard\Request\RestoreHealthRequest;
use src\EntityCard\Domain\Repository\GroupRepositoryContract;

class RestoreHealthUseCase
{
    public function __construct(
        private readonly GroupRepositoryContract $groupRepository,
    )
    {
    }

    public function __invoke(RestoreHealthRequest $request)
    {
        $group = $this->groupRepository->getByUserId($request->userId);

        $group->restoreHealth($request->entityIdThatDealsHealth, $request->entityIdThatTakesHealth);

        $this->groupRepository->update($group);
        return $group;
    }
}
