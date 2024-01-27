<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use src\EntityCard\Infrastructure\Provider\EntityCardServiceProvide;

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
