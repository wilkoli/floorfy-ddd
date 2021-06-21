<?php

declare(strict_types=1);

namespace Floorfy\Application\Command\Property;

use Floorfy\Application\Shared\Command;

class CreateTourCommand implements Command
{
    /** @var int */
    private $propertyId;

    public function __construct(int $propertyId)
    {
        $this->propertyId = $propertyId;
    }

    public function propertyId(): int
    {
        return $this->propertyId;
    }
}