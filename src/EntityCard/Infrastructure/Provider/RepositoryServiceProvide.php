<?php

namespace src\EntityCard\Infrastructure\Provider;

use Illuminate\Support\ServiceProvider;
use src\EntityCard\Domain\Repository\EntityCardRepositoryContract;
use src\EntityCard\Infrastructure\Repository\EntityCardRepository;

class RepositoryServiceProvide extends ServiceProvider
{
    public array $bindings = [
        EntityCardRepositoryContract::class => EntityCardRepository::class,
    ];
}
