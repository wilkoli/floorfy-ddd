<?php

declare(strict_types=1);

namespace Floorfy\Domain\Model\Property;

use Floorfy\Domain\Shared\DomainException;

class TourNotFoundException extends DomainException
{
    public function __construct(array $meta)
    {
        parent::__construct(
            'resource_not_found',
            'Tour not Found',
            ['resource' => 'Tour'],
            $meta
        );
    }
}