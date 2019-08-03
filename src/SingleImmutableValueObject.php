<?php

declare(strict_types=1);

namespace NorseBlue\ValueObjects;

use NorseBlue\ValueObjects\Contracts\SingleValueObject as SingleValueObjectContract;
use NorseBlue\ValueObjects\Traits\SingleImmutableValueObjectBehavior;

/**
 * Defines a single immutable value object.
 *
 * @property-read mixed $value
 */
abstract class SingleImmutableValueObject implements SingleValueObjectContract
{
    use SingleImmutableValueObjectBehavior;
}
