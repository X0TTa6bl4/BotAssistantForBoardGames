<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use src\Battle\Application\UseCase\CreateUseCase;
use src\EntityCard\Application\UseCase\Group\GetGroupByOwnerIdUseCase;

class BattleController extends Controller
{
    public function create(Request $request, CreateUseCase $createUseCase, GetGroupByOwnerIdUseCase $getGroupByOwnerIdUseCase)
    {
        //TODO - добавить группе метод получения всех существ
        $group = ($getGroupByOwnerIdUseCase)($request->input('user_id'));
        $battle = ($createUseCase)($group->getId());
        return response()->json($battle);
    }
}
