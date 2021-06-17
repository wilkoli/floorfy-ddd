<?php

declare(strict_types=1);

namespace Floorfy\Infrastructure\Validator;

use Symfony\Component\HttpFoundation\Request;

interface RequestValidator
{
    public function validate(Request $request): void;
}
