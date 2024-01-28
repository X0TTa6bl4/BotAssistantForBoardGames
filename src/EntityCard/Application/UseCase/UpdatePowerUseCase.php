<?php

declare(strict_types=1);

namespace src\EntityCard\Application\UseCase;

use src\EntityCard\Application\UseCase\Request\UpdatePowerRequest;
use src\EntityCard\Domain\Entity\EntityCard;
use src\EntityCard\Domain\Entity\ValueObject\PowerValueObject;
use src\EntityCard\Domain\Repository\EntityCardRepositoryContract;

class UpdatePowerUseCase
{
    public function __construct(
        private readonly EntityCardRepositoryContract $entityCardRepository
    )
    {
    }

    public function __invoke(UpdatePowerRequest $request): EntityCard
    {
        $player = $this->entityCardRepository->getById($request->userId);
        $player->updatePower(new PowerValueObject($request->power));
        $this->entityCardRepository->update($player);

        return $player;
    }
}
