<?php

declare(strict_types=1);

namespace Floorfy\Domain\Shared;

interface ArrayRepresentable
{
    public function toArray(): array;
}
