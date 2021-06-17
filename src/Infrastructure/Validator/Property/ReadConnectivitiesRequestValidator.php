<?php

declare(strict_types=1);

namespace CarsharingTelemetry\Infrastructure\Validator\Vehicle;

use CarsharingTelemetry\Infrastructure\Validator\RequestJsonValidator;

class ReadConnectivitiesRequestValidator extends RequestJsonValidator
{
    protected const SCHEMA_FILE_NAME = 'read-vehicle-connectivities-schema.json';
}
