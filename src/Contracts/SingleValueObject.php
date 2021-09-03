<?php

declare(strict_types=1);

namespace NorseBlue\ValueObjects\Contracts;

/**
 * @property mixed $value
 */
interface SingleValueObject
{
    /**
     * Unwrap the value object.
     */
    public static function unwrap(mixed $value): mixed;

    /**
     * Validate the given value.
     */
    public function isValid(mixed $value): bool;
}
