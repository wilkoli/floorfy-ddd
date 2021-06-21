<?php

declare(strict_types=1);

namespace Floorfy\Application\Command\Property;

use Floorfy\Application\Shared\CommandHandler;
use Floorfy\Domain\Model\Property\PropertyRepository;

class UpdatePropertyCommandHandler implements CommandHandler
{
    /** @var PropertyRepository */
    private $propertyRepository;

    public function __construct(PropertyRepository $propertyRepository)
    {
        $this->propertyRepository = $propertyRepository;
    }

    public function __invoke(UpdatePropertyCommand $command): void
    {
        $property = $this->propertyRepository->findById($command->id());
        $property->updateProperty($command->title(), $command->description());
        $this->propertyRepository->save($property);
    }
}