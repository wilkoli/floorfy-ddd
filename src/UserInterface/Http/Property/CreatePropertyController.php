<?php

declare(strict_types=1);

namespace Floorfy\UserInterface\Http\Property;

use Floorfy\Application\Command\Property\CreatePropertyCommand;
use Floorfy\Application\Shared\CommandBus;
use Floorfy\Infrastructure\Validator\RequestValidator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class CreatePropertyController
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

        $this->commandBus->dispatch(
            new CreatePropertyCommand(
                $data['title'],
                $data['description']
            )
        );

        return JsonResponse::create();
    }
}