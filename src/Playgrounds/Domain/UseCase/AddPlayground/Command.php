<?php

namespace Playgrounds\Domain\UseCase\AddPlayground;

class Command
{
    public $name;

    /**
     * Command constructor.
     *
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }
}
