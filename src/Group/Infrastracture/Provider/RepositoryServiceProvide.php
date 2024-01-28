<?php

namespace src\Group\Infrastracture\Provider;

use Illuminate\Support\ServiceProvider;
use src\Group\Domain\Repository\GroupRepositoryContract;
use src\Group\Infrastracture\Repository\GroupRepository;

class RepositoryServiceProvide extends ServiceProvider
{
    public array $bindings = [
        GroupRepositoryContract::class => GroupRepository::class,
    ];
}
