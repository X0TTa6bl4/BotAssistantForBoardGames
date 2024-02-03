<?php

declare(strict_types=1);

namespace src\Battle\Application\UseCase;

use src\Battle\Application\Action\IsHasBattleContract;
use src\Battle\Application\Builder\BattleBuilder;
use src\Battle\Application\UseCase\Request\CreateRequest;
use src\Battle\Domain\Entity\Battle;
use src\Battle\Domain\Repository\BattleRepositoryContract;

class CreateUseCase
{
    public function __construct(
        private readonly BattleRepositoryContract $battleRepository,
        private readonly BattleBuilder            $battleBuilder,
        private readonly IsHasBattleContract      $isHasBattle
    )
    {
    }

    public function __invoke(CreateRequest $request): Battle
    {
        if (($this->isHasBattle)($request->groupId)) {
            throw new \Exception('Group has a battle');
        }
        $battle = $this->battleBuilder->fromCreate($request);
        return $this->battleRepository->create($battle);
    }
}
