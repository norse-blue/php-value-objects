<?php

declare(strict_types=1);

namespace NorseBlue\ValueObjects;

use NorseBlue\ValueObjects\Traits\HasPropertyAccessors;
use NorseBlue\ValueObjects\Traits\HasPropertyMutators;

/**
 * Defines a value object.
 *
 * @property mixed $value
 */
abstract class ValueObject
{
    use HasPropertyAccessors;
    use HasPropertyMutators;

    /**
     * Validate the given value.
     *
     * @param mixed $value
     *
     * @return bool
     */
    abstract public function isValid($value): bool;

    /**
     * Check if the value objects equals another value.
     *
     * @param mixed $other
     *
     * @return bool
     */
    abstract public function equals($other): bool;
}
