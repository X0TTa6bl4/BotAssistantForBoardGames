<?php

declare(strict_types=1);

namespace src\EntityCard\Domain\Repository;

use src\EntityCard\Domain\Entity\Entity;

interface EntityRepositoryContract
{
    public function create(Entity $player): Entity;

    public function update(Entity $player): bool;

    public function getById(int $id): Entity;

    public function delete($id): void;
}
