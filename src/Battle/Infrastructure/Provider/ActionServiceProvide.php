<?php

namespace src\Battle\Infrastructure\Provider;

use Illuminate\Support\ServiceProvider;
use src\Battle\Application\Action\IsHasBattleContract;
use src\Battle\Infrastructure\Action\IsHasBattleAction;

class ActionServiceProvide extends ServiceProvider
{
    public array $bindings = [
        IsHasBattleContract::class => IsHasBattleAction::class
    ];
}
