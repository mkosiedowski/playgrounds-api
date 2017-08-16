<?php

namespace Playgrounds\Infrastructure\ORM;

use Doctrine\ORM\EntityManagerInterface;

abstract class AbstractORMRepository
{
    /** @var \Doctrine\ORM\EntityManager */
    protected $manager;

    /**
     * @param EntityManagerInterface $manager
     */
    public function __construct(EntityManagerInterface $manager)
    {
        $this->manager = $manager;
    }
}
