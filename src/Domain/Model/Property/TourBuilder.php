<?php

declare(strict_types=1);

namespace Floorfy\Domain\Model\Property;

class TourBuilder
{
    public function build(Property $property): Tour
    {
        return new Tour($property);
    }
}