<?php

declare(strict_types=1);

namespace src\Group\Domain\Repository;

use src\Group\Domain\Entity\Group;

interface GroupRepositoryContract
{
    public function create(Group $group): Group;

    public function update(Group $group): bool;

    public function getById(int $id): Group;

    public function getByOwnerId(int $ownerId): ?Group;

    public function delete($id): void;
}
