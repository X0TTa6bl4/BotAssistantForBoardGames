<?php

namespace App\Http\Resources\EntityCard;

use Illuminate\Http\Resources\Json\JsonResource;
use src\EntityCard\Domain\Entity\EntityCard;

/**
 * @mixin EntityCard
 */
class EntityResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->getId(),
            'user_id' => $this->getUserId(),
            'name' => $this->getName(),
            'health' => $this->getHealthPoints(),
            'health_max' => $this->getMaxHealthPoints(),
            'power' => $this->getPower(),
            'initiative' => $this->getInitiative(),
            'intelligence' => $this->getIntelligence(),
            'protection' => $this->getProtection(),
            'lvl' => $this->getLvl(),
        ];
    }
}
