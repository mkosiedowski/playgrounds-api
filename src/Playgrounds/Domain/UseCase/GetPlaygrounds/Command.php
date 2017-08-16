<?php

namespace Playgrounds\Domain\UseCase\GetPlaygrounds;

class Command
{
    /** @var int */
    public $page;

    /** @var int */
    public $limit;

    /**
     * Command constructor.
     *
     * @param int $page
     * @param int $limit
     */
    public function __construct(int $page = 0, int $limit = 10)
    {
        $this->page = $page;
        $this->limit = $limit;
    }
}
