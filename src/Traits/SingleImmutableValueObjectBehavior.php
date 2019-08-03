<?php

declare(strict_types=1);

namespace NorseBlue\ValueObjects\Traits;

use NorseBlue\HandyProperties\Exceptions\PropertyNotMutableException;

trait SingleImmutableValueObjectBehavior
{
    use SingleValueObjectBehavior;

    /**
     * Override property mutator to prevent mutability.
     *
     * @param string $key
     * @param mixed $value
     *
     * @return self
     */
    final public function __set(string $key, $value): self
    {
        throw new PropertyNotMutableException(
            $key,
            "The '$key' property is immutable, cannot set the value '$value'."
        );
    }
}
