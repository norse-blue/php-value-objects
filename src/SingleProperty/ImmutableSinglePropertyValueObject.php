<?php

declare(strict_types=1);

namespace NorseBlue\ValueObjects\SingleProperty;

use NorseBlue\ValueObjects\Exceptions\ImmutablePropertyException;

abstract class ImmutableSinglePropertyValueObject extends SinglePropertyValueObject
{
    /**
     * @inheritDoc
     */
    final public function __set(string $key, $value): void
    {
        throw new ImmutablePropertyException(
            $key,
            "The '$key' property is immutable, cannot set the value '$value'."
        );
    }
}
