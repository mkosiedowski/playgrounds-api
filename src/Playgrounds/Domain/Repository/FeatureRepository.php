<?php

namespace Playgrounds\Domain\Repository;

use Playgrounds\Domain\Feature;

interface FeatureRepository
{
    /**
     * @param Feature $feature
     */
    public function add(Feature $feature): void;

    /**
     * @param Feature $feature
     */
    public function update(Feature $feature): void;

    /**
     * @param Feature $feature
     */
    public function remove(Feature $feature): void;

    /**
     * @param string[] $keys
     * @return Feature[]
     */
    public function findByIds(array $keys): array;
}
