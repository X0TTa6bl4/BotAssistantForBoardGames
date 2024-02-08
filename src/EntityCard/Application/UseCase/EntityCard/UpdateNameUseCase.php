<?php

declare(strict_types=1);

namespace src\EntityCard\Application\UseCase\EntityCard;

use src\EntityCard\Application\UseCase\EntityCard\Request\UpdateNameRequest;
use src\EntityCard\Domain\Entity\EntityCard;
use src\EntityCard\Domain\Entity\ValueObject\NameValueObject;
use src\EntityCard\Domain\Repository\EntityCardRepositoryContract;

class UpdateNameUseCase
{
    public function __construct(
        private readonly EntityCardRepositoryContract $entityCardRepository
    )
    {
    }

    public function __invoke(UpdateNameRequest $request): EntityCard
    {
        $entityCard = $this->entityCardRepository->getById($request->userId);
        $entityCard->rename(new NameValueObject($request->name));
        $this->entityCardRepository->update($entityCard);

        return $entityCard;
    }
}
