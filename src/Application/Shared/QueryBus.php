<?php

declare(strict_types=1);

namespace Floorfy\Application\Shared;

interface QueryBus
{
    public function dispatch(Query $query);
}
