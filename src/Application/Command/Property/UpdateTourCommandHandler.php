<?php

declare(strict_types=1);

namespace Floorfy\Application\Command\Property;

use Floorfy\Application\Shared\CommandHandler;
use Floorfy\Domain\Model\Property\Property;
use Floorfy\Domain\Model\Property\PropertyRepository;
use Floorfy\Domain\Model\Property\TourNotFoundException;

class UpdateTourCommandHandler implements CommandHandler
{
    /** @var PropertyRepository */
    private $propertyRepository;

    public function __construct(PropertyRepository $propertyRepository)
    {
        $this->propertyRepository = $propertyRepository;
    }

    public function __invoke(UpdateTourCommand $command): void
    {
        $property = $this->propertyRepository->findByTourId($command->id());

        if (!$property instanceof Property) {
            throw new TourNotFoundException(['id' => $command->id()]);
        }

        $tourCollection = $property->tours();
        $tour = $tourCollection->getTour($command->id());

        $tour->setActive($command->active());
        $tour->setUpdatedAt();

        $this->propertyRepository->save($property);
    }
}