<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use src\EntityCard\Infrastructure\Provider\EntityCardServiceProvide;
use src\Group\Infrastracture\Provider\GroupServiceProvide;

class DomainServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(EntityCardServiceProvide::class);
        $this->app->register(GroupServiceProvide::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
