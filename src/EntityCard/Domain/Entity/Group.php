<?php

declare(strict_types=1);

namespace src\EntityCard\Domain\Entity;

class Group
{
    private ?int $id;
    private string $publicId;
    private string $name;
    private int $ownerId;
    private ?User $owner;

    /**
     * @var array<User>
     */
    private array $users;

    public function __construct(?int $id, string $publicId, string $name, int $ownerId, ?User $owner, array $users = [])
    {
        $this->id = $id;
        $this->publicId = $publicId;
        $this->name = $name;
        $this->ownerId = $ownerId;
        $this->owner = $owner;
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

    public function getOwner(): User
    {
        return $this->owner;
    }

    public function getUsers(): array
    {
        return $this->users;
    }

    public function rename(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @throws \Exception
     */
    public function damage(int $entityIdThatDealsDamage, int $entityIdThatTakesDamage): void
    {
        $entityThatDealsDamage = $this->findEntityById($entityIdThatDealsDamage);
        $entityThatTakesDamage = $this->findEntityById($entityIdThatTakesDamage);

        $entityThatTakesDamage->takeDamage($entityThatDealsDamage->makeDamage());
    }

    public function restoreHealth(int $entityIdThatDealsHealth, int $entityIdThatTakesHealth): void
    {
        $entityThatDealsHealth = $this->findEntityById($entityIdThatDealsHealth);
        $entityThatTakesHealth = $this->findEntityById($entityIdThatTakesHealth);

        $entityThatTakesHealth->takeRestoreHealth($entityThatDealsHealth->makeRestoreHealth());
    }

    public function findUserById(int $userId): ?User
    {
        foreach ($this->users as $user) {
            if ($user->getId() === $userId) {
                return $user;
            }
        }

        return null;
    }

    private function findEntityById(int $entityId): EntityCard
    {
        foreach ($this->users as $user) {
            foreach ($user->getEntities() as $entity) {
                if ($entity->getId() === $entityId) {
                    return $entity;
                }
            }
        }

        throw new \Exception('Entity not found');
    }

}
