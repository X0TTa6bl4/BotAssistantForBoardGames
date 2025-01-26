<?php

declare(strict_types=1);

namespace src\EntityCard\Domain\Rule;

use src\EntityCard\Domain\Entity\EntityCard;
use src\EntityCard\Domain\Entity\ValueObject\DamageValueObject;

interface MakeDamageEntityRuleContract
{
    public function __invoke(EntityCard $player): DamageValueObject;
}
