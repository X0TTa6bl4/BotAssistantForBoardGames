<?php

declare(strict_types=1);

namespace src\Group\Infrastracture\Repository;

use App\Models\Group as GroupEloquentModel;
use src\Group\Application\Builder\GroupBuilder;
use src\Group\Domain\Entity\Group;
use src\Group\Domain\Repository\GroupRepositoryContract;

class GroupRepository implements GroupRepositoryContract
{
    public function __construct(
        private GroupBuilder $groupBuilder
    )
    {
    }

    public function create(Group $group): Group
    {
        /** @var GroupEloquentModel $groupEloquentModel */
        $groupEloquentModel = GroupEloquentModel::query()->create([
            'name' => $group->getName(),
            'public_id' => $group->getPublicId(),
            'owner_id' => $group->getOwnerId()
        ]);

        return $this->groupBuilder->fromEloquentModel($groupEloquentModel);
    }

    public function update(Group $group): bool
    {
        $groupEloquentModel = GroupEloquentModel::query()->find($group->getId())->update([
            'name' => $group->getName(),
            'owner_id' => $group->getOwnerId()
        ]);

        return $groupEloquentModel;
    }

    public function getById(int $id): Group
    {
        /** @var GroupEloquentModel $groupEloquentModel */
        $groupEloquentModel = GroupEloquentModel::query()->find($id);

        return $this->groupBuilder->fromEloquentModel($groupEloquentModel);
    }

    public function getByOwnerId(int $ownerId): ?Group
    {
        /** @var GroupEloquentModel $groupEloquentModel */
        $groupEloquentModel = GroupEloquentModel::query()->where('owner_id', $ownerId)->first();

        return $groupEloquentModel ? $this->groupBuilder->fromEloquentModel($groupEloquentModel) : null;
    }

    public function delete($id): void
    {
        GroupEloquentModel::query()->find($id)->delete();
    }
}
