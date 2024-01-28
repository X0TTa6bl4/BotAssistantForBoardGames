<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use src\Group\Application\UseCase\CreateUseCase;
use src\Group\Application\UseCase\RenameUseCase;
use src\Group\Application\UseCase\Request\CreateRequest;
use src\Group\Application\UseCase\Request\RenameRequest;

class GroupController extends Controller
{
    public function create(Request $request, CreateUseCase $createUseCase): void
    {
        $user = User::query()->find($request->input('owner_id'));
        $createUseCase(
            new CreateRequest(
                name: $request->input('name'),
                ownerId: $user->id
            )
        );
    }

    public function rename(Request $request, RenameUseCase $renameUseCase): void
    {
        $renameUseCase(
            new RenameRequest(
                ownerId: $request->input('owner_id'),
                newName: $request->input('new_name')
            )
        );
    }

    public function addUser(Request $request): void
    {
        $user = User::query()->find($request->input('user_id'));
        $group = Group::query()->where('public_id', $request->input('public_id'))->first();

        //$user->group()->sync($group->id);

        $group->players()->attach($user->id);
    }

    public function getAllUsers(Request $request): array
    {
        return Group::query()
            ->select('id', 'name', 'owner_id')
            ->where('public_id', $request->input('public_id'))
            ->with([
                'owner' => function ($query) {
                    $query->select('id', 'name');
                },
                'owner.entities' => function ($query) {
                    $query->select('id', 'user_id', 'power', 'lvl', 'health_points', 'protection');
                },
                'players' => function ($query) {
                    $query->select('users.id', 'name');
                },
                'players.entities' => function ($query) {
                    $query->select('id', 'user_id', 'power', 'lvl', 'health_points', 'protection');
                },
            ])->first()->toArray();
    }

}
