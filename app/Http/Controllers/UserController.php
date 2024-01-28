<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function create(Request $request): \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Builder
    {
        return User::query()->create([
                'name' => $request->input('name'),
                'email' => Str::uuid() . '@gmail.com',
                'password' => bcrypt(Str::random(10)),
            ]
        );
    }
}
