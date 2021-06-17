<?php

declare(strict_types=1);

namespace Floorfy\Infrastructure\Persistence\Doctrine\Repository;

use Doctrine\ORM\EntityRepository;
use Floorfy\Domain\Model\Property\Property;
use Floorfy\Domain\Model\Property\PropertyRepository;

class DoctrinePropertyRepository extends EntityRepository implements PropertyRepository
{
    /**
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save(Property $property): void
    {
       $this->getEntityManager()->persist($property);
       $this->getEntityManager()->flush();
    }
}