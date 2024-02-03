<?php

namespace App\Http\Resources\Battle;

use Illuminate\Http\Resources\Json\JsonResource;
use src\Battle\Domain\Entity\Entity;

/**
 * @mixin Entity
 */
class EntityResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->getId(),
            'initiative' => $this->getInitiative(),
        ];
    }
}
