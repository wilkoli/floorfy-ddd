<?php

declare(strict_types=1);

namespace Floorfy\Application\Command\Property;

use Floorfy\Application\Shared\Command;

class UpdatePropertyCommand implements Command
{
    /** @var int */
    private $id;
    /** @var string|null */
    private $title;
    /** @var string|null */
    private $description;

    public function __construct(int $id, ?string $title, ?string $description)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function title(): ?string
    {
        return $this->title;
    }

    public function description(): ?string
    {
        return $this->description;
    }
}