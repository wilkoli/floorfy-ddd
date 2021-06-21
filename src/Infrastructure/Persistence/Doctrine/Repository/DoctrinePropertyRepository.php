<?php

declare(strict_types=1);

namespace Floorfy\Infrastructure\Persistence\Doctrine\Repository;

use Doctrine\ORM\EntityRepository;
use Floorfy\Domain\Model\Property\Property;
use Floorfy\Domain\Model\Property\PropertyNotFoundException;
use Floorfy\Domain\Model\Property\PropertyRepository;

class DoctrinePropertyRepository extends EntityRepository implements PropertyRepository
{
    public function findById(int $id): Property
    {
        $property = parent::find($id);

        if (!$property instanceof Property) {
           throw new PropertyNotFoundException(['id' => $id]);
        }

        return $property;
    }

    public function findByTourId(int $tourId): ?Property
    {
        return $this->createQueryBuilder('properties')
            ->leftJoin('properties.tours', 'tours')
            ->where('tours.id = :tourId')
            ->setParameter('tourId', $tourId)
            ->getQuery()
            ->getOneOrNullResult();
    }

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