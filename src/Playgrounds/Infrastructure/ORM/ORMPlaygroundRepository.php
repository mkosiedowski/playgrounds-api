<?php

namespace Playgrounds\Infrastructure\ORM;

use Playgrounds\Domain\Playground;
use Playgrounds\Domain\PlaygroundId;
use Playgrounds\Domain\Repository\PlaygroundRepository;

class ORMPlaygroundRepository extends AbstractORMRepository implements PlaygroundRepository
{
    /**
     * @inheritDoc
     */
    public function nextIdentity(): PlaygroundId
    {
        return PlaygroundId::create();
    }

    /**
     * @inheritDoc
     */
    public function add(Playground $playground): void
    {
        $this->manager->persist($playground);
        $this->manager->flush();
    }

    /**
     * @inheritDoc
     */
    public function update(Playground $playground): void
    {
        $playground = $this->manager->merge($playground);
        $this->manager->persist($playground);
        $this->manager->flush();
    }

    /**
     * @inheritDoc
     */
    public function remove(Playground $playground): void
    {
        $this->manager->remove($playground);
        $this->manager->flush();
    }

    /**
     * @inheritDoc
     */
    public function findByParameters(array $parameters, array $order, int $page, int $limit): array
    {
        return $this->manager->getRepository(Playground::class)->findAll();
    }
}
