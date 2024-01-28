<?php

declare(strict_types=1);

namespace src\EntityCard\Application\UseCase;

use src\EntityCard\Application\UseCase\Request\MakeDamageRequest;
use src\EntityCard\Domain\Repository\EntityCardRepositoryContract;

class MakeDamageUseCase
{
    public function __construct(
        private readonly EntityCardRepositoryContract $entityCardRepository
    )
    {
    }

    public function __invoke(MakeDamageRequest $makeDamageRequest): array
    {
        $entityThatDealsDamage = $this->entityCardRepository->getById($makeDamageRequest->entityIdThatDealsDamage);
        $entityThatTakesDamage = $this->entityCardRepository->getById($makeDamageRequest->entityIdThatTakesDamage);

        $entityThatTakesDamage->takeDamage($entityThatDealsDamage->makeDamage());

        $this->entityCardRepository->update($entityThatDealsDamage);
        $this->entityCardRepository->update($entityThatTakesDamage);

        return [$entityThatDealsDamage, $entityThatTakesDamage];
    }
}
