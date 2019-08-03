<?php

declare(strict_types=1);

namespace NorseBlue\ValueObjects;

use NorseBlue\HandyProperties\Traits\HasPropertyAccessors;
use NorseBlue\HandyProperties\Traits\HasPropertyMutators;
use NorseBlue\ValueObjects\Contracts\SingleValueObject as SingleValueObjectContract;
use NorseBlue\ValueObjects\Traits\SingleValueObjectBehavior;

/**
 * Defines a simple value object.
 *
 * @property mixed $value
 */
abstract class SingleValueObject implements SingleValueObjectContract
{
    use HasPropertyAccessors;
    use HasPropertyMutators;
    use SingleValueObjectBehavior;
}
