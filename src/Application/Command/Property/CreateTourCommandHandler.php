<?php

declare(strict_types=1);

namespace Floorfy\Application\Command\Property;

use Floorfy\Application\Shared\CommandHandler;
use Floorfy\Domain\Model\Property\Property;
use Floorfy\Domain\Model\Property\PropertyRepository;
use Floorfy\Domain\Model\Property\Tour;
use Floorfy\Domain\Model\Property\TourBuilder;

class CreateTourCommandHandler implements CommandHandler
{
    /** @var PropertyRepository */
    private $propertyRepository;
    /** @var TourBuilder */
    private $tourBuilder;

    public function __construct(PropertyRepository $propertyRepository, TourBuilder $tourBuilder)
    {
        $this->propertyRepository = $propertyRepository;
        $this->tourBuilder = $tourBuilder;
    }

    public function __invoke(CreateTourCommand $command): void
    {
        /** @var Property */
        $property = $this->propertyRepository->findById($command->propertyId());

        /** @var Tour */
        $tour = $this->tourBuilder->build($property);
        $property->addTour($tour);
        $this->propertyRepository->save($property);
    }
}