<?php

declare(strict_types=1);

namespace Floorfy\Domain\Model\Property;

use Carbon\Carbon;

class Tour
{
    /** @var int */
    private $id;
    /** @var Property */
    private $property;
    /** @var bool */
    private $active;
    /** @var Carbon */
    private $createdAt;
    /** @var Carbon */
    private $updatedAt;

    public function __construct(Property $property)
    {
        $this->property = $property;
        $this->active = false;
        $this->createdAt = new Carbon();
    }

    public function id(): int
    {
        return $this->id;
    }

    public function setProperty(Property $property): void
    {
        $this->property = $property;
    }

    public function property(): Property
    {
        return $this->property;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    public function createdAt(): Carbon
    {
        return $this->createdAt;
    }

    public function updatedAt(): Carbon
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(): void
    {
        $this->updatedAt = new Carbon();
    }
}