<?php

declare(strict_types=1);

namespace src\EntityCard\Application\UseCase;

use src\EntityCard\Application\UseCase\Request\UpdateNameRequest;
use src\EntityCard\Domain\Entity\Entity;
use src\EntityCard\Domain\Entity\ValueObject\NameValueObject;
use src\EntityCard\Domain\Repository\EntityRepositoryContract;

class UpdateNameUseCase
{
    public function __construct(
        private readonly EntityRepositoryContract $playerRepository
    )
    {
    }

    public function __invoke(UpdateNameRequest $request): Entity
    {
        $player = $this->playerRepository->getById($request->userId);
        $player->updateName(new NameValueObject($request->name));
        $this->playerRepository->update($player);

        return $player;
    }
}
