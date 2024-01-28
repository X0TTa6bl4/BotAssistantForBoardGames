<?php

declare(strict_types=1);

namespace src\Group\Application\Builder;

use App\Models\Group as GroupEloquentModel;
use Illuminate\Support\Str;
use src\Group\Application\UseCase\Request\CreateRequest;
use src\Group\Domain\Entity\Group;

class GroupBuilder
{
    public function fromCreate(CreateRequest $request): Group
    {
        return new Group(
            id: null,
            publicId: (string)Str::uuid(),
            name: $request->name,
            ownerId: $request->ownerId,
        );
    }

    public function fromEloquentModel(GroupEloquentModel $group): Group
    {
        return new Group(
            id: $group->id,
            publicId: $group->public_id,
            name: $group->name,
            ownerId: $group->owner_id,
        );
    }
}
