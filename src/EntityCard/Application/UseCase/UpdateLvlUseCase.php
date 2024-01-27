<?php

declare(strict_types=1);

namespace src\EntityCard\Application\UseCase;

use src\EntityCard\Application\UseCase\Request\UpdateLvlRequest;
use src\EntityCard\Domain\Entity\Entity;
use src\EntityCard\Domain\Entity\ValueObject\LvlValueObject;
use src\EntityCard\Domain\Repository\EntityRepositoryContract;

class UpdateLvlUseCase
{
    public function __construct(
        private readonly EntityRepositoryContract $playerRepository
    )
    {
    }

    public function __invoke(UpdateLvlRequest $request): Entity
    {
        $player = $this->playerRepository->getById($request->userId);
        $player->updateLvl(new LvlValueObject($request->lvl));
        $this->playerRepository->update($player);

        return $player;
    }
}
