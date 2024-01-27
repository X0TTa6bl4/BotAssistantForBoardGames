<?php

namespace src\EntityCard\Infrastructure\Provider;

use Illuminate\Support\ServiceProvider;
use src\EntityCard\Domain\Repository\EntityRepositoryContract;
use src\EntityCard\Infrastructure\Repository\EntityRepository;

class RepositoryServiceProvide extends ServiceProvider
{
    public array $bindings = [
        EntityRepositoryContract::class => EntityRepository::class,
    ];
}
