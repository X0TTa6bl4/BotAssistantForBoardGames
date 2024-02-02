<?php

declare(strict_types=1);

namespace src\EntityCard\Domain\Entity;

class User
{
    private ?int $id;
    private string $name;
    /**
     * @var array<EntityCard>
     */
    private array $entities;

    public function __construct(?int $id, string $name, array $entities = [])
    {
        $this->id = $id;
        $this->name = $name;
        $this->entities = $entities;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEntities(): array
    {
        return $this->entities;
    }
}
