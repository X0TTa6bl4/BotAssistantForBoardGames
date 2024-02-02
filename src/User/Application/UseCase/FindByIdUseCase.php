<?php

declare(strict_types=1);

namespace src\User\Application\UseCase;

use src\User\Domain\Entity\User;
use src\User\Domain\Repository\UserRepositoryContract;

class FindByIdUseCase
{
    public function __construct(
        private readonly UserRepositoryContract $userRepository
    )
    {
    }

    public function __invoke(int $id): User
    {
        return $this->userRepository->findById($id);
    }
}
