<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use src\EntityCard\Infrastructure\Provider\EntityCardServiceProvide;
use src\User\Infrastructure\Provider\UserServiceProvide;

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
        $this->app->register(UserServiceProvide::class);
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
