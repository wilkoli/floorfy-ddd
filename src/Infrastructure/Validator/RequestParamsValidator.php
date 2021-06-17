<?php

declare(strict_types=1);

namespace Floorfy\Infrastructure\Validator;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;

abstract class RequestParamsValidator implements RequestValidator
{
    /** @var ValidatorInterface */
    private $validator;

    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    abstract protected function constraints(): Assert\Collection;

    public function validate(Request $request): void
    {
        $this->validateParams($this->loadRequestParams($request));
    }

    private function loadRequestParams(Request $request): array
    {
        return $request->query->all();
    }

    private function validateParams(array $params)
    {
        $errors = $this->validator->validate($params, $this->constraints());
        if (count($errors) > 0) {
            throw new RequestValidationException($this->formatErrorMessages($errors));
        }
    }

    private function formatErrorMessages(ConstraintViolationListInterface $errors): array
    {
        $errorList = [];
        foreach ($errors as $error) {
            $errorList[(string) str_replace(['[', ']'], '', $error->getPropertyPath())] = rtrim($error->getMessage(), '.');
        }
        return $errorList;
    }
}
