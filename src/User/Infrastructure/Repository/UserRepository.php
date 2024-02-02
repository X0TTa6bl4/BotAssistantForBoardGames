<?php

declare(strict_types=1);

namespace src\User\Infrastructure\Repository;

use App\Models\User as UserEloquentModel;
use Illuminate\Support\Str;
use src\User\Application\Builder\UserBuilder;
use src\User\Domain\Entity\User;
use src\User\Domain\Repository\UserRepositoryContract;

class UserRepository implements UserRepositoryContract
{
    public function __construct(
        private readonly UserBuilder $userBuilder
    )
    {
    }

    public function create(User $user): User
    {
        /** @var UserEloquentModel $userEloquentModel */
        $userEloquentModel = UserEloquentModel::query()->create([
                'name' => $user->getName(),
                'email' => Str::uuid() . '@gmail.com',
                'password' => bcrypt(Str::random(10)),
            ]
        );

        return $this->userBuilder->fromEloquentModel($userEloquentModel);
    }

    public function update(User $user): bool
    {
        $userEloquentModel = UserEloquentModel::query()
            ->find($user->getId())
            ->update([
                'name' => $user->getName(),
            ]);

        return $userEloquentModel;
    }

    public function getById(int $userId): User
    {
        /** @var UserEloquentModel $userEloquentModel */
        $userEloquentModel = UserEloquentModel::query()->find($userId);

        return $this->userBuilder->fromEloquentModel($userEloquentModel);
    }

    public function deleted(int $userId): void
    {
        UserEloquentModel::query()->find($userId)->delete();
    }
}
