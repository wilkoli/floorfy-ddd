<?php

declare(strict_types=1);

namespace Floorfy\Domain\Shared;

use MyCLabs\Enum\Enum;
use Psr\Log\LogLevel;

/**
 * @method static ExceptionLevel DEBUG()
 * @method static ExceptionLevel INFO()
 * @method static ExceptionLevel WARNING()
 * @method static ExceptionLevel ERROR()
 * @method static ExceptionLevel CRITICAL()
 * @method static ExceptionLevel EMERGENCY()
 */
final class ExceptionLevel extends Enum
{
    private const DEBUG = LogLevel::DEBUG;
    private const INFO = LogLevel::INFO;
    private const WARNING = LogLevel::WARNING;
    private const ERROR = LogLevel::ERROR;
    private const CRITICAL = LogLevel::CRITICAL;
    private const EMERGENCY = LogLevel::EMERGENCY;
}
