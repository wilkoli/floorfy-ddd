<?php

declare(strict_types=1);

namespace Floorfy\Application\Shared;

use CarsharingTelemetry\Domain\Shared\ExceptionLevel;
use RuntimeException;
use Throwable;

class ApplicationException extends RuntimeException
{
    /** @var string */
    private $key;

    /** @var array|null */
    private $data;

    /** @var array|null */
    private $meta;

    /** @var ExceptionLevel */
    private $level;

    public function __construct(
        string $key,
        string $message = '',
        ?array $data = null,
        ?array $meta = null,
        ?Throwable $previousException = null,
        ?ExceptionLevel $level = null
    ) {
        parent::__construct($message, 0, $previousException);
        $this->key = $key;
        $this->data = $data;
        $this->meta = $meta;
        $this->level = $level ?? ExceptionLevel::ERROR();
    }

    public function key(): string
    {
        return $this->key;
    }

    public function data(): ?array
    {
        return $this->data;
    }

    public function meta(): ?array
    {
        return $this->meta;
    }

    public function level(): ExceptionLevel
    {
        return $this->level;
    }

    public function message(): string
    {
        return parent::getMessage();
    }

    public function trace(): array
    {
        return parent::getTrace();
    }

    public function previous(): ?Throwable
    {
        return parent::getPrevious();
    }
}
