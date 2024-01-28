<?php

declare(strict_types=1);

namespace src\EntityCard\Infrastructure\Repository;

use App\Models\Entity as EntityEloquentModel;
use src\EntityCard\Application\Builder\EntityCardBuilder;
use src\EntityCard\Domain\Entity\EntityCard;
use src\EntityCard\Domain\Repository\EntityCardRepositoryContract;

class EntityCardRepository implements EntityCardRepositoryContract
{
    public function __construct(
        private readonly EntityCardBuilder $entityBuilder
    )
    {
    }

    public function create(EntityCard $player): EntityCard
    {
        /** @var EntityEloquentModel $EntitiesEloquentModel */
        $EntitiesEloquentModel = EntityEloquentModel::query()->create([
            'user_id' => $player->getUserId()->getValue(),
            'health_points' => $player->getHealthPoints()->getValue(),
            'health_points_max' => $player->getHealthPoints()->getMaxHealthPoints(),
            'power' => $player->getPower()->getValue(),
            'initiative' => $player->getInitiative()->getValue(),
            'speed' => $player->getSpeed()->getValue(),
            'lvl' => $player->getLvl()->getValue(),
            'protection' => $player->getProtection()->getValue(),
        ]);

        return $this->entityBuilder->fromEloquentModel($EntitiesEloquentModel);
    }

    public function update(EntityCard $entity): bool
    {
        $EntitiesEloquentModel = EntityEloquentModel::query()->find($entity->getId()->getValue())->update([
            'health_points' => $entity->getHealthPoints()->getValue(),
            'health_points_max' => $entity->getHealthPoints()->getMaxHealthPoints(),
            'power' => $entity->getPower()->getValue(),
            'initiative' => $entity->getInitiative()->getValue(),
            'speed' => $entity->getSpeed()->getValue(),
            'lvl' => $entity->getLvl()->getValue(),
            'protection' => $entity->getProtection()->getValue(),
        ]);

        return $EntitiesEloquentModel;
    }

    public function getById(int $id): EntityCard
    {
        /** @var EntityEloquentModel $EntitiesEloquentModel */
        $EntitiesEloquentModel = EntityEloquentModel::query()->find($id);

        return $this->entityBuilder->fromEloquentModel($EntitiesEloquentModel);
    }

    public function getByUserId(int $userId): array
    {
        /** @var EntityEloquentModel $EntitiesEloquentModel */
        $EntitiesEloquentModel = EntityEloquentModel::query()->where('user_id', $userId)->get();

        $users = [];

        foreach ($EntitiesEloquentModel as $entity) {
            $users[] = $this->entityBuilder->fromEloquentModel($entity);
        }

        return $users;
    }

    public function delete($id): void
    {
        EntityEloquentModel::query()->find($id)->delete();
    }
}
