<?php

declare(strict_types=1);

namespace src\Group\Domain\Entity;

class Group
{
    private ?int $id;
    private string $publicId;
    private string $name;
    private int $ownerId;
    private array $users;

    public function __construct(?int $id, string $publicId, string $name, int $ownerId, array $users = [])
    {
        $this->id = $id;
        $this->publicId = $publicId;
        $this->name = $name;
        $this->ownerId = $ownerId;
        $this->users = $users;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPublicId(): string
    {
        return $this->publicId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getOwnerId(): int
    {
        return $this->ownerId;
    }

    public function getUsers(): array
    {
        return $this->users;
    }

    public function rename(string $name): void
    {
        $this->name = $name;
    }
}
