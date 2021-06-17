<?php

declare(strict_types=1);

namespace Floorfy\Application\Shared;

interface CommandBus
{
    public function dispatch(Command $command): void;
}
