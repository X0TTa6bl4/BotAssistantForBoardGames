<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use src\EntityCard\Application\UseCase\MakeDamageUseCase;
use src\EntityCard\Application\UseCase\Request\MakeDamageRequest;

class EntityCardController extends Controller
{
    public function __construct(
        private readonly MakeDamageUseCase $makeDamageUseCase,
    )
    {
    }

    public function makeDamage(Request $request): void
    {
        [$entityThatDealsDamage, $entityThatTakesDamage] = ($this->makeDamageUseCase)(
            new MakeDamageRequest(
                entityIdThatDealsDamage: $request->input('entity_id_that_deals_damage'),
                entityIdThatTakesDamage: $request->input('entity_id_that_takes_damage')
            )
        );

        dd($entityThatDealsDamage, $entityThatTakesDamage);
    }
}
