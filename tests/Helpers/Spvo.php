<?php

declare(strict_types=1);

namespace NorseBlue\ValueObjects\Tests\Helpers;

use NorseBlue\ValueObjects\Mutable\SimpleValueObject;

/**
 * @property mixed $value
 */
class Spvo extends SimpleValueObject
{
    /**
     * Validate the given value.
     *
     * @param mixed $value
     *
     * @return bool
     */
    public function isValid($value): bool
    {
        return is_null($value) || (is_int($value) && $value > 9);
    }
}
