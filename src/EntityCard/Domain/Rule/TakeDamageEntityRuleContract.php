<?php

declare(strict_types=1);

namespace src\EntityCard\Domain\Rule;

use src\EntityCard\Domain\Entity\Entity;
use src\EntityCard\Domain\Entity\ValueObject\DamageValueObject;

interface TakeDamageEntityRuleContract
{
    public function __invoke(Entity $player, DamageValueObject $damage): void;
}
