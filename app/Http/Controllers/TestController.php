<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use src\EntityCard\Domain\Repository\EntityCardRepositoryContract;

class TestController extends Controller
{
    public function __construct(
        private readonly EntityCardRepositoryContract $playerRepository
    )
    {
    }

    public function test(Request $request)
    {
        $user = User::query()->create([
                'name' => 'test',
                'email' => Str::uuid() . '@gmail.com',
                'password' => bcrypt(Str::random(10)),
            ]
        );


        //$group = Group::query()->with('user')->find(1);
        //
        //dd($group->toArray());

        //
        //dd($user->createToken('token-name', ['server:update'])->plainTextToken);
        //Entity::factory()->create();
    }
}
