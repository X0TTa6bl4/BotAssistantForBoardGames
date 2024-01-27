<?php

declare(strict_types=1);

namespace src\EntityCard\Application\UseCase;

use src\EntityCard\Application\UseCase\Request\UpdateInitiativeRequest;
use src\EntityCard\Domain\Entity\Entity;
use src\EntityCard\Domain\Entity\ValueObject\InitiativeValueObject;
use src\EntityCard\Domain\Repository\EntityRepositoryContract;

class UpdateInitiativeUseCase
{
    public function __construct(
        private readonly EntityRepositoryContract $playerRepository
    )
    {
    }

    public function __invoke(UpdateInitiativeRequest $request): Entity
    {
        $player = $this->playerRepository->getById($request->userId);
        $player->updateInitiative(new InitiativeValueObject($request->initiative));
        $this->playerRepository->update($player);

        return $player;
    }
}
