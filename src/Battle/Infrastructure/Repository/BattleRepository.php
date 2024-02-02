<?php

declare(strict_types=1);

namespace src\Battle\Infrastructure\Repository;

use App\Models\Battle as BattleEloquentModel;
use src\Battle\Application\Builder\BattleBuilder;
use src\Battle\Domain\Entity\Battle;
use src\Battle\Domain\Repository\BattleRepositoryContract;

class BattleRepository implements BattleRepositoryContract
{

    public function __construct(
        private readonly BattleBuilder $battleBuilder
    )
    {
    }

    public function getById(int $id): Battle
    {
        /** @var BattleEloquentModel $battleEloquentModel */
        $battleEloquentModel = BattleEloquentModel::query()->find($id);

        return $this->battleBuilder->fromEloquentModel($battleEloquentModel);
    }

    public function create(Battle $battle): Battle
    {
        /** @var BattleEloquentModel $battleEloquentModel */
        $battleEloquentModel = BattleEloquentModel::query()->create();

        return $this->battleBuilder->fromEloquentModel($battleEloquentModel);
    }

    public function update(Battle $battle): bool
    {
        return BattleEloquentModel::query()->find($battle->getId())->update([
            'entity_id_make_a_move' => $battle->getEntityIdMakeAMove(),
            'entities_id_in_combat' => $battle->getEntitiesIdInCombat(),
        ]);
    }

    public function delete(int $id): void
    {
        BattleEloquentModel::query()->find($id)->delete();
    }
}
