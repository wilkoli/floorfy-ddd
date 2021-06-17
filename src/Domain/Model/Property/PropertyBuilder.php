<?php

declare(strict_types=1);

namespace Floorfy\Domain\Model\Property;

class PropertyBuilder
{
    public function build(string $title, string $description): Property
    {
        return new Property($title, $description);
    }
}