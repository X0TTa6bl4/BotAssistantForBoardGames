<?php

declare(strict_types=1);

namespace src\EntityCard\Infrastructure\Repository;

use App\Models\Entity as PlayerEloquentModel;
use Illuminate\Database\Eloquent\Builder;
use src\EntityCard\Application\Builder\EntityBuilder;
use src\EntityCard\Domain\Entity\Entity;
use src\EntityCard\Domain\Repository\EntityRepositoryContract;

class EntityRepository implements EntityRepositoryContract
{
    public function __construct(
        private readonly EntityBuilder $playerBuilder
    )
    {
    }

    public function create(Entity $player): Entity
    {
        /** @var PlayerEloquentModel $playerEloquentModel */
        $playerEloquentModel = PlayerEloquentModel::query()->create([
            'name' => $player->getName()->getValue(),
            'health_points' => $player->getHealthPoints()->getValue(),
            'health_points_max' => $player->getHealthPoints()->getMaxHealthPoints(),
            'power' => $player->getPower()->getValue(),
            'initiative' => $player->getInitiative()->getValue(),
            'speed' => $player->getSpeed()->getValue(),
            'lvl' => $player->getLvl()->getValue(),
            'protection' => $player->getProtection()->getValue(),
        ]);

        return $this->playerBuilder->fromEloquentModel($playerEloquentModel);
    }

    public function update(Entity $player): bool
    {
        $playerEloquentModel = $this->getPlayerEloquentModel()->find($player->getId()->getValue())->update([
            'name' => $player->getName()->getValue(),
            'health_points' => $player->getHealthPoints()->getValue(),
            'health_points_max' => $player->getHealthPoints()->getMaxHealthPoints(),
            'power' => $player->getPower()->getValue(),
            'initiative' => $player->getInitiative()->getValue(),
            'speed' => $player->getSpeed()->getValue(),
            'lvl' => $player->getLvl()->getValue(),
            'protection' => $player->getProtection()->getValue(),
        ]);

        return $playerEloquentModel;
    }

    public function getById(int $id): Entity
    {
        /** @var PlayerEloquentModel $playerEloquentModel */
        $playerEloquentModel = $this->getPlayerEloquentModel()->find($id);

        return $this->playerBuilder->fromEloquentModel($playerEloquentModel);
    }

    public function delete($id): void
    {
        $this->getPlayerEloquentModel()->find($id)->delete();
    }

    private function getPlayerEloquentModel(): Builder
    {
        return PlayerEloquentModel::query();
    }
}
