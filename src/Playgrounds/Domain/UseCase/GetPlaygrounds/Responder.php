<?php

namespace Playgrounds\Domain\UseCase\GetPlaygrounds;

use Playgrounds\Domain\Playground;

interface Responder
{
    /**
     * @param Playground[] $playgrounds
     */
    public function playgroundsFound(array $playgrounds): void;
}
