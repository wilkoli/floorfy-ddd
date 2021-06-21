<?php

declare(strict_types=1);

namespace Floorfy\Application\Command\Property;

use Floorfy\Application\Shared\Command;

class UpdateTourCommand implements Command
{
    /** @var int */
    private $id;
    /** @var bool|null */
    private $active;
    /** @var int|null */
    private $propertyId;

    public function __construct(int $id, ?bool $active, ?int $propertyId)
    {
        $this->id = $id;
        $this->active = $active;
        $this->propertyId = $propertyId;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function active(): ?bool
    {
        return $this->active;
    }

    public function propertyId(): ?int
    {
        return $this->propertyId;
    }
}