<?php

declare(strict_types=1);

namespace NorseBlue\ValueObjects\Tests\Helpers;

use NorseBlue\ValueObjects\SingleProperty\ImmutableSinglePropertyValueObject;

/**
 * @property mixed $value
 */
class Ispvo extends ImmutableSinglePropertyValueObject
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
        return is_null($value) || (is_int($value) && $value < 9);
    }
}
