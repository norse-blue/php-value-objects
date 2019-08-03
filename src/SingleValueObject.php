<?php

declare(strict_types=1);

namespace NorseBlue\ValueObjects;

use NorseBlue\ValueObjects\Contracts\SingleValueObject as SingleValueObjectContract;
use NorseBlue\ValueObjects\Traits\SingleValueObjectBehavior;

/**
 * Defines a single value object.
 *
 * @property mixed $value
 */
abstract class SingleValueObject implements SingleValueObjectContract
{
    use SingleValueObjectBehavior;
}
