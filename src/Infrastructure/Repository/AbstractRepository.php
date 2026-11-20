<?php

namespace App\Infrastructure\Repository;

use App\Domain\Entity\EntityInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Exception\ORMException;

/**
 * @template T
 */
abstract readonly class AbstractRepository
{
    public function __construct(protected EntityManagerInterface $entityManager) {}

    protected function flush(): void
    {
        $this->entityManager->flush();
    }

    /**
     * @param  EntityInterface  $entity
     *
     * @return int
     */
    protected function store(EntityInterface $entity): int
    {
        $this->entityManager->persist($entity);
        $this->flush();

        return $entity->getId();
    }

    /**
     * @param  EntityInterface  $entity
     *
     * @throws ORMException
     */
    public function refresh(EntityInterface $entity): void
    {
        $this->entityManager->refresh($entity);
    }
}
