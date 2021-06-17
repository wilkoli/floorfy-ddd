<?php

declare(strict_types=1);

namespace Floorfy\Infrastructure\Validator;

use InvalidArgumentException;

final class RequestValidationException extends InvalidArgumentException
{
    private const KEY = 'wrong_params';
    private const MESSAGE = 'Request Validation Errors';

    /** @var array */
    private $data;

    public function __construct(array $data)
    {
        parent::__construct(self::MESSAGE);
        $this->data = $data;
    }

    public function key(): string
    {
        return self::KEY;
    }

    public function data(): array
    {
        return $this->data;
    }

    public function meta()
    {
        return null;
    }

    public function message(): string
    {
        return parent::getMessage();
    }

    public function trace(): array
    {
        return parent::getTrace();
    }
}
