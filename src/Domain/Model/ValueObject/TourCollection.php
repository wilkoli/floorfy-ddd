<?php

declare(strict_types=1);

namespace Floorfy\Domain\Model\ValueObject;

use Closure;
use Floorfy\Domain\Model\Property\Tour;
use Floorfy\Domain\Shared\TypedCollection;

class TourCollection extends TypedCollection
{
    public static function createFromArray(array $values)
    {
        return parent::createFromTypeAndArray(Tour::class, $values);
    }

    protected static function check(string $typeName, array $values): void
    {
        if ($typeName !== Tour::class) {
            throw new \TypeError("Type name must be " . Tour::class . ". $typeName given.");
        }

        parent::check($typeName, $values);
    }

    public function toArrayRecurrently(): array
    {
        return parent::toArray();
    }

    public function toArray(): array
    {
        return $this->elements;
    }

    public function getTour(int $tourId)
    {
        foreach ($this->elements as $element) {
            if ($element->id() === $tourId) {
                return $element;
            }
        }

        return null;
    }

    public function filter(Closure $p)
    {
        return $this->createFromArray(array_filter($this->elements, $p, ARRAY_FILTER_USE_BOTH));
    }
}
