<?php

declare(strict_types=1);

namespace Floorfy\Domain\Model\Property;

interface PropertyRepository
{
    public function findById(int $id): Property;
    public function findByTourId(int $tourId): ?Property;
    public function save(Property $property): void;
}