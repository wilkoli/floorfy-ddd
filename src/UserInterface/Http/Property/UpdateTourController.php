<?php

declare(strict_types=1);

namespace Floorfy\UserInterface\Http\Property;

use Floorfy\Application\Command\Property\UpdateTourCommand;
use Floorfy\Application\Shared\CommandBus;
use Floorfy\Domain\Model\Property\TourNotFoundException;
use Floorfy\Infrastructure\Validator\RequestValidator;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class UpdateTourController
{
    /** @var CommandBus */
    private $commandBus;
    /** @var RequestValidator */
    private $requestValidator;

    public function __construct(CommandBus $commandBus, RequestValidator $requestValidator)
    {
        $this->commandBus = $commandBus;
        $this->requestValidator = $requestValidator;
    }

    public function __invoke(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $this->requestValidator->validate($request);

        try {
            $this->commandBus->dispatch(new UpdateTourCommand($data['id'], $data['active'] ?? null, $data['property_id'] ?? null));
        } catch (TourNotFoundException $e) {
            echo 'tour not found';
        }

        return JsonResponse::create();
    }
}