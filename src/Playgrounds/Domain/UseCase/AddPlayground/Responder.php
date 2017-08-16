<?php

namespace Playgrounds\Domain\UseCase\AddPlayground;

use Playgrounds\Domain\Playground;

interface Responder
{
    /**
     * @param Playground $playground
     */
    public function playgroundCreated(Playground $playground): void;
}
