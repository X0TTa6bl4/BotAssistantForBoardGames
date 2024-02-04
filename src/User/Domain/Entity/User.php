<?php

declare(strict_types=1);

namespace src\User\Domain\Entity;

class User
{
    private ?int $id;
    private string $name;
    private int $chatId;

    public function __construct(?int $id, string $name, int $chatId)
    {
        $this->id = $id;
        $this->name = $name;
        $this->chatId = $chatId;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getChatId(): int
    {
        return $this->chatId;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
}
