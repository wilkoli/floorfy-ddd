<?php

declare(strict_types=1);

namespace Floorfy\Domain\Model\Property;

use Carbon\Carbon;

class Property
{
    /** @var int */
    private $id;
    /** @var string */
    private $title;
    /** @var string */
    private $description;
    /** @var []Tour */
    private $tours;
    /** @var Carbon */
    private $createdAt;
    /** @var Carbon */
    private $updatedAt;

    public function __construct(string $title, string $description)
    {
        $this->title = $title;
        $this->description = $description;
        $this->tours = [];
        $this->createdAt = new Carbon();
    }

    public function id(): int
    {
        return $this->id;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function addTour(Tour $tour): void
    {
        $this->tours[] = $tour;
    }

    public function tours(): array
    {
        return $this->tours;
    }

    public function createdAt(): Carbon
    {
        return $this->createdAt;
    }

    public function updatedAt(): Carbon
    {
        return $this->updatedAt;
    }
}