<?php

declare(strict_types=1);

namespace src\EntityCard\Application\UseCase;

use src\EntityCard\Application\UseCase\Request\TakeDamageRequest;
use src\EntityCard\Domain\Entity\Entity;
use src\EntityCard\Domain\Entity\ValueObject\DamageValueObject;
use src\EntityCard\Domain\Repository\EntityRepositoryContract;

class TakeDamageUseCase
{
    public function __construct(
        private readonly EntityRepositoryContract $playerRepository
    )
    {
    }

    public function __invoke(TakeDamageRequest $request): Entity
    {
        $player = $this->playerRepository->getById($request->userId);
        $player->takeDamage(new DamageValueObject($request->damage));
        $this->playerRepository->update($player);

        return $player;
    }
}
