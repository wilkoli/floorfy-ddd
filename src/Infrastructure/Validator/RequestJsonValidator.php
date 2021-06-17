<?php

declare(strict_types=1);

namespace Floorfy\Infrastructure\Validator;

use Symfony\Component\HttpFoundation\Request;
use JsonSchema\Validator;
use stdClass;

abstract class RequestJsonValidator implements RequestValidator
{
    protected const SCHEMA_FILE_NAME = '';

    /** @var string */
    private $schemaFile;

    /** @var Validator */
    private $validator;

    public function __construct(Validator $validator, string $validatorSchemaPath)
    {
        $this->validator = $validator;
        $this->schemaFile = (string) realpath($validatorSchemaPath . '/' . static::SCHEMA_FILE_NAME);
    }

    public function validate(Request $request): void
    {
        $this->validateData(
            $this->loadRequestData($request)
        );
    }

    private function loadRequestData(Request $request): stdClass
    {
        $data = json_decode($request->getContent());
        if ($data === null) {
            throw new RequestValidationException($this->formatErrorMessages(
                [
                    ['message' => 'Invalid JSON']
                ]
            ));
        }
        return $data;
    }

    private function validateData(stdClass $data)
    {
        $this->validator->validate($data, (object) ['$ref' => 'file://' . $this->schemaFile]);

        if (!$this->validator->isValid()) {
            throw new RequestValidationException($this->formatErrorMessages((array) $this->validator->getErrors()));
        }
    }

    private function formatErrorMessages(array $errors): array
    {
        $errorList = [];
        foreach ($errors as $error) {
            $errorList[$error['property'] ?? null] = $error['message'];
        }
        return $errorList;
    }
}
