<?php

namespace Playgrounds\Domain;

class Feature
{
    /** @var string */
    public $id;

    /** @var string[] */
    public $name;

    /**
     * Feature constructor.
     *
     * @param string $id
     * @param \string[] $name
     */
    public function __construct($id, array $name = [])
    {
        $this->id = $id;
        $this->name = $name;
    }
}
