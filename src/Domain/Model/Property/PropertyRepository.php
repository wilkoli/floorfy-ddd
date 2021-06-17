<?php

declare(strict_types=1);

namespace Floorfy\Domain\Model\Property;

interface PropertyRepository
{
    public function save(Property $property): void;
}