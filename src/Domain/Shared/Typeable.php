<?php

declare(strict_types=1);

namespace Floorfy\Domain\Shared;

interface Typeable
{
    public function type(): string;
}
