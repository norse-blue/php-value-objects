<?php

declare(strict_types=1);

namespace NorseBlue\ValueObjects\Exceptions;

use RuntimeException;

/**
 * Exception thrown when trying to modify an immutable object.
 */
final class ImmutableValueObjectException extends RuntimeException
{
}
