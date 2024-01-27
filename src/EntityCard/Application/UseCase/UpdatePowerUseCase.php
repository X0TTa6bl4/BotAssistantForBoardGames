<?php

declare(strict_types=1);

namespace src\EntityCard\Application\UseCase;

use src\EntityCard\Application\UseCase\Request\UpdatePowerRequest;
use src\EntityCard\Domain\Entity\Entity;
use src\EntityCard\Domain\Entity\ValueObject\PowerValueObject;
use src\EntityCard\Domain\Repository\EntityRepositoryContract;

class UpdatePowerUseCase
{
    public function __construct(
        private readonly EntityRepositoryContract $playerRepository
    )
    {
    }

    public function __invoke(UpdatePowerRequest $request): Entity
    {
        $player = $this->playerRepository->getById($request->userId);
        $player->updatePower(new PowerValueObject($request->power));
        $this->playerRepository->update($player);

        return $player;
    }
}
