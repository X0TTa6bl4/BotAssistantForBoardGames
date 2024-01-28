<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use src\EntityCard\Application\UseCase\CreateUseCase;
use src\EntityCard\Application\UseCase\MakeDamageUseCase;
use src\EntityCard\Application\UseCase\Request\CreateRequest;
use src\EntityCard\Application\UseCase\Request\MakeDamageRequest;

class EntityCardController extends Controller
{
    public function create(Request $request, CreateUseCase $createUseCase): void
    {
        $createUseCase(
            new CreateRequest(
                userId: $request->input('user_id'),
                healthPoints: $request->input('health_points'),
                power: $request->input('power'),
                initiative: $request->input('initiative'),
                speed: $request->input('speed'),
                lvl: $request->input('lvl'),
                protection: $request->input('protection'),
            )
        );
    }

    public function makeDamage(Request $request, MakeDamageUseCase $makeDamageUseCase): void
    {
        $makeDamageUseCase(
            new MakeDamageRequest(
                entityIdThatDealsDamage: $request->input('entityIdThatDealsDamage'),
                entityIdThatTakesDamage: $request->input('entityIdThatTakesDamage')
            )
        );
    }
}
