<?php

declare(strict_types=1);

namespace src\EntityCard\Application\UseCase;

use src\EntityCard\Application\UseCase\Request\UpdateLvlRequest;
use src\EntityCard\Domain\Entity\EntityCard;
use src\EntityCard\Domain\Entity\ValueObject\LvlValueObject;
use src\EntityCard\Domain\Repository\EntityCardRepositoryContract;

class UpdateLvlUseCase
{
    public function __construct(
        private readonly EntityCardRepositoryContract $entityCardRepository
    )
    {
    }

    public function __invoke(UpdateLvlRequest $request): EntityCard
    {
        $player = $this->entityCardRepository->getById($request->userId);
        $player->updateLvl(new LvlValueObject($request->lvl));
        $this->entityCardRepository->update($player);

        return $player;
    }
}
