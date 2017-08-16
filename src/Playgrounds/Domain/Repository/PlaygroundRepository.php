<?php

namespace Playgrounds\Domain\Repository;

use Playgrounds\Domain\Playground;
use Playgrounds\Domain\PlaygroundId;

interface PlaygroundRepository
{
    /**
     * @return PlaygroundId
     */
    public function nextIdentity(): PlaygroundId;

    /**
     * @param Playground $playground
     */
    public function add(Playground $playground): void;

    /**
     * @param Playground $playground
     */
    public function update(Playground $playground): void;

    /**
     * @param Playground $playground
     */
    public function remove(Playground $playground): void;

    /**
     * @param array $parameters
     * @param array $order
     * @param int $page
     * @param int $limit
     * @return Playground[]
     */
    public function findByParameters(array $parameters, array $order, int $page, int $limit): array;
}
