<?php

declare(strict_types=1);

namespace NorseBlue\ValueObjects\Immutable;

use NorseBlue\HandyProperties\Exceptions\PropertyNotMutableException;
use NorseBlue\ValueObjects\Mutable\SimpleValueObject;

abstract class ImmutableSimpleValueObject extends SimpleValueObject
{
    /**
     * @inheritDoc
     */
    final public function __set(string $key, $value): self
    {
        throw new PropertyNotMutableException(
            $key,
            "The '$key' property is immutable, cannot set the value '$value'."
        );
    }
}
