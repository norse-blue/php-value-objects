<?php

declare(strict_types=1);

namespace NorseBlue\ValueObjects\Immutable;

use NorseBlue\ValueObjects\Mutable\SimpleValueObject;
use NorseBlue\ValueObjects\Traits\ImmutableValueObjectBehavior;

abstract class ImmutableSimpleValueObject extends SimpleValueObject
{
    use ImmutableValueObjectBehavior;
}
