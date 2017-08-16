<?php

namespace Playgrounds\Domain;

use Ramsey\Uuid\Uuid;

class PlaygroundId
{
    /** @var string */
    private $id;

    private function __construct($id = null)
    {
        $this->id = $id ?: Uuid::uuid4()->toString();
    }

    /**
     * @param string $id
     * @return string
     */
    public static function create($id = null)
    {
        return new static($id);
    }

    public function __toString()
    {
        return $this->id;
    }
}
