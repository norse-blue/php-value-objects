<?php

declare(strict_types=1);

namespace NorseBlue\ValueObjects;

use NorseBlue\HandyProperties\Traits\HasPropertyAccessors;
use NorseBlue\HandyProperties\Traits\HasPropertyMutators;

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
     * Check if the value objects equals another value.
     *
     * @param mixed $other
     *
     * @return bool
     */
    abstract public function equals($other): bool;
}
