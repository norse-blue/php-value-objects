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
     *
     * @param mixed $value
     *
     * @return mixed
     */
    public static function unwrap($value);

    /**
     * Validate the given value.
     *
     * @param mixed $value
     *
     * @return bool
     */
    public function isValid($value): bool;
}
