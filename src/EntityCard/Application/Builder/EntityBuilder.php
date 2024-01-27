<?php

declare(strict_types=1);

namespace src\EntityCard\Application\Builder;

use App\Models\Entity as PlayerEloquentModel;
use src\EntityCard\Domain\Entity\Entity;
use src\EntityCard\Domain\Entity\ValueObject\HealthPointsValueObject;
use src\EntityCard\Domain\Entity\ValueObject\IdValueObject;
use src\EntityCard\Domain\Entity\ValueObject\InitiativeValueObject;
use src\EntityCard\Domain\Entity\ValueObject\LvlValueObject;
use src\EntityCard\Domain\Entity\ValueObject\NameValueObject;
use src\EntityCard\Domain\Entity\ValueObject\PowerValueObject;
use src\EntityCard\Domain\Entity\ValueObject\ProtectionValueObject;
use src\EntityCard\Domain\Entity\ValueObject\SpeedValueObject;

class EntityBuilder
{
    public function fromEloquentModel(PlayerEloquentModel $player): Entity
    {
        return new Entity(
            id: new IdValueObject($player->id),
            name: new NameValueObject($player->name),
            healthPoints: new HealthPointsValueObject($player->health_points, $player->health_points_max),
            power: new PowerValueObject($player->power),
            initiative: new InitiativeValueObject($player->initiative),
            speed: new SpeedValueObject($player->speed),
            lvl: new LvlValueObject($player->lvl),
            protection: new ProtectionValueObject($player->protection),
        );
    }
}
