<?php

declare(strict_types=1);

namespace src\EntityCard\Domain\Entity;

use src\EntityCard\Domain\Entity\ValueObject\DamageValueObject;
use src\EntityCard\Domain\Entity\ValueObject\HealthPointsValueObject;
use src\EntityCard\Domain\Entity\ValueObject\IdValueObject;
use src\EntityCard\Domain\Entity\ValueObject\InitiativeValueObject;
use src\EntityCard\Domain\Entity\ValueObject\LvlValueObject;
use src\EntityCard\Domain\Entity\ValueObject\NameValueObject;
use src\EntityCard\Domain\Entity\ValueObject\PowerValueObject;
use src\EntityCard\Domain\Entity\ValueObject\ProtectionValueObject;
use src\EntityCard\Domain\Entity\ValueObject\SpeedValueObject;
use src\EntityCard\Domain\Rule\MakeDamageEntityRuleContract;
use src\EntityCard\Domain\Rule\TakeDamageEntityRuleContract;

class Entity
{
    private ?IdValueObject $id;
    private NameValueObject $name;
    private HealthPointsValueObject $healthPoints;
    private PowerValueObject $power;
    private InitiativeValueObject $initiative;
    private SpeedValueObject $speed;
    private LvlValueObject $lvl;
    private ProtectionValueObject $protection;

    public function __construct(
        ?IdValueObject           $id,
        NameValueObject         $name,
        HealthPointsValueObject $healthPoints,

        PowerValueObject        $power,
        InitiativeValueObject   $initiative,
        SpeedValueObject        $speed,
        LvlValueObject          $lvl,
        ProtectionValueObject   $protection
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->healthPoints = $healthPoints;
        $this->power = $power;
        $this->initiative = $initiative;
        $this->speed = $speed;
        $this->lvl = $lvl;
        $this->protection = $protection;
    }

    public function getId(): ?IdValueObject
    {
        return $this->id;
    }

    public function getName(): NameValueObject
    {
        return $this->name;
    }

    public function getHealthPoints(): HealthPointsValueObject
    {
        return $this->healthPoints;
    }

    public function getPower(): PowerValueObject
    {
        return $this->power;
    }

    public function getInitiative(): InitiativeValueObject
    {
        return $this->initiative;
    }

    public function getSpeed(): SpeedValueObject
    {
        return $this->speed;
    }

    public function getLvl(): LvlValueObject
    {
        return $this->lvl;
    }

    public function getProtection(): ProtectionValueObject
    {
        return $this->protection;
    }

    public function updateName(NameValueObject $name): void
    {
        $this->name = $name;
    }

    public function updateHealthPoints(HealthPointsValueObject $healthPoints): void
    {
        $this->healthPoints = $healthPoints;
    }

    public function updatePower(PowerValueObject $power): void
    {
        $this->power = $power;
    }

    public function updateInitiative(InitiativeValueObject $initiative): void
    {
        $this->initiative = $initiative;
    }

    public function updateSpeed(SpeedValueObject $speed): void
    {
        $this->speed = $speed;
    }

    public function updateLvl(LvlValueObject $lvl): void
    {
        $this->lvl = $lvl;
    }

    public function updateProtection(ProtectionValueObject $protection): void
    {
        $this->protection = $protection;
    }

    public function takeDamage(DamageValueObject $damage): void
    {
        /** @var TakeDamageEntityRuleContract $rule */
        $rule = app(TakeDamageEntityRuleContract::class);

        $rule($this, $damage);
    }

    public function makeDamage(): DamageValueObject
    {
        /** @var MakeDamageEntityRuleContract $rule */
        $rule = app(MakeDamageEntityRuleContract::class);

        return $rule($this);
    }
}
