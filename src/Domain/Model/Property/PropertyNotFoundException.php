<?php

declare(strict_types=1);

namespace Floorfy\Domain\Model\Property;

use Floorfy\Domain\Shared\DomainException;

class PropertyNotFoundException extends DomainException
{
    public function __construct(array $meta)
    {
        parent::__construct(
            'resource_not_found',
            'Property not Found',
            ['resource' => 'Property'],
            $meta
        );
    }
}