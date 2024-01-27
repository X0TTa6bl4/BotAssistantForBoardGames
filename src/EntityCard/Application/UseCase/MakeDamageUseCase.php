<?php

declare(strict_types=1);

namespace src\EntityCard\Application\UseCase;

use src\EntityCard\Application\UseCase\Request\MakeDamageRequest;
use src\EntityCard\Domain\Repository\EntityRepositoryContract;

class MakeDamageUseCase
{
    public function __construct(
        private readonly EntityRepositoryContract $playerRepository
    )
    {
    }

    public function __invoke(MakeDamageRequest $makeDamageRequest): array
    {
        $entityThatDealsDamage = $this->playerRepository->getById($makeDamageRequest->entityIdThatDealsDamage);
        $entityThatTakesDamage = $this->playerRepository->getById($makeDamageRequest->entityIdThatTakesDamage);

        $entityThatTakesDamage->takeDamage($entityThatDealsDamage->makeDamage());

        $this->playerRepository->update($entityThatDealsDamage);
        $this->playerRepository->update($entityThatTakesDamage);

        return [$entityThatDealsDamage, $entityThatTakesDamage];
    }
}
