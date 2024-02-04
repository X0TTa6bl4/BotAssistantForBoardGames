<?php

declare(strict_types=1);

namespace src\Telegraph;

use DefStudio\Telegraph\Facades\Telegraph;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;
use DefStudio\Telegraph\Models\TelegraphChat;
use Illuminate\Support\Facades\Log;
use src\EntityCard\Application\UseCase\Group\CreateUseCase as EntityCreateUseCase;
use src\EntityCard\Application\UseCase\Group\Request\CreateRequest as EntityCreateRequest;
use src\EntityCard\Domain\Entity\Group;
use src\User\Application\UseCase\CreateUseCase as UserCreateUseCase;
use src\User\Application\UseCase\Request\CreateRequest as UserCreateRequest;

class Handler extends WebhookHandler
{
    public function hello(): void
    {
        $this->reply('test');
    }

    public function register()
    {
        Log::info('message', $this->message->toArray());

        try {
            app(UserCreateUseCase::class)(
                new UserCreateRequest(
                    name: $this->message->from()->username() ?? $this->message->from()->firstName(),
                    chatId: $this->message->from()->id()
                )
            );
        } catch (\Exception $e) {
            $this->reply($e->getMessage());
            return;
        }

        $this->reply('registred');
    }

    public function menu(): void
    {
        Log::info('Menu', $this->message->toArray());


        Telegraph::message('Menu')->chat(
            TelegraphChat::query()
                ->where('chat_id', $this->message->from()->id())
                ->get()
        )->keyboard(
            Keyboard::make()->buttons([
                Button::make('Создать мир')->action('createWorld'),
                Button::make('Присоединиться к существующему миру')->action('joinWorld'),
            ])
        )->send();
    }

    public function joinWorld(): void
    {
        $this->reply('Join world');
    }

    public function createWorld(): void
    {
        /** @var Group $group */
        $group = app(EntityCreateUseCase::class)(
            new EntityCreateRequest(
                name: 'World',
                ownerId: 1
            )
        );
        Telegraph::message('World created, ' . $group->getPublicId())->send();
        $this->reply('World created');
    }
}
