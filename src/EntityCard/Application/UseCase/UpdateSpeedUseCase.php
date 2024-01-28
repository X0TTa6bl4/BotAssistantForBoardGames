<?php

declare(strict_types=1);

namespace src\EntityCard\Application\UseCase;

use src\EntityCard\Application\UseCase\Request\UpdateSpeedRequest;
use src\EntityCard\Domain\Entity\EntityCard;
use src\EntityCard\Domain\Entity\ValueObject\SpeedValueObject;
use src\EntityCard\Domain\Repository\EntityCardRepositoryContract;

class UpdateSpeedUseCase
{
    public function __construct(
        private readonly EntityCardRepositoryContract $entityCardRepository
    )
    {
    }

    public function __invoke(UpdateSpeedRequest $request): EntityCard
    {
        $player = $this->entityCardRepository->getById($request->userId);
        $player->updateSpeed(new SpeedValueObject($request->speed));
        $this->entityCardRepository->update($player);

        return $player;
    }
}
