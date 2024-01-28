<?php

declare(strict_types=1);

namespace src\EntityCard\Application\Rule;

use src\EntityCard\Domain\Entity\EntityCard;
use src\EntityCard\Domain\Entity\ValueObject\DamageValueObject;
use src\EntityCard\Domain\Entity\ValueObject\HealthPointsValueObject;
use src\EntityCard\Domain\Rule\TakeDamageEntityRuleContract;

class TakeDamageEntityAbsoluteRule implements TakeDamageEntityRuleContract
{

    public function __invoke(EntityCard $player, DamageValueObject $damage): void
    {
        $playerHealthPoints = $player->getHealthPoints();
        $playerProtection = $player->getProtection()->getValue();
        $damage = $damage->getValue();

        $totalDamage = max($damage - $playerProtection, 0);
        $newHealthPoints = $playerHealthPoints->getValue() - $totalDamage;

        $player->updateHealthPoints(
            new HealthPointsValueObject(
                max($newHealthPoints, 0),
                $playerHealthPoints->getMaxHealthPoints()
            )
        );
    }
}
