<?php

declare(strict_types=1);

namespace Floorfy\Domain\Shared;

use ArrayIterator;
use Countable;
use Doctrine\Common\Collections\ArrayCollection;
use InvalidArgumentException;
use Iterator;
use IteratorAggregate;

class TypedCollection extends ArrayCollection implements Countable, IteratorAggregate, Typeable, ArrayRepresentable
{
    /** @var array */
    protected $elements;

    /** @var string */
    protected $typeName;

    public function __construct(string $typeName, array $elements = [])
    {
        parent::__construct($elements);
        $this->typeName = $typeName;
        $this->elements = $elements;
    }

    public static function createFromTypeAndArray(string $typeName, array $elements)
    {
        static::check($typeName, $elements);

        return new static($typeName, $elements);
    }

    public function type(): string
    {
        return $this->typeName;
    }

    protected static function check(string $typeName, array $elements): void
    {
        foreach ($elements as $element) {
            self::checkElement($element, $typeName);
        }
    }

    protected static function checkElement($element, string $typeName): void
    {
        if (!($element instanceof $typeName)) {
            throw new InvalidArgumentException();
        }
    }

    public function getIterator(): Iterator
    {
        return new ArrayIterator($this->elements);
    }

    public function count(): int
    {
        return count($this->elements);
    }

    public function isEmpty(): bool
    {
        return empty($this->elements);
    }

    public function sort(callable $compareFunction)
    {
        usort($this->elements, $compareFunction);
    }

    public function has($element): bool
    {
        if (!($element instanceof $this->typeName)) {
            throw new InvalidArgumentException();
        }

        return in_array($element, $this->elements);
    }

    public function toArray(): array
    {
        $output = [];
        array_map(
            function (ArrayRepresentable $element) use (&$output) {
                $output [] = $element->toArray();
                return $output;
            },
            $this->elements
        );

        return $output;
    }

    public function removeElement($element)
    {
        $key = array_search($element, $this->elements, true);

        if ($key === false) {
            return false;
        }

        unset($this->elements[$key]);

        return true;
    }

    public function add($element)
    {
        self::checkElement($element, $this->typeName);

        $this->elements[] = $element;

        return parent::add($element);
    }

    public function get($key)
    {
        return $this->elements[$key] ?? null;
    }
}
