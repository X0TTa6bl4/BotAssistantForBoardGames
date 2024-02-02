<?php

declare(strict_types=1);

namespace src\EntityCard\Infrastructure\Repository;

use App\Models\User as UserEloquentModel;
use Illuminate\Support\Str;
use src\EntityCard\Application\Builder\UserBuilder;
use src\EntityCard\Domain\Entity\User;
use src\EntityCard\Domain\Repository\UserRepositoryContract;

class UserRepository implements UserRepositoryContract
{
    public function __construct(
        private UserBuilder $userBuilder
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
        $userEloquentModel = UserEloquentModel::query()->find($user->getId())->update([
            'name' => $user->getName(),
        ]);

        return $userEloquentModel;
    }

    public function getById(int $id): User
    {
        /** @var UserEloquentModel $userEloquentModel */
        $userEloquentModel = UserEloquentModel::query()->find($id);

        return $this->userBuilder->fromEloquentModel($userEloquentModel);
    }

    public function deleted(int $id): void
    {
        UserEloquentModel::query()->find($id)->delete();
    }
}
