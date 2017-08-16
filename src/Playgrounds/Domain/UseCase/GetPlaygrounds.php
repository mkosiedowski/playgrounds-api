<?php

namespace Playgrounds\Domain\UseCase;

use Playgrounds\Domain\Repository\PlaygroundRepository;
use Playgrounds\Domain\UseCase\GetPlaygrounds\Command;
use Playgrounds\Domain\UseCase\GetPlaygrounds\Responder;

class GetPlaygrounds
{
    /**
     * @var PlaygroundRepository
     */
    private $playgroundRepository;

    /**
     * GetPlaygrounds constructor.
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
        $playgrounds = $this->playgroundRepository->findByParameters([], [], $command->page, $command->limit);
        $responder->playgroundsFound($playgrounds);
    }
}
