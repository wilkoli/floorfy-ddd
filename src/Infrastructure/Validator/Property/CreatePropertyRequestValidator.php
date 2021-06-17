<?php

declare(strict_types=1);

namespace Floorfy\Infrastructure\Validator\Property;

use Floorfy\Infrastructure\Validator\RequestJsonValidator;

class CreatePropertyRequestValidator extends RequestJsonValidator
{
    protected const SCHEMA_FILE_NAME = 'create-property-schema.json';
}
