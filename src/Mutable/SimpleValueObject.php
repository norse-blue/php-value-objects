<?php

declare(strict_types=1);

namespace NorseBlue\ValueObjects\Mutable;

use NorseBlue\ValueObjects\Contracts\SimpleValueObjectContract;
use NorseBlue\ValueObjects\Traits\SimpleValueObjectBehavior;
use NorseBlue\ValueObjects\ValueObject;

/**
 * Defines a simple value object.
 *
 * @property mixed $value
 */
abstract class SimpleValueObject extends ValueObject implements SimpleValueObjectContract
{
    use SimpleValueObjectBehavior;
}
