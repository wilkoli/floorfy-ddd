<?php

declare(strict_types=1);

namespace Floorfy\Application\Command\Property;

use Floorfy\Application\Shared\CommandHandler;
use Floorfy\Domain\Model\Property\PropertyBuilder;
use Floorfy\Domain\Model\Property\PropertyRepository;

class CreatePropertyCommandHandler implements CommandHandler
{
    /** @var PropertyRepository */
    private $propertyRepository;
    /** @var PropertyBuilder */
    private $propertyBuilder;

    public function __construct(PropertyRepository $propertyRepository, PropertyBuilder $propertyBuilder)
    {
        $this->propertyRepository = $propertyRepository;
        $this->propertyBuilder = $propertyBuilder;
    }

    public function __invoke(CreatePropertyCommand $command): void
    {
        $property = $this->propertyBuilder->build($command->title(), $command->description());
        $this->propertyRepository->save($property);
    }
}