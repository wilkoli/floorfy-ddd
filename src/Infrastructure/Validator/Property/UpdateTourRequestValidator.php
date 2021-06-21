<?php

declare(strict_types=1);

namespace Floorfy\Infrastructure\Validator\Property;

use Floorfy\Infrastructure\Validator\RequestJsonValidator;

class UpdateTourRequestValidator extends RequestJsonValidator
{
    protected const SCHEMA_FILE_NAME = 'update-tour-schema.json';
}
