<?php

declare(strict_types=1);

namespace src\EntityCard\Application\UseCase;

use src\EntityCard\Application\UseCase\Request\UpdateProtectionRequest;
use src\EntityCard\Domain\Entity\EntityCard;
use src\EntityCard\Domain\Entity\ValueObject\ProtectionValueObject;
use src\EntityCard\Domain\Repository\EntityCardRepositoryContract;

class UpdateProtectionUseCase
{
    public function __construct(
        private readonly EntityCardRepositoryContract $entityCardRepository
    )
    {
    }

    public function __invoke(UpdateProtectionRequest $request): EntityCard
    {
        $player = $this->entityCardRepository->getById($request->userId);
        $player->updateProtection(new ProtectionValueObject($request->protection));
        $this->entityCardRepository->update($player);

        return $player;
    }
}
