<?php

declare(strict_types=1);

namespace src\User\Domain\Entity;

class User
{
    private ?int $id;
    private string $name;
    private int $chatId;
    private string $menuState;

    public function __construct(?int $id, string $name, int $chatId, string $menuState)
    {
        $this->id = $id;
        $this->name = $name;
        $this->chatId = $chatId;
        $this->menuState = $menuState;
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

    public function getMenuState(): string
    {
        return $this->menuState;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
}
