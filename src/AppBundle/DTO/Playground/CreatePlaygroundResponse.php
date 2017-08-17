<?php

namespace AppBundle\DTO\Playground;

use JMS\Serializer\Annotation as Serializer;
use Playgrounds\Domain\Location;
use Playgrounds\Domain\OpeningHours;

class CreatePlaygroundResponse
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $id;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $name;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $slug;

    /**
     * @var Location
     * @Serializer\Type("Playgrounds\Domain\Location")
     */
    public $location;

    /**
     * @var string
     * @Serializer\Type("array")
     */
    public $description;

    /**
     * @var string[]
     * @Serializer\Type("array")
     */
    public $features;

    /**
     * @var OpeningHours[]
     * @Serializer\Type("array<Playgrounds\Domain\OpeningHours>")
     */
    public $openingHours;
}
