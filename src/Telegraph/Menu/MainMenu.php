<?php

declare(strict_types=1);

namespace src\Telegraph\Menu;

use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;

class MainMenu
{
    public function __invoke(): Keyboard
    {
        return Keyboard::make()->buttons([
            Button::make('Создать мир')->action('createWorld'),
            Button::make('Присоединиться')->action('joinWorld'),
        ]);
    }
}
