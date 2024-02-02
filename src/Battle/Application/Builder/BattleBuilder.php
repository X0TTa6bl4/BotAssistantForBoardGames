<?php

declare(strict_types=1);

namespace src\Battle\Application\Builder;

use App\Models\Battle as BattleEloquentModel;
use src\Battle\Domain\Entity\Battle;

class BattleBuilder
{
    public function fromEloquentModel(BattleEloquentModel $battle): Battle
    {
        return new Battle(
            id: $battle->id,
            entityIdMakeAMove: $battle->entity_id_make_a_move,
            entitiesInCombat:  $battle->entitiesInCombat
        );
    }

    public function fromCreate()
    {
        
    }
}
