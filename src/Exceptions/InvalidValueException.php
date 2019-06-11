<?php

declare(strict_types=1);

namespace NorseBlue\ValueObjects\Exceptions;

use UnexpectedValueException;

/**
 * Exception thrown when an invalid value is given.
 */
final class InvalidValueException extends UnexpectedValueException
{
}
