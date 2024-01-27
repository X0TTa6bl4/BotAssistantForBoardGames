<?php

declare(strict_types=1);

namespace src\EntityCard\Application\UseCase;

use src\EntityCard\Application\UseCase\Request\UpdateSpeedRequest;
use src\EntityCard\Domain\Entity\Entity;
use src\EntityCard\Domain\Entity\ValueObject\SpeedValueObject;
use src\EntityCard\Domain\Repository\EntityRepositoryContract;

class UpdateSpeedUseCase
{
    public function __construct(
        private readonly EntityRepositoryContract $playerRepository
    )
    {
    }

    public function __invoke(UpdateSpeedRequest $request): Entity
    {
        $player = $this->playerRepository->getById($request->userId);
        $player->updateSpeed(new SpeedValueObject($request->speed));
        $this->playerRepository->update($player);

        return $player;
    }
}
