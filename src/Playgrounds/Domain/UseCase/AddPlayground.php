<?php

namespace Playgrounds\Domain\UseCase;

use Playgrounds\Domain\Repository\PlaygroundRepository;
use Playgrounds\Domain\UseCase\AddPlayground\Command;
use Playgrounds\Domain\UseCase\AddPlayground\Responder;

class AddPlayground
{
    /** @var PlaygroundRepository */
    private $playgroundRepository;

    /**
     * AddPlayground constructor.
     *
     * @param PlaygroundRepository $playgroundRepository
     */
    public function __construct(PlaygroundRepository $playgroundRepository)
    {
        $this->playgroundRepository = $playgroundRepository;
    }

    /**
     * @param Command $command
     * @param Responder $responder
     */
    public function execute(Command $command, Responder $responder): void
    {
    }
}
