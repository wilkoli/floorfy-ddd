<?php

declare(strict_types=1);

namespace Floorfy\UserInterface\Http\Property;

use Floorfy\Application\Command\Property\UpdatePropertyCommand;
use Floorfy\Application\Shared\CommandBus;
use Floorfy\Domain\Model\Property\PropertyNotFoundException;
use Floorfy\Infrastructure\Validator\RequestValidator;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class UpdatePropertyController
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
            $this->commandBus->dispatch(new UpdatePropertyCommand($data['id'], $data['title'] ?? null, $data['description'] ?? null));
        } catch (PropertyNotFoundException $e) {
            echo 'property not found';
        }

        return JsonResponse::create();
    }
}