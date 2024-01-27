<?php

declare(strict_types=1);

namespace src\EntityCard\Application\UseCase;

use src\EntityCard\Application\UseCase\Request\UpdateProtectionRequest;
use src\EntityCard\Domain\Entity\Entity;
use src\EntityCard\Domain\Entity\ValueObject\ProtectionValueObject;
use src\EntityCard\Domain\Repository\EntityRepositoryContract;

class UpdateProtectionUseCase
{
    public function __construct(
        private readonly EntityRepositoryContract $playerRepository
    )
    {
    }

    public function __invoke(UpdateProtectionRequest $request): Entity
    {
        $player = $this->playerRepository->getById($request->userId);
        $player->updateProtection(new ProtectionValueObject($request->protection));
        $this->playerRepository->update($player);

        return $player;
    }
}
