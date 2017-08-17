<?php

namespace Playgrounds\Domain\UseCase\AddPlayground;

use Playgrounds\Domain\Location;
use Playgrounds\Domain\LogInfo;
use Playgrounds\Domain\OpeningHours;

class Command
{
    /** @var string */
    public $name;

    /** @var Location */
    public $location;

    /** @var array */
    public $description;

    /** @var array */
    public $features;

    /** @var OpeningHours[] */
    public $openingHours;

    /** @var LogInfo */
    public $createdBy;

    /**
     * Command constructor.
     *
     * @param string $name
     * @param Location $location
     * @param array $description
     * @param array $features
     * @param OpeningHours[] $openingHours
     * @param LogInfo $createdBy
     */
    public function __construct(
        $name,
        Location $location,
        array $description,
        array $features,
        array $openingHours,
        LogInfo $createdBy
    ) {
        $this->name = $name;
        $this->location = $location;
        $this->description = $description;
        $this->features = $features;
        $this->openingHours = $openingHours;
        $this->createdBy = $createdBy;
    }
}
