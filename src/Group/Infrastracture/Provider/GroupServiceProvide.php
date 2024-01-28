<?php

namespace src\Group\Infrastracture\Provider;

use Illuminate\Support\ServiceProvider;

class GroupServiceProvide extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(
            RepositoryServiceProvide::class
        );
    }
}
