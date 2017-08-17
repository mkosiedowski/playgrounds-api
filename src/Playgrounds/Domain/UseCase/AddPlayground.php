<?php

namespace Playgrounds\Domain\UseCase;

use Doctrine\Common\Collections\ArrayCollection;
use Playgrounds\Domain\Feature;
use Playgrounds\Domain\OpeningHours;
use Playgrounds\Domain\Playground;
use Playgrounds\Domain\Repository\FeatureRepository;
use Playgrounds\Domain\Repository\PlaygroundRepository;
use Playgrounds\Domain\UseCase\AddPlayground\Command;
use Playgrounds\Domain\UseCase\AddPlayground\Responder;

class AddPlayground
{
    /** @var PlaygroundRepository */
    private $playgroundRepository;

    /** @var FeatureRepository */
    private $featureRepository;

    /**
     * AddPlayground constructor.
     *
     * @param PlaygroundRepository $playgroundRepository
     * @param FeatureRepository $featureRepository
     */
    public function __construct(PlaygroundRepository $playgroundRepository, FeatureRepository $featureRepository)
    {
        $this->playgroundRepository = $playgroundRepository;
        $this->featureRepository = $featureRepository;
    }

    /**
     * @param Command $command
     * @param Responder $responder
     */
    public function execute(Command $command, Responder $responder): void
    {
        $features = $this->getFeatures($command->features);
        $playground = new Playground(
            $this->playgroundRepository->nextIdentity(),
            $command->name,
            null,
            $command->location,
            $command->description,
            new ArrayCollection($features),
            new ArrayCollection(),
            new ArrayCollection(),
            $command->createdBy
        );
        $playground->openingHours = array_map(
            function (OpeningHours $openingHours) use ($playground) {
                $newObject = new OpeningHours(
                    $playground,
                    $openingHours->getDay(),
                    $openingHours->getFromHour(),
                    $openingHours->getFromMinutes(),
                    $openingHours->getToHour(),
                    $openingHours->getToMinutes()
                );

                return $newObject;
            },
            $command->openingHours
        );
        $this->playgroundRepository->add($playground);

        $responder->playgroundCreated($playground);
    }

    private function getFeatures($keys)
    {
        $features = $this->featureRepository->findByIds($keys);
        $foundKeys = array_map(
            function (Feature $feature) {
                return $feature->id;
            },
            $features
        );
        foreach ($keys as $key) {
            if (!in_array($key, $foundKeys)) {
                $feature = new Feature($key);
                $this->featureRepository->add($feature);
                $features[] = $feature;
            }
        }

        return $features;
    }
}
