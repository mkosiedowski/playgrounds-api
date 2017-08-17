<?php

namespace Playgrounds\Infrastructure\ORM;

use Playgrounds\Domain\Feature;
use Playgrounds\Domain\Repository\FeatureRepository;

class ORMFeatureRepository extends AbstractORMRepository implements FeatureRepository
{
    /**
     * @inheritDoc
     */
    public function add(Feature $feature): void
    {
        $this->manager->persist($feature);
        $this->manager->flush();
    }

    /**
     * @inheritDoc
     */
    public function update(Feature $feature): void
    {
        $feature = $this->manager->merge($feature);
        $this->manager->persist($feature);
        $this->manager->flush();
    }

    /**
     * @inheritDoc
     */
    public function remove(Feature $feature): void
    {
        $this->manager->remove($feature);
        $this->manager->flush();
    }

    /**
     * @inheritDoc
     */
    public function findByIds(array $ids): array
    {
        $builder = $this->manager->getRepository(Feature::class)->createQueryBuilder('f');
        $builder->where('f.id IN (:ids)')->setParameter('ids', $ids);

        return $builder->getQuery()->getResult();
    }
}
