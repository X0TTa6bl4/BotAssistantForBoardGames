<?php

declare(strict_types=1);

namespace src\Battle\Domain\Entity;

class Entity
{
    private int $id;
    private int $initiative;

    public function __construct(int $id, int $initiative)
    {
        $this->id = $id;
        $this->initiative = $initiative;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getInitiative(): int
    {
        return $this->initiative;
    }
}
