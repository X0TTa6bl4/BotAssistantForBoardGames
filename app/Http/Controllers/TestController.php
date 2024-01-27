<?php

namespace App\Http\Controllers;

use App\Models\Entity;
use Illuminate\Http\Request;
use src\EntityCard\Domain\Repository\EntityRepositoryContract;

class TestController extends Controller
{
    public function __construct(
        private readonly EntityRepositoryContract $playerRepository
    )
    {
    }

    public function test(Request $request)
    {
        Entity::factory()->create();
    }
}
