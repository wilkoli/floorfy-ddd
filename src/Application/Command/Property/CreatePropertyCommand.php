<?php

declare(strict_types=1);

namespace Floorfy\Application\Command\Property;

use Floorfy\Application\Shared\Command;

class CreatePropertyCommand implements Command
{
    /** @var string */
    private $title;
    /** @var string */
    private $description;

    public function __construct(string $title, string $description)
    {
        $this->title = $title;
        $this->description = $description;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function description(): string
    {
        return $this->description;
    }
}