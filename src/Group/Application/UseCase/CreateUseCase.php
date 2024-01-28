<?php

declare(strict_types=1);

namespace src\Group\Application\UseCase;

use src\Group\Application\Builder\GroupBuilder;
use src\Group\Application\UseCase\Request\CreateRequest;
use src\Group\Domain\Entity\Group;
use src\Group\Domain\Repository\GroupRepositoryContract;

class CreateUseCase
{
    public function __construct(
        private readonly GroupRepositoryContract $groupRepository,
        private readonly GroupBuilder $groupBuilder
    )
    {
    }

    public function __invoke(CreateRequest $request): Group
    {
        return $this->groupRepository->create(
            $this->groupBuilder->fromCreate($request)
        );
    }
}
