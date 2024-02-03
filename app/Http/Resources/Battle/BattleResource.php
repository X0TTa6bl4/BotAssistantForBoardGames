<?php

namespace App\Http\Resources\Battle;

use Illuminate\Http\Resources\Json\JsonResource;
use src\Battle\Domain\Entity\Battle;

/**
 * @mixin Battle
 */
class BattleResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->getId(),
            'entityIdMakeAMove' => $this->getEntityIdMakeAMove(),
            'entitiesInCombat' => EntityResource::collection($this->getEntitiesInCombat()),
        ];
    }
}
