<?php

declare(strict_types=1);

namespace src\Group\Application\UseCase;

use src\Group\Application\UseCase\Request\RenameRequest;
use src\Group\Domain\Repository\GroupRepositoryContract;

class RenameUseCase
{
    public function __construct(
        private readonly GroupRepositoryContract $groupRepository,
    )
    {
    }

    public function __invoke(RenameRequest $request): void
    {
        $group = $this->groupRepository->getByOwnerId($request->ownerId);
        $group->rename($request->newName);
        $this->groupRepository->update($group);
    }
}
