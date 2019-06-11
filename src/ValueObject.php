<?php

declare(strict_types=1);

namespace NorseBlue\ValueObjects;

use NorseBlue\HandyProperties\Traits\HasPropertyAccessors;
use NorseBlue\HandyProperties\Traits\HasPropertyMutators;

/**
 * Defines a value object.
 */
abstract class ValueObject
{
    use HasPropertyAccessors;
    use HasPropertyMutators;
}
