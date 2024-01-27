<?php

declare(strict_types=1);

namespace src\EntityCard\Application\Rule;

use src\EntityCard\Domain\Entity\Entity;
use src\EntityCard\Domain\Entity\ValueObject\DamageValueObject;
use src\EntityCard\Domain\Rule\MakeDamageEntityRuleContract;

class MakeDamageEntityAbsoluteRule implements MakeDamageEntityRuleContract
{

    public function __invoke(Entity $player): DamageValueObject
    {
        return new DamageValueObject($player->getPower()->getValue() + $player->getLvl()->getValue());
    }
}
