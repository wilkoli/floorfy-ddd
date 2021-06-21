<?php

declare(strict_types=1);

namespace Floorfy\Domain\Model\Property;

use Carbon\Carbon;
use Doctrine\ORM\PersistentCollection;
use Floorfy\Domain\Model\ValueObject\TourCollection;

class Property
{
    /** @var int */
    private $id;
    /** @var string */
    private $title;
    /** @var string */
    private $description;
    /** @var TourCollection */
    private $tours;
    /** @var Carbon */
    private $createdAt;
    /** @var Carbon */
    private $updatedAt;

    public function __construct(string $title, string $description)
    {
        $this->title = $title;
        $this->description = $description;
        $this->tours = TourCollection::createFromArray([]);
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
        $this->tours->add($tour);
    }

    public function tours(): TourCollection
    {
        if ($this->tours instanceof PersistentCollection) {
            return TourCollection::createFromArray($this->tours->toArray());
        }

        return $this->tours;
    }

    public function updateProperty(?string $title, ?string $description): void
    {
        if ($title) {
            $this->title = $title;
        }

        if ($description) {
            $this->description = $description;
        }
    }

    public function createdAt(): Carbon
    {
        return $this->createdAt;
    }

    public function updatedAt(): Carbon
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(Carbon $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}