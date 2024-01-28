<?php

declare(strict_types=1);

namespace src\EntityCard\Application\Builder;

use App\Models\Entity as EntityEloquentModel;
use src\EntityCard\Application\UseCase\Request\CreateRequest;
use src\EntityCard\Domain\Entity\EntityCard;
use src\EntityCard\Domain\Entity\ValueObject\HealthPointsValueObject;
use src\EntityCard\Domain\Entity\ValueObject\IdValueObject;
use src\EntityCard\Domain\Entity\ValueObject\InitiativeValueObject;
use src\EntityCard\Domain\Entity\ValueObject\LvlValueObject;
use src\EntityCard\Domain\Entity\ValueObject\PowerValueObject;
use src\EntityCard\Domain\Entity\ValueObject\ProtectionValueObject;
use src\EntityCard\Domain\Entity\ValueObject\SpeedValueObject;

class EntityCardBuilder
{
    public function fromEloquentModel(EntityEloquentModel $entity): EntityCard
    {
        return new EntityCard(
            id: new IdValueObject($entity->id),
            userId: new IdValueObject($entity->user_id),
            healthPoints: new HealthPointsValueObject($entity->health_points, $entity->health_points_max),
            power: new PowerValueObject($entity->power),
            initiative: new InitiativeValueObject($entity->initiative),
            speed: new SpeedValueObject($entity->speed),
            lvl: new LvlValueObject($entity->lvl),
            protection: new ProtectionValueObject($entity->protection),
        );
    }

    public function fromCreate(CreateRequest $request): EntityCard
    {
        return new EntityCard(
            id: null,
            userId: new IdValueObject($request->userId),
            healthPoints: new HealthPointsValueObject($request->healthPoints, $request->healthPoints),
            power: new PowerValueObject($request->power),
            initiative: new InitiativeValueObject($request->initiative),
            speed: new SpeedValueObject($request->speed),
            lvl: new LvlValueObject($request->lvl),
            protection: new ProtectionValueObject($request->protection),
        );
    }
}
