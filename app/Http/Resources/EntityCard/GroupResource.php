<?php

namespace App\Http\Resources\EntityCard;

use Illuminate\Http\Resources\Json\JsonResource;
use src\EntityCard\Domain\Entity\Group;

/**
 * @mixin Group
 */
class GroupResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'owner_id' => $this->getOwnerId(),
            'public_id' => $this->getPublicId(),
            'owner' => new UserResource($this->getOwner()),
            'users' => UserResource::collection($this->getUsers()),
        ];
    }
}
