<?php

namespace App\Http\Controllers;

use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;
use DefStudio\Telegraph\Models\TelegraphChat;
use Illuminate\Http\Request;
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
        $chat = TelegraphChat::find(2);
        $chat->keyboard(
            Keyboard::make()->buttons([
                Button::make('Создать мир')->action('createWorld'),
                Button::make('Присоединиться к существующему миру')->action('joinWorld'),
            ])
        )->send();
    }
}
