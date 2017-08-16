<?php

namespace Playgrounds\Domain;

use Doctrine\Common\Collections\Collection;

class Playground
{
    /** @var PlaygroundId */
    public $id;

    /** @var string */
    public $name;

    /** @var string */
    public $slug;

    /** @var Location */
    public $location;

    /** @var Collection */
    public $description;

    /** @var Collection */
    public $features;

    /** @var Collection */
    public $photos;

    /** @var Collection */
    public $openingHours;

    /** @var LogInfo */
    public $createdBy;

    /** @var LogInfo */
    public $modifiedBy;

    /**
     * Playground constructor.
     *
     * @param PlaygroundId $id
     * @param string $name
     * @param string $slug
     * @param Location $location
     * @param Collection $description
     * @param Collection $features
     * @param Collection $photos
     * @param Collection $openingHours
     * @param LogInfo $createdBy
     */
    public function __construct(
        PlaygroundId $id,
        string $name,
        string $slug,
        Location $location,
        Collection $description,
        Collection $features,
        Collection $photos,
        Collection $openingHours,
        LogInfo $createdBy
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->slug = $slug;
        $this->location = $location;
        $this->description = $description;
        $this->features = $features;
        $this->photos = $photos;
        $this->openingHours = $openingHours;
        $this->createdBy = $createdBy;
        $this->modifiedBy = clone $createdBy;
    }
}
