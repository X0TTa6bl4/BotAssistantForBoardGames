<?php

namespace src\EntityCard\Infrastructure\Provider;

use Illuminate\Support\ServiceProvider;
use src\EntityCard\Application\Rule\IsItPossibleToCreateAnEntityRule;
use src\EntityCard\Application\Rule\MakeDamageEntityAbsoluteRule;
use src\EntityCard\Application\Rule\TakeDamageEntityAbsoluteRule;
use src\EntityCard\Domain\Rule\IsItPossibleToCreateAnEntityRuleContract;
use src\EntityCard\Domain\Rule\MakeDamageEntityRuleContract;
use src\EntityCard\Domain\Rule\TakeDamageEntityRuleContract;

class RuleServiceProvide extends ServiceProvider
{
    public array $bindings = [
        MakeDamageEntityRuleContract::class => MakeDamageEntityAbsoluteRule::class,
        TakeDamageEntityRuleContract::class => TakeDamageEntityAbsoluteRule::class,
        IsItPossibleToCreateAnEntityRuleContract::class => IsItPossibleToCreateAnEntityRule::class,
    ];
}
