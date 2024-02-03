<?php

namespace App\Http\Resources\EntityCard;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'entities' => EntityResource::collection($this->getEntities()),
        ];
    }
}
