<?php

declare(strict_types=1);

namespace src\Battle\Domain\Entity;

use Illuminate\Support\Collection;

class Battle
{
    private ?int $id;
    private ?int $entityIdMakeAMove;
    private ?Collection $entitiesInCombat;

    public function __construct(?int $id, int $entityIdMakeAMove, Collection $entitiesInCombat)
    {
        $this->id = $id;

        //TODO - добавлять первое существо из коллекции
        $this->entityIdMakeAMove = $entityIdMakeAMove;
        $this->entitiesInCombat = $entitiesInCombat
            ->sortByDesc(fn(Entity $entity) => $entity->getInitiative())
            ->values();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEntityIdMakeAMove(): ?int
    {
        return $this->entityIdMakeAMove;
    }

    public function getEntitiesInCombat(): ?Collection
    {
        return $this->entitiesInCombat;
    }

    public function getEntityById(int $id): ?Entity
    {
        return $this->entitiesInCombat->first(fn(Entity $entity) => $entity->getId() === $id);
    }

    public function completeAMove(): void
    {
        $this->entityIdMakeAMove = $this->getNextEntityIdToMakeAMove();
    }

    private function getNextEntityIdToMakeAMove(): int
    {
        $entityIds = $this->entitiesInCombat->map(fn(Entity $entity) => $entity->getId());
        $entityIdMakeAMoveIndex = $entityIds->search($this->entityIdMakeAMove);
        $nextEntityIdMakeAMoveIndex = $entityIdMakeAMoveIndex + 1;
        if ($nextEntityIdMakeAMoveIndex === $entityIds->count()) {
            $nextEntityIdMakeAMoveIndex = 0;
        }
        return $entityIds->get($nextEntityIdMakeAMoveIndex);
    }

    public function getEntitiesIdInCombat(): array
    {
        return $this->entitiesInCombat->map(fn(Entity $entity) => $entity->getId())->toArray();
    }
}
